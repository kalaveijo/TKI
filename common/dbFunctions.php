<?php

//http://mirificampress.com/permalink/saving_a_file_into_mysql

/*
 * Generic insert function, requires PDO, tablename. $columns must be 2d array that has column names,
 * data and datatypes listed
 */
function insertEntry($DBH, $table, array $columns, $return = false){
	try{
		//add column names to sql statement
		for($i = 0; $i < count($columns[0]);$i++){
			if($i == 0){
				$columnstring .= $columns[0][$i];
			}else{
				$columnstring .= ', '. $columns[0][$i];
			}
		}
		
		//parse values into correct format for sql statement
		for($i = 0; $i < count($columns[1]);$i++){
			if($i == 0){
				switch(strtolower($columns[2][$i])){
					case "int":
						$valuestring .= $columns[1][$i];
					break;
					case "varchar":
						$valuestring .= '"'. $columns[1][$i] .'"';
					break;
					case "char":
						$valuestring .= '"'. $columns[1][$i] .'"';
					break;
					case "datetime":
						$valuestring .= '"'. $columns[1][$i] .'"';
					break;
					case "date":
						$valuestring .= '"'. $columns[1][$i] .'"';
					break;
					case "DATE":
						$valuestring .= '"'. $columns[1][$i] .'"';
					break;
					case "DATETIME":
						$valuestring .= '"'. $columns[1][$i] .'"';
					break;
				}
			}else{
			switch(strtolower($columns[2][$i])){
					case "int":
						$valuestring .= ', ' . $columns[1][$i];
					break;
					case "varchar":
						$valuestring .= ', "'. $columns[1][$i] .'"';
					break;
					case "char":
						$valuestring .= ', "'. $columns[1][$i] .'"';
					break;
					case "datetime":
						$valuestring .= ', "'. $columns[1][$i] .'"';
					break;
					case "date":
						$valuestring .= ', "'. $columns[1][$i] .'"';
					break;
					case "DATE":
						$valuestring .= ', "'. $columns[1][$i] .'"';
					break;
					case "DATETIME":
						$valuestring .= ', "'. $columns[1][$i] .'"';
					break;
				}
			}
		}
		
		$statement = "INSERT INTO $table($columnstring)
		VALUES ($valuestring) ";
		if($return){
			return $statement;
		}else{
		$STH = $DBH->exec($statement);
		$log = new Log();
		$log->log($statement);
		return true;
		}
	}catch(Exception $e){
		$log = new Log();
		$log->error($e);
		return false;
	}
}

/*
 * Closes old entry by closing timestamp and inserting new one. Requires id.
 */
function updateEntry($DBH, $innoDBH, $table, $id, array $columns, $return = false){
	try{
		$timestamp = getTimeStamp();
		$fixedColumns = selectWhichColumnsToUpdate($DBH, $innoDBH, $table, $id, $columns);
		
		$fixedColumns[1][searchNumArray("valid_starttime", $fixedColumns[0])] = $timestamp; //change timestamp
		$insertStatement = insertEntry($DBH, $table, $fixedColumns, true);
		
		$statement = "
		UPDATE $table SET
		valid_endtime = '" . $timestamp . "'
		WHERE
		valid_endtime IS NULL AND id=$id;
		
		";
		if($return){
			$statement .= updateRelatedJoins($DBH, $innoDBH, $table, $id, $timestamp, true);
			return $statement;
		}else{
			$STH = $DBH->exec($statement);
			$STH = $DBH->exec($insertStatement);
			$log = new Log();
			$log->log($statement);
			$log->log($insertStatement);
			updateRelatedJoins($DBH, $innoDBH, $table, $id, $timestamp);
			return true;
		}
	}catch(Exception $e){
		$log = new Log();
		$log->error($e);
		return false;
	}
}

function fetchNextFreeId($DBH, $table, $column){
	try{
		$statement = "SELECT $column FROM $table";
		$STH = $DBH->query($statement);
		$STH->setFetchMode(PDO::FETCH_NUM);
		$e = 0;
		while($row = $STH->fetch()){
			if($row[0] > $e){
				$e = $row[0];
			}
		}
		$e = $e + 1;
		return $e;
	}catch(Exception $e){
		$log = new Log();
		$log->error($e);
		return false;
	}
	
}

function joinTables($DBH, $innoDBH, $table1, $id1, $table2, $id2, $debug = false){
	$table = array();
	$i = 0;
	try{
		$statement = "SELECT
				table1.id 'table1_id',
				table2.id 'table2_id',
				table1.valid_starttime 'table1_vst',
				table2.valid_starttime 'table2_vst'
				FROM
				$table1 table1,
				$table2 table2
				WHERE
				table1.valid_endtime IS NULL AND table1.id = $id1
				AND table2.valid_endtime IS NULL and table2.id = $id2";
				
		$STH = $DBH->query($statement);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		while($row = $STH->fetch()){
			$table[$i] = $row;
		}
		
		
		$jointable = selectCorrectJointable($innoDBH, $table1, $table2);
		
		if($jointable['tablename'] == 'funding_in_project' ){
			$statement = "
			INSERT INTO ". $jointable['tablename'] ."(id, valid_starttime, ". $jointable['id1'] .", ". $jointable['id2'] .", ". $jointable['vst1'] .", ". $jointable['vst2'] .")
			VALUES (" . fetchNextFreeId($DBH, 'funding_in_project', 'id') . ", '". getTimestamp() ."', $id1, $id2, '". $table[0]['table1_vst'] ."', '". $table[0]['table2_vst'] ."')";
		}else{
			$statement = "
			INSERT INTO ". $jointable['tablename'] ."(". $jointable['id1'] .", ". $jointable['id2'] .", ". $jointable['vst1'] .", ". $jointable['vst2'] .")
			VALUES ($id1, $id2, '". $table[0]['table1_vst'] ."', '". $table[0]['table2_vst'] ."')";
		}
		if($debug){
			return $return = array($table, $statement);
		}else{
			$DBH->exec($statement);
			$log = new Log();
			$log->log($statement);
			return true;
		}
		
		
	}catch(Exception $e){
		$log = new Log();
		$log->error($e);
		return false;
	}
	
}

// returns correct jointable information in assoc array
// PDO needs to be connected to "information_schema" database
function selectCorrectJointable($DBH, $table1, $table2){
	try{
		$schema = array();
		$i = 0;
		$statement = //"USE information_schema;
					"SELECT 
					*
					FROM KEY_COLUMN_USAGE WHERE REFERENCED_TABLE_NAME = '$table1'
					UNION
					SELECT
					*
					FROM KEY_COLUMN_USAGE WHERE REFERENCED_TABLE_NAME = '$table2'";
				
		$STH = $DBH->query($statement);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		while($row = $STH->fetch()){
			$schema[$i] = $row;
			$i++;
		}
		$i = 0;
		$currentTable = $schema[0]["REFERENCED_TABLE_NAME"];
		
		//format raw data into assoc array where tablename is key
		foreach($schema as $schema){
			if($schema["REFERENCED_TABLE_NAME"] == $currentTable){
				$tableConnections[$currentTable][$i] = $schema;
				$i++;
			}else{
				$currentTable = $schema["REFERENCED_TABLE_NAME"];
				$i = 0;
				$tableConnections[$currentTable][$i] = $schema;
				$i++;
			}
		}
		
		//find intersecting tablename and store it
		$jointable = array();
		for($i = 0; $i<count($tableConnections[$table1]); $i++){
			for($e = 0; $e<count($tableConnections[$table2]); $e++){
				
				if($tableConnections[$table1][$i]['TABLE_NAME'] == $tableConnections[$table2][$e]['TABLE_NAME']){
					$jointable['tablename'] = $tableConnections[$table1][$i]['TABLE_NAME'];
				}
				
			}
		}
		
		//find correct id and vst column names for $table1
		for($i = 0; $i<count($tableConnections[$table1]); $i++){
			if($tableConnections[$table1][$i]['TABLE_NAME'] == $jointable['tablename']){
				
				if($tableConnections[$table1][$i]['REFERENCED_COLUMN_NAME'] == 'valid_starttime'){
					$jointable['vst1'] = $tableConnections[$table1][$i]['COLUMN_NAME'];
				}
				
				if($tableConnections[$table1][$i]['REFERENCED_COLUMN_NAME'] == 'id'){
					$jointable['id1'] = $tableConnections[$table1][$i]['COLUMN_NAME'];
				}
				
			}
		}
		
		//find correct id and vst column names for $table2
		for($i = 0; $i<count($tableConnections[$table2]); $i++){
			if($tableConnections[$table2][$i]['TABLE_NAME'] == $jointable['tablename']){
				
				if($tableConnections[$table2][$i]['REFERENCED_COLUMN_NAME'] == 'valid_starttime'){
					$jointable['vst2'] = $tableConnections[$table2][$i]['COLUMN_NAME'];
				}
				
				if($tableConnections[$table2][$i]['REFERENCED_COLUMN_NAME'] == 'id'){
					$jointable['id2'] = $tableConnections[$table2][$i]['COLUMN_NAME'];
				}
				
			}
		}
		
		return $jointable;
		
	}catch(Exception $e){
		$log = new Log();
		$log->error($e);
		return false;
	}
		
}

/*
 * Update jointable, needs access to database and information_schema. Also needs table names and corresponding id's
 */

function updateJoin($DBH, $innoDBH, $table1, $table2, $id1, $id2, $debug = false){
	try{
		$joinTableInfo = selectCorrectJointable($innoDBH, $table1, $table2);
		$mainTableInfo = array();
		
		$statement = "SELECT
				table1.id 'table1_id',
				table2.id 'table2_id',
				table1.valid_starttime 'table1_vst',
				table2.valid_starttime 'table2_vst'
				FROM
				$table1 table1,
				$table2 table2
				WHERE
				table1.valid_endtime IS NULL AND table1.id = $id1
				AND table2.valid_endtime IS NULL and table2.id = $id2";
		
		$STH = $DBH->query($statement);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		$i = 0;
		while($row = $STH->fetch()){
			$mainTableInfo[$i] = $row;
		}
		
		$statement = "UPDATE 
					". $joinTableInfo['tablename'] ."
					SET 
					". $joinTableInfo['vst1'] ." = '". $mainTableInfo[0]['table1_vst'] ."',
					". $joinTableInfo['vst2'] ." = '". $mainTableInfo[0]['table2_vst'] ."'
					WHERE
					". $joinTableInfo['id1'] ." = $id1 AND
					". $joinTableInfo['id2'] ." = $id2";
		
	if($debug){
			return $statement;
		}else{
			$STH = $DBH->exec($statement);
			$log = new Log();
			$log->log($statement);
			return true;
		}
		
	}catch(Exception $e){
		
	}
}

/*
 * Updates all related join tables to correspond VST change
 */
function updateRelatedJoins($DBH, $innoDBH, $table, $id, $vst, $debug = false){
	try{
		
		$tableInfo = array();
		$parsedTableInfo = array();
		$i = 0;
		$statement = "SELECT 
						*
						FROM
						KEY_COLUMN_USAGE 
						WHERE REFERENCED_TABLE_NAME = '$table'";
		
		$innoSTH = $innoDBH->query($statement);
		$innoSTH->setFetchMode(PDO::FETCH_ASSOC);
		
		while($row = $innoSTH->fetch()){
			$tableInfo[$row['TABLE_NAME']][$i] = $row;
			$i++;	
			
		}
		
		$statement = '';
		
		foreach($tableInfo as $table){
			foreach($table as $row){
				if($row['REFERENCED_COLUMN_NAME'] == 'id'){
					$parsedTableInfo[$row['TABLE_NAME']]['id'] = $row['COLUMN_NAME'];
					$parsedTableInfo[$row['TABLE_NAME']]['table'] = $row['TABLE_NAME'];
				}elseif($row['REFERENCED_COLUMN_NAME'] == 'valid_starttime'){
					$parsedTableInfo[$row['TABLE_NAME']]['vst'] = $row['COLUMN_NAME'];
					$parsedTableInfo[$row['TABLE_NAME']]['table'] = $row['TABLE_NAME'];
				}
			}
		}
		
		foreach($parsedTableInfo as $table){
			$statement .= "UPDATE
							". $table['table'] ."
							SET
							" . $table['vst'] . " = '$vst'
							WHERE
							" . $table['id'] . " = $id;";
		}
		
		if($debug){
			return $statement;
		}else{
			$STH = $DBH->exec($statement);
			$log = new Log();
			$log->log($statement);
			return true;
		}
	}catch(Exception $e){
		$log = new Log();
		$log->error($e);
		return false;
	}
}


/*
 * Checks which columns user wants to update, changes those and keeps rest as they were. Used in updateEntry()
 * returns assoc array with correct info
 */
function selectWhichColumnsToUpdate($DBH, $innoDBH, $table, $id, $updatedColumns){
	try{
		$tableData = array();
	$i = 0;
	$innoStatement = "SELECT
						*
						FROM
						columns
						WHERE
						TABLE_NAME = '$table'";
	
	$innoSTH = $innoDBH->query($innoStatement);
	$innoSTH->setFetchMode(PDO::FETCH_ASSOC);
	
	//fetches all info related to single table
	while($innoRow = $innoSTH->fetch()){
		$tableData[$i] = $innoRow;
		$i++;
	}
	
	$statement = "SELECT
					*
					FROM
					$table table1
					WHERE
					table1.valid_endtime IS NULL AND table1.id = $id";
					
	$STH = $DBH->query($statement);
	$STH->setFetchMode(PDO::FETCH_ASSOC);
	
	//fetches all columns from table where id is known
	while($row = $STH->fetch()){
		$oldrow = $row;
	}
	
	$oldRowKeys = array_keys($oldrow);
	$updatedColumnsCount = count($updatedColumns[0]);
	
	for($e = 0; $e < count($oldrow); $e++){
		$exists = false;
		for($i = 0; $i < $updatedColumnsCount; $i++){
			
			if($updatedColumns[0][$i] == $oldRowKeys[$e]){
				//if updatedColumns already has something, keep that
				$exists = true;
			}else{
				//if updatedColumns is missing something, append it.
				
				//pair correct datatype with correct column
				foreach($tableData as $row){
					if($row['COLUMN_NAME'] == $oldRowKeys[$e]){
						$columnType = $row['DATA_TYPE'];
					}
				}
				
				
		}
		
		
			}
		//nämä tulee puskettua aivan liian monta kertaa sisään
				if(!$exists){ //if value will not be updated 
					if(is_null($oldrow[$oldRowKeys[$e]])){ //if column is null
						$updatedColumns[0][$e] = "" . $oldRowKeys[$e] ."";
						$updatedColumns[1][$e] = "null";
						$updatedColumns[2][$e] = 'varchar';
					}else{
						$updatedColumns[0][$e] =  "" . $oldRowKeys[$e] ."";
						$updatedColumns[1][$e] = $oldrow[$oldRowKeys[$e]];
						$updatedColumns[2][$e] = $columnType;
					}
				}
				$exists = false;
		/*
		if(!$exists){ //if value will not be updated 
			if(is_null($oldrow[$oldRowKeys[$e]])){ //if column is null
				array_push($updatedColumns[0], "" . $oldRowKeys[$e] ."");
				array_push($updatedColumns[1], "null");
				array_push($updatedColumns[2], 'int');
			}else{
				array_push($updatedColumns[0], "" . $oldRowKeys[$e] ."");
				array_push($updatedColumns[1], $oldrow[$oldRowKeys[$e]]);
				array_push($updatedColumns[2], $columnType);
			}
		}
		*/
		
	}
	
	return $updatedColumns;
	}catch(Exception $e){
		$log = new Log();
		$log->error($e);
		return false;
	}
	
}

/*
 * Fetches all data related to project
 * Returns multidimensional Assoc/Num array
 * Note, this function IS UNHOLY. Refactor it
 */
function queryProject($DBH, $projectId){
	try{
		
	$microtime = microtime(true);
	$projectData = array();
	$i = 0;
	
	$statement = array("project"=>"SELECT
project.id,
project.identifier,
project.diary_number,
project.projectcode,
project.project_name,
project.acronym,
project.focuse_areas,
project.metropolia_coordinator,
project.degree_program_related,
project.start_day,
project.end_day,
project.inspector,
project.inspected_day,
project.funding_application,
project.funding_application_signed_day,
project.deniend_application,
project.targeted_budget,
project.offer,
project.invitation_to_tender,
project.invention_announcement,
project.ethical_estimates_on,
project.general_project_information,
project.valid_starttime,
project.valid_endtime,
project.user_id
FROM
project
WHERE
project.id = $projectId AND
project.valid_endtime IS NULL;",


"projectpartner"=>"SELECT
projectpartner.id,
projectpartner.cluster_unit,
projectpartner.degree_program,
projectpartner.responsible_person_lname,
projectpartner.responsible_person_fname,
projectpartner.responsible_person_role,
projectpartner.valid_starttime,
projectpartner.valid_endtime,
projectpartner.user_id
FROM 
project
INNER JOIN (
projectpartner_in_project
	INNER JOIN
	projectpartner
	ON
	projectpartner.id = projectpartner_in_project.projectpartner_id AND
	projectpartner.valid_starttime = projectpartner_in_project.projectpartner_vst
)
ON
project.id = projectpartner_in_project.project_id AND
project.valid_starttime = projectpartner_in_project.project_vst
WHERE
project.id = $projectId AND
project.valid_endtime IS NULL;",
"externalstakeholder"=>"
SELECT
externalstakeholder.id,
externalstakeholder.contactperson_firstname,
externalstakeholder.contactperson_lastname,
externalstakeholder.contactperson_role,
externalstakeholder.address,
externalstakeholder.zip,
externalstakeholder.state,
externalstakeholder.phone_number,
externalstakeholder.email_address,
externalstakeholder.country,
externalstakeholder.network,
externalstakeholder.valid_starttime,
externalstakeholder.valid_endtime,
externalstakeholder.user_id
FROM
project
INNER JOIN (
externalstakeholder_in_project
	INNER JOIN
	externalstakeholder
	ON
	externalstakeholder.id = externalstakeholder_in_project.ESH_id AND
	externalstakeholder.valid_starttime = externalstakeholder_in_project.ESH_vst
)
ON
project.id = externalstakeholder_in_project.project_id AND
project.valid_starttime = externalstakeholder_in_project.project_vst
WHERE
project.id = $projectId AND
project.valid_endtime IS NULL;",
"contract"=>"
SELECT
contract.id,
contract.contract_type,
contract.lname,
contract.fname,
contract.role,
contract.sign_day,
contract.valid_starttime,
contract.valid_endtime,
contract.user_id
FROM
project
INNER JOIN (
contract_in_project
	INNER JOIN
	contract
	ON
	contract.id = contract_in_project.contract_id AND
	contract.valid_starttime = contract_in_project.contract_vst
)
ON
project.id = contract_in_project.project_id AND
project.valid_starttime = contract_in_project.project_vst
WHERE
project.id = $projectId AND
project.valid_endtime IS NULL;",
"funder"=>"
SELECT
funder.id,
funder.valid_starttime,
funder.valid_endtime,
funder.funder_name,
funder.user_id
FROM
project
INNER JOIN (
funding_in_project
	INNER JOIN 
	funder
	ON
	funder.id = funding_in_project.funder_id AND
	funder.valid_starttime = funding_in_project.funder_vst
)
ON
project.id = funding_in_project.project_id AND
project.valid_starttime = funding_in_project.project_vst
WHERE
project.id = $projectId AND
project.valid_endtime IS NULL;",
"researchpermit"=>"
SELECT
researchpermit.id,
researchpermit.research_name,
researchpermit.research_permit_type,
researchpermit.organisation,
researchpermit.first_name,
researchpermit.last_name,
researchpermit.address,
researchpermit.zip,
researchpermit.state_address,
researchpermit.phone_number,
researchpermit.email_address,
researchpermit.tki_state,
researchpermit.ethical_review,
researchpermit.person_register,
researchpermit.permit_day,
researchpermit.denied,
researchpermit.valid_starttime,
researchpermit.valid_endtime,
researchpermit.user_id
FROM
project
INNER JOIN (
researchpermit_in_project
	INNER JOIN
	researchpermit
	ON
	researchpermit.id = researchpermit_in_project.research_permit_id AND
	researchpermit.valid_starttime = researchpermit_in_project.research_permit_vst
)
ON
project.id = researchpermit_in_project.project_id AND
project.valid_starttime = researchpermit_in_project.project_vst
WHERE
project.id = $projectId AND
project.valid_endtime IS NULL;",
"document"=>"
SELECT
document.id,
document.document_name,
document.document_type,
document.document_role,
document.sign_day,
document.valid_starttime,
document.valid_endtime,
document.document_data_id,
document.user_id
FROM
project
INNER JOIN (
document_in_project 
	INNER JOIN
	document
	ON
	document.id = document_in_project.document_id AND
	document.valid_starttime = document_in_project.document_vst
)
ON 
project.id = document_in_project.project_id AND
project.valid_starttime = document_in_project.project_vst
WHERE
project.id = $projectId AND
project.valid_endtime IS NULL;");
	foreach($statement as $key => $table){
		
	$STH = $DBH->query($table);
	$STH->setFetchMode(PDO::FETCH_ASSOC);
	
	while($row = $STH->fetch()){
		$projectData[$key][$i] = $row;
		$i++;
	}
	$i = 0;
	}
	
	$projectData['microtime'] =  (microtime(true) - $microtime);
	
return $projectData;
	}catch(Exception $e){
		$log = new Log();
		$log->error($e);
		return false;
	}
}

//fetch all projects, can include completed projects

function queryProjectList($DBH, $orderBy = '', $completed = false){
	try{
		$projectList = array();
		$i = 0;
		if($completed){
			$statement = "SELECT
							*
							FROM
							project
							WHERE
							project.valid_endtime IS NULL AND
							project.end_day IS NOT NULL";
			$STH = $DBH->query($statement);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			while($row = $STH->fetch()){
				$projectList[$i] = $row;
				$i++;
			}
		}else{
			$statement = "SELECT
							*
							FROM
							project
							WHERE
							project.valid_endtime IS NULL";
			$STH = $DBH->query($statement);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			while($row = $STH->fetch()){
				$projectList[$i] = $row;
				$i++;
			}
		}
		return $projectList;
	}catch(Exception $e){
		$log = new Log();
		$log->error($e);
		return false;
	}
	
	
}

//check if username and password match with database values
function checkLoginCredentials($DBH, $userName, $userPsw){
	$user;
	$statement = "SELECT
					*
					FROM
					enduser
					WHERE
					email_address = $username AND
					valid_starttime IS NULL";
	$STH = $DBH->query($statement);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		while($row = $STH->fetch()){
			$user = $row;
		}
		$userPsw = hash("sha256", $userPsw);
	if($userName === $user['email_address'] && $userPsw === $user['passwordhash']){
		return true;
	}else{
		return false;
	}
}

?>
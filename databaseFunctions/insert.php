<?php
include_once("../phpClasses/Log.php");
include_once("../common/dbConnect.php");
include_once("../common/functions.php");
include_once("../common/dbFunctions.php");

$log = new Log();

//if inserted thing will not be tied to project
if($_GET['independent']){
	
	//if script asks to create new project
	if($_GET['project']){
		
	}
	
	//if script asks to add file to db
	if($_GET['file']){
		
	}
	
	//if script asks to add new research permit
	if($_GET['researchpermit']){
		
	}
	
}else{
	
	//if script asks to add file to db
	if(isset($_GET['file'])){
		
	}
	
	//checks if user wants to create table and creates it
	//joins user table to existing project
	if(isset($_GET['table'])){
		$tableId = fetchNextFreeId($DBH, $_GET['table'], "id");
		insertEntry($DBH, $_GET['table'], $_GET['tableData']);
		joinTables($DBH, $innoDBH, "project", $_GET['projectId'], $_GET['table'], $tableId);
	}
	
}


?>
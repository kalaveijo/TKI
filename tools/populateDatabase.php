<?php
/*
 * This generalized php file populates TKI project database with temp data
 * and it should not be used for anything else
 */
include_once("../phpClasses/Log.php");
include_once("../common/dbConnect.php");
include_once("../common/functions.php");
include_once("../common/dbFunctions.php");

try{
	function populateDB($DBH, $innoDBH){
		

	for($i = 0; $i < 100; $i++){
	echo("//<br>");
	$projectId = fetchNextFreeId($DBH, 'project', 'id');
	echo("projectId " . $projectId . "<br>");
	$projectData = array(
	array("id", "valid_starttime", "identifier", "diary_number", "projectcode", "project_name", "acronym", "focuse_areas", "metropolia_coordinator", "degree_program_related" ),
	array($projectId, getTimestamp(), generateRandomWord(), generateRandomWord(), generateRandomWord(), generateRandomWord(), generateRandomWord(), generateRandomWord(), generateRandomWord(), generateRandomWord()),
	array("int", "datetime", "varchar", "varchar", "varchar", "varchar", "varchar", "varchar", "varchar", "varchar")
	);
	insertEntry($DBH, 'project', $projectData);
	
	for($i = 0; $i < rand(0,10); $i++){
		$contractId = fetchNextFreeId($DBH, 'contract', 'id');
		$contractData = array(
		array("id", "valid_starttime", "lname", "fname", "sign_day"),
		array($contractId, getTimestamp(), generateRandomWord(), generateRandomWord(), generateRandomDate()),
		array("int", "datetime", "varchar", "varchar", "date")
		);
		insertEntry($DBH, 'contract', $contractData);
		joinTables($DBH, $innoDBH, "project", $projectId, "contract", $contractId);
		echo("contractId " . $contractId . "<br>");
	}
	
	for($i = 0; $i < rand(0,10); $i++){
		$externalStakeHolderId = fetchNextFreeId($DBH, 'externalstakeholder', 'id');
		$ESHData = array(
		array("id", "valid_starttime", "country", "contactperson_firstname", "contactperson_lastname"),
		array($externalStakeHolderId, getTimestamp(), generateRandomWord(), generateRandomWord(), generateRandomWord()),
		array("int", "datetime", "varchar", "varchar", "varchar")
		);
		insertEntry($DBH, 'externalstakeholder', $ESHData);
		joinTables($DBH, $innoDBH, "project", $projectId, "externalstakeholder", $externalStakeHolderId);
		echo("ESHId " . $externalStakeHolderId . "<br>");
	}
	
	for($i = 0; $i < rand(0,10); $i++){
		$funderId = fetchNextFreeId($DBH, 'funder', 'id');
		$funderData = array(
		array("id", "valid_starttime", "funder_name"),
		array($funderId, getTimestamp(), generateRandomWord()),
		array("int", "datetime", "varchar")
		);
		insertEntry($DBH, 'funder', $funderData);
		joinTables($DBH, $innoDBH, "project", $projectId, "funder", $funderId);
		echo("funderId " . $funderId . "<br>");
	}
	
	for($i = 0; $i < rand(0,10); $i++){
		$projectpartnerId = fetchNextFreeId($DBH, 'projectpartner', 'id');
		$projectpartnerData = array(
		array("id", "valid_starttime", "degree_program"),
		array($projectpartnerId, getTimestamp(), generateRandomWord()),
		array("int", "datetime", "varchar")
		);
		insertEntry($DBH, 'projectpartner', $projectpartnerData);
		joinTables($DBH, $innoDBH, "project", $projectId, "projectpartner", $projectpartnerId);
		echo("projectpartnerId " . $projectpartnerId . "<br>");
	}
	
	for($i = 0; $i < rand(0,10); $i++){
		$researchpermitId = fetchNextFreeId($DBH, 'researchpermit', 'id');
		$researchpermitData = array(
		array("id", "valid_starttime", "research_name", "research_permit_type", "organisation", "first_name", "last_name"),
		array($researchpermitId, getTimestamp(), generateRandomWord(), generateRandomWord(), generateRandomWord(), generateRandomWord(), generateRandomWord()),
		array("int", "datetime", "varchar", "varchar", "varchar", "varchar", "varchar")
		);
		insertEntry($DBH, 'researchpermit', $researchpermitData);
		joinTables($DBH, $innoDBH, "project", $projectId, "researchpermit", $researchpermitId);
		echo("researchpermitId " . $researchpermitId . "<br>");
	}
	echo("//<br>");
}	
	}
	@populateDB($DBH, $innoDBH);
}catch(Exception $e){
	$log = new Log();
		$log->error($e);
		return false;
}








?>
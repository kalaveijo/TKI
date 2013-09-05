<?php

include_once("../common/dbConnect.php");
include_once("../common/functions.php");
include_once("../common/dbFunctions.php");

//echo (getTimestamp());
//echo (fetchNextFreeId($DBH, "projekti", "id"));
//echo(joinTables($DBH, "projekti", 1, "lisainfo", 1));
//print_r(selectCorrectJointable($innoDBH, "projekti", "lisainfo"));
/*
$multiarray = array(
array("identifier", "degree_program_related", "inspector", "metropolia_coordinator"),
array("herpderp", "Media engineering", "Turbo", "joonas"),
array("varchar", "varchar", "varchar", "varchar")
);

print_r(selectWhichColumnsToUpdate($DBH, $innoDBH, 'project', 1, $multiarray));*/

//echo(updateRelatedJoins($DBH, $innoDBH, 'projectpartner', 1, getTimeStamp(), true));

$project = queryProjectList($DBH);

do_dump($project);
?>
<?php

include_once("../phpClasses/Log.php");
include_once("../common/dbConnect.php");
include_once("../common/functions.php");
include_once("../common/dbFunctions.php");

if(isset($_POST['fetch'])){
	switch($_POST['fetch']){
		case "projectList":
			echo(json_encode(queryProjectList($DBH)));
			break;
		case "project":
			echo(json_encode(queryProject($DBH, $_POST['id'])));
			break;
	}
}

if(isset($_GET['fetch'])){
	echo(json_encode(queryProject($DBH, $_GET['id'])));
}



?>
<?php
session_start();

include_once("../phpClasses/Log.php");
include_once("../common/dbConnect.php");
include_once("../common/functions.php");
include_once("../common/dbFunctions.php");

if($_POST['logout']){
	// logout
	// echo true for javascript redirect
	unset($_SESSION['userName']);
	unset($_SESSION['valid']);
	echo(true);
}

//if username and password contain something
if(isset($_POST['userName']) && isset($_POST['userPsw'])){
	//check input with regex
	if(preg_match($nameExp, $_POST['userName']) && preg_match($pwdExp, $_POST['userPsw']) ){
		// check if user is in database
		if(checkLoginCredentials($DBH, $_POST['userName'], $_POST['userPsw'])){
			$_SESSION['userName'] = $_POST['userName'];
			$_SESSION['valid'] = true;
			echo(true);
		}else{
			echo(false);
		}
	}else{
		// echo false -> user should be informed that credentials were not proper
		echo(false);
	}	
}else{
	//echo false -> user should be informed that credentials are missing
	echo(false);
}





?>
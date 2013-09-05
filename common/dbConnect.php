<?php

include_once("../phpClasses/Log.php");

$host = 'localhost';//in xampp is localhost
$dbname = 'tki';
$username = 'root';
$password = '';


try {
	$DBH = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e) {
	$log = new Log();
	echo "Could not connect to database.";
	$log->error($e);
}

$host = 'localhost';//in xampp is localhost
$dbname = 'information_schema';
$username = 'root';
$password = '';

try {
	$innoDBH = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$innoDBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e) {
	$log = new Log();
	echo "Could not connect to database.";
	$log->error($e);
}

?>
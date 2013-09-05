<?php
session_start();

include_once("../phpClasses/Log.php");
include_once("../phpClasses/Sessionmanager.php");
include_once("../common/dbConnect.php");
include_once("../common/functions.php");
include_once("../common/dbFunctions.php");

$_SESSION['userName'] = "temp";
$_SESSION['valid'] = true;


//requires $_POST variable validations

$manager = new Sessionmanager($DBH, $_SESSION['userName'], $_SESSION['valid']);

echo(@$manager->javascriptMover($_POST['script'], json_decode($_POST['send'])));
/*
 * should actually be something like this
 * $manager = new Sessionmanager($DBH, $_SESSION['username'], $_SESSION['islogged']);
 */
?>
<?php

include_once("../phpClasses/Log.php");
include_once("../phpClasses/Filehandler.php");
include_once("../common/dbConnect.php");
include_once("../common/functions.php");
include_once("../common/dbFunctions.php");

$fileHandler = new Filehandler();

$fileHandler->storeFile(1, $_FILES['file']['tmp_name'], $_FILES['file']['name']);




?>
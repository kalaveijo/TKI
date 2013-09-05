<?php
session_start();

$_SESSION['test'] = "testitestitesti";
echo($_SESSION['test']);
echo($_SESSION['test1']);
?>

<!DOCTYPE html>
<html>
	<head>
		<script src="../js/jquery-1.8.2.min.js"></script>
		<script src="sessionAjaxIndex.js"></script>
	</head>
	<body id="body">
	</body>
</html>
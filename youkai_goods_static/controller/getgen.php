<?php 

	session_start();
		
	include_once("database.php");

	if(!isset($_SESSION['islogin']))
	{
		header('location: index.php');
		exit();
	}

	$status1 = fetchCsvfileStatus1();

	include('../generateFolder.php');
	include('../publish.php');

	new publish('csv_file/'.$status1['filename'], $status1['filename']);



?>

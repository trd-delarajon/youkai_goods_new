<?php 

	session_start();
		
	include_once("database.php");

	if(!isset($_SESSION['islogin']))
	{
		header('location: index.php');
		exit();
	}
	include('../generateFolder.php');
?>

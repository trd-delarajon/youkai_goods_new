<?php 

	session_start();
		
	include_once("database.php");

	if(!isset($_SESSION['islogin']))
	{
		header('location: ../index.php');
		exit();
	}


	if (array_key_exists('filename', $_POST)) 
	{
	//if (!empty($_POST['filename'])) {
		  $filename = $_POST['filename'];
		  if (file_exists($filename)) {
		    unlink($filename);
		    echo 'File '.$filename.' has been deleted';
		  } else {
		    echo 'Could not delete '.$filename.', file does not exist';
		  }
	}	

	echo json_encode($_POST);



?>

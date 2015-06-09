<?php
	
	session_start();

	include_once('database.php');
		
	if(!isset($_SESSION['islogin']))
	{
		header('location: index.php');
		exit();
	}


if(isset($_POST['username']))//If a username has been submitted 
{
	$username =  trim($_POST['username']);//Some clean up :)

		$check_for_username = check_username($username);

		if($check_for_username)
		{
			echo json_encode($check_for_username); //"1";
		}
		else
		{
			echo json_encode($check_for_username); //"0";//No Record Found 
		}
}

		


?>
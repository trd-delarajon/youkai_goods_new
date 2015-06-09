<?php 
		
	session_start();

	include_once('database.php');
		
	if(!isset($_SESSION['islogin']))
	{
		header('location: index.php');
		exit();
	}


		if (isset($_POST['id'])) {

			$user_id = $_POST['id'];
			
			deleteUser($user_id);
		}
		//echo json_encode($_POST['id'])
 ?>


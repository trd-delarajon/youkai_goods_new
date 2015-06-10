<?php 

	session_start();

	include_once('database.php');
		
	if(!isset($_SESSION['islogin']))
	{
		header('location: index.php');
		exit();
	}

	 	$user 		= $_SESSION['user'];
      	$user_id 	= $user['user_id'];

		if (isset($_POST)) {
			$fullname		= trim($_POST['name']);
			$username		= trim($_POST['user']);
			$password		= md5($_POST['pass']);

			updateAdmin($username, $password, $fullname, $user_id);
		}

		echo json_encode($_POST);






 ?>
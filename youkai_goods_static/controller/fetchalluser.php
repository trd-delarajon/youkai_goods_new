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


	$data = getAllAdmin($user_id);;

	echo json_encode(array("aaData"=>$data));


 ?>
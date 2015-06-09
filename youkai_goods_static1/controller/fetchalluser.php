<?php 
	
	include_once('database.php');
		
	if(!isset($_SESSION['islogin']))
	{
		header('location: index.php');
		exit();
	}

	$data = getAllAdmin();;

	echo json_encode(array("aaData"=>$data));


 ?>
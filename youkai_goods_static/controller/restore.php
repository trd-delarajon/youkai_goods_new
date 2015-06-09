<?php 
	session_start();
		
	include_once("database.php");

	if(!isset($_SESSION['islogin']))
	{
		header('location: ../index.php');
		exit();
	}


	//$newest_file = fetchCsvfile();// function newest status 1
	$status1 = fetchCsvfileStatus1();
	if (isset($_POST['csvid'])) 
	{
		if($status1['csv_id'])
		{
			$csv_id1  = $status1['csv_id']; //csv_id status 1 active
			restoreCsv1($csv_id1); //update the status 1 to 0 
		}
		$csv_id = $_POST['csvid'];
		restoreCsv($csv_id);
		echo $csv_id;
	}

 ?>


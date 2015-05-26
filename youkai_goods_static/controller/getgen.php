<?php 

	session_start();
		
	include_once("database.php");

	if(!isset($_SESSION['islogin']))
	{
		header('location: index.php');
		exit();
	}


	/*define ('url', dirname(__DIR__).'/');

	echo include_once(url.'generateHtml.php');*/
	//echo url;



?>
1
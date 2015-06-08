<?php
	session_start();

	include_once("../controller/database.php");

	if(!isset($_SESSION['islogin']))
	{
		header('location: index.php');
		exit();
	}

	$user 		= $_SESSION['user'];
	$user_id 	= $user['user_id'];

	$status1 = fetchCsvfileStatus1();

	function btnstatus($status,$num)
    {
          if($status=='1' && $num=='1'){
            return 'disabled';
          }
	}	

?>
<?php include_once("header.php"); ?>
	<div class="jumbotron">

			

    </div>
<?php include_once("footer.php"); ?>

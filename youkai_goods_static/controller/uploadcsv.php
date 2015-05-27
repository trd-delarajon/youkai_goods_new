<?php 


	session_start();
		
	include_once("database.php");

	if(!isset($_SESSION['islogin']))
	{
		header('location: index.php');
		exit();
	}

	$user 		= $_SESSION['user'];
	$user_id 	= $user['user_id'];

	$msg = '';
	$upload_dir = CSVFILE; //folder directory name 
	$status1 	= fetchCsvfileStatus1();
	$csv_id 	= $status1['csv_id'];

if (isset($_FILES["csv_file"]))//Upload File
{
		$file 	= $_FILES['csv_file'];
		$error 	= $file['error'];
		$name 	= $file['name'];
		$size 	= $file['size'];
		$type 	= $file['type'];
		$src 	= $file['tmp_name'];
		
	/*if ($size > 0) {*/
		if ($error > 0  ) {
		echo "Error: " . $error . "<br>";
		} else {
			$cname = date("Ymd H:i:s", time()).'.csv';
			move_uploaded_file($src, $upload_dir . $cname);
			//echo $msg ='Filename: '.$cname;
			uploadCsvfile($user_id, $csv_id, $cname);

			echo '<div class="alert alert-success text-center"><button type="button" class="close btn-xs" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Success!</strong> csv file successfully uploaded... </div>';
		}
	/*}else { echo '<div class="alert alert-danger text-center"><button type="button" class="close btn-xs" data-dismiss="alert" aria-hidden="true">&times;</button>Please choose a file!</div>'; }*/
}
 










 ?>
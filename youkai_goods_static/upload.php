<?php
$msg = '';
$upload_dir = "csv_file/"; //folder name
if (isset($_FILES["csv_file"]))
{
		$file 	= $_FILES['csv_file'];
		$error 	= $file['error'];
		$name 	= $file['name'];
		$size 	= $file['size'];
		$type 	= $file['type'];
		$src 	= $file['tmp_name'];
	if ($size > 0) {
		if ($error > 0  ) {
		echo "Error: " . $error . "<br>";
		} else {
			$cname = date("Ymd H:i:s", time()).'.csv';
			move_uploaded_file($src, $upload_dir . $cname);
			echo 'Filename: '.$cname;
		}
	}else {echo "Please choose a file!"; }
}
   		// echo "<pre>";
	    // print_r($_FILES);
	?>
<!-- <!DOCTYPE html>
<html> <head>

	 <meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <title>Upload</title>
 </head>
 <body>
	 
	<form id="formsubmit" method="post" enctype="multipart/form-data" > 
		<span class="formsg"></span>
		<input type="file" id="file" name="csv_file" accept=".csv">
		<button type="submit" id="">Upload</button>
		<span style="color:red"><?=$msg?></span>
	</form>
	
 </body>
</html> -->
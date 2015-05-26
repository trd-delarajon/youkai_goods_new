<?php
 	define ('csvfolder', getcwd().'/'."csv_file/");
	
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
			//echo $msg ='Filename: '.$cname;
		}
	}else { $msg = "Please choose a file!<br>"; }
}
   		/*echo "<pre>";
	    print_r($_FILES);*/
	
		//  echo'<pre>';
		//  print_r($files2);
		//  print_r($files);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Upload</title>
 </head>
<style>
 .container{
 margin: auto;
 width: 900px
 }
 td{
 padding: 5px 20px;
 text-align: left;
 }
</style>
 <body>
	<div class="container">
		<form id="formsubmit" method="post" enctype="multipart/form-data" > 
			<span class="formsg"></span>
			<input type="file" id="file" name="csv_file" accept=".csv">
			<button type="submit" id="">Upload</button>
			<span style="color:red"><?=$msg?></span>
		</form><br>
		<?php
		$newest_file = scandir(csvfolder, 1);
		echo 'csv_file: ' . $newest_file[0];
		?>
		
		<table border="1" style="table:table-collapsed;  margin:auto ; width:900px;">
			<thead>
				<tr>
					<th>Filename</th>
					<th>Date</th>
					<th>Uploaded</th>
				</tr>
			</thead>
			<tbody id="fetch">
			</tbody>
		</table>
	</div>
	<script src="stylesheets/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript">
	setInterval(function() { $.get("upload1.php", {}, function(data) { $("#fetch").html(data); }); }, 1000);
	</script>
 </body>
</html>
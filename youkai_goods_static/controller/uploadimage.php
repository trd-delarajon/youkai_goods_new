<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

include_once("database.php");

// Define a destination
$upload_dir = "/youkai_goods_new/youkai_goods_static/uploadimages/"; // Relative to the root

//if (isset($_POST['img'])) {
if (!empty($_FILES) == $upload_dir){
		$file 	= $_FILES['Filedata'];
		$error 	= $file['error'];
		$name 	= $file['name'];
		$size 	= $file['size'];
		$type 	= $file['type'];
		$src 	= $file['tmp_name'];
		
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . $upload_dir;
		$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
		// Validate the file type
		$fileTypes = array('jpg','jpeg'); // File extensions
		$fileParts = pathinfo($name);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($src,$targetFile);
		echo'<div class="alert alert-success text-center"><button type="button" class="close btn-xs" data-dismiss="alert" aria-hidden="true">&times;</button>Images Uploaded</div>';
	} else {
		
		echo '<div class="alert alert-danger text-center"><button type="button" class="close btn-xs" data-dismiss="alert" aria-hidden="true">&times;</button>Invalid file type.</div>';
	}
}

//echo $upload_dir;
?>
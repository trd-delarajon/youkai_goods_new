<?php 

	include_once('controller/database.php');

	
//define ('base_url', dirname(__DIR__).'/'."youkai_goods_static/generate_folder/");
define ('base_url', dirname(__DIR__).'/'."youkai_goods_static/HTML-Files");

$status1 = fetchCsvfileStatus1();
	

$path 		= base_url.'/'.$status1['filename'];
$message 	= " Folder created ";

	

if(!file_exists($path)){
    if (!mkdir($path, 0777, true)) {//0777
        die('0');
    }else{
    	echo '1';
    }
}



 ?>
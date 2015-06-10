<?php 

include_once('controller/database.php');
include_once('publish.php');

define ('base_url', dirname(__DIR__).'/'."youkai_goods_static/HTML-Files");

$status1 = fetchCsvfileStatus1();
$version = countCsv();
$min 	 = date('Ymd'.'-'.'H:i:s', time());


//$folderVersion	= substr($status1['filename'], 0, 8).$min.'Ver'.$version;
$folderVersion	= $min.'Ver'.$version;
$path 			= base_url.'/'.$folderVersion;

/*echo $folderVersion."<br>";

echo $status1['filename'];*/


if(!file_exists($path)){
	if (!mkdir($path, 0777, true)) {//0777
		die('0');
	}else{
		
		$staticHTML = new publish($status1['filename'], $folderVersion);
		echo '1';
	}
}

?>
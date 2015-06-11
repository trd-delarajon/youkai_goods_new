<?php /*

include_once('controller/database.php');
include_once 'publish.php';
	
//define ('base_url', dirname(__DIR__).'/'."youkai_goods_static/generate_folder/");
define ('base_url', dirname(__DIR__).'/'."youkai_goods_static/HTML-Files");

$status1 = fetchCsvfileStatus1();
	
$path 		= base_url.'/'.$status1['filename'];

if(!file_exists($path)){
    if (!mkdir($path, 0777, true)) {//0777
        die('0');
    }else{
		$staticHTML = new publish($status1['filename'],$status1['filename']);
    	echo '1';
    }
}

?>*/

include_once('controller/database.php');
include_once('publish.php');

//define ('base_url', dirname(__DIR__).'/'."youkai_goods_static/generate_folder/");
define ('base_url', dirname(__DIR__).'/'."youkai_goods_static/HTML-Files");

$status1 = fetchCsvfileStatus1();
$version = countCsv();
$folderVersion = substr($status1['filename'], 0, 8).'Ver'.$version;
$path 		= base_url.'/'.$folderVersion;

if(!file_exists($path)){
	if (!mkdir($path, 0777, true)) {//0777
		die('0');
	}else{
		
		$staticHTML = new publish($status1['filename'], $folderVersion);
		echo '1';
	}
}

?>
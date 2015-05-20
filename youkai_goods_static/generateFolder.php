<?php 


define ('base_url', getcwd().'/'."generate_html/");
//define ('base_url', dirname(__DIR__).'/'."youkai_goods_static/generate_folder/");
$date 		= date('Ymd H:i:s');
$path 		= base_url.$date;
$message 	= " Folder created ";



if(!file_exists($path)){
    if (!mkdir($path, 0777, true)) {//0777
        die('Failed to create folder...');
    }
}

echo 'Foldername: '.$date.$message.'</br></br></br>';

 ?>
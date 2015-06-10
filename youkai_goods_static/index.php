<?php 



	$directory = "HTML-Files/";
 
	$files = glob($directory . "*");
	 
 	//$a = each($files)[1];
 	$a 	= end($files);
	echo 'Lastest Static HTML: '.$a.'<br><br>';


	//header("location:".$a."/indexPage1.html");

	//include_once("$a/indexPage1.html");
	foreach($files as $file)
	{

	
		 if(is_dir($file))
		 {
		  echo '<a href="'.$file.'" alt="">'.$file.'</a><br>';
		 }

	}


 ?>
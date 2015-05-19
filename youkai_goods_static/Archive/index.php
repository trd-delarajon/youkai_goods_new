<?php 

	require_once("config.php");
	require_once("gen.php");


	 $csvdata = readCSV($csvFile);//function gen.php
	 $smarty->assign('csvdata', $csvdata);
	

	$smarty->display('index.tpl');

 ?>
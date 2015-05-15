<?php 

	require_once("config.php");
	require_once("gen.php");


	$csv = readCSV($csvFile);
	$smarty->assign('csvarr', $csv);
	$smarty->display('index.tpl');

 ?>
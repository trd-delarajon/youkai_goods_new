<?php 

	require_once("config.php");
	include __DIR__ .'/youkaiClass.php';
	define('NEW_STATUS','wp-content/themes/Avada/images/img/new_icon.png');
	$youkai = new youkaiClass();
	$data;
	$csvFile;
	$dataToSmarty;

	function readCSV($csvFile){
		global $data;
		global $youkai;

		$file_handle = fopen($csvFile, 'r');
		while (!feof($file_handle) ) {
			$data[] = fgetcsv($file_handle);
		}
		fclose($file_handle);
		$youkai->setCSVData($data);
	}

	

	$csvFile = 'csv_file/sampleData.csv';
	readCSV($csvFile);

	// $csvYeah = array('imgURL' => $data[0][0]);

	$smarty->assign('csvData', $data);
	$smarty->assign('singleLink',$youkai->getSingle_page_link());
	$smarty->assign('maxItem', $youkai->getMaxItem());
	$smarty->assign('newIcon', NEW_STATUS);
	$smarty->assign('numIndex', $youkai->getTotal_index());
	$smarty->assign('indexPage', 1);
	// echo '<pre>';
	// print_r($youkai->getCSVData());
	// echo '</pre>';

	// echo '<pre>';
	// print_r($youkai->getSingle_page_link());
	// echo '</pre>';

	// echo $youkai->getMaxItem();
	// echo '<pre>';
	// print_r($csvYeah['imgURL']);
	// echo '</pre>';
	$smarty->display('index.tpl');

 ?>
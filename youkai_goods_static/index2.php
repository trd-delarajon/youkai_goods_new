<?php
include __DIR__ .'/youkaiClass.php';

	$youkai = new youkaiClass();
	$data;
	$myArray;
	
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

	$csvFile = 'csv_file/sampleData2.csv';
	readCSV($csvFile);
// 	$csv = array_map('str_getcsv', file($csvFile));
// 	echo '<pre>';
// 	print_r($csv);
// 	echo '</pre>';
	
// 	echo '<pre>';
// 	print_r(explode("\\n", $csv[0][5]));
// 	echo '</pre>';
	$myArray[0] = $youkai->getCSVData()[0];
	$myArray[1] = $youkai->getCSVData()[5];
	
	echo '<h1>hello general</h1>';
	echo '<pre>';
	print_r($youkai->getCSVData());
	echo '</pre>';
	
	echo '<h1>hello</h1>';
	echo '<pre>';
	print_r($youkai->getProd_Desc_Array());
	echo '</pre>';
	
	echo '<h1>hello Images</h1>';
	echo '<pre>';
	print_r($youkai->getImg_Path_Array());
	echo '</pre>';
	
	echo '<h1>hello external links</h1>';
	echo '<pre>';
	print_r($youkai->getExternal_Links_Array());
	echo '</pre>';
	
	echo '<h1>hello external links label</h1>';
	echo '<pre>';
	print_r($youkai->getExternal_Links_Label_Array());
	echo '</pre>';
	
	echo '<h1>number of img inside array</h1>';
	echo '<pre>';
	echo count($youkai->getImg_Path_Array()[0]);
	echo '</pre>';
	
	echo '<h1>Hello SinglePage Link</h1>';
	echo '<pre>';
	print_r($youkai->getSingle_page_link());
	echo '</pre>';
	
	$foo = array("Robert" => $youkai->getExternal_Links_Array(), "Seppo" => $youkai->getExternal_Links_Label_Array());
	$bar = each($foo);
	echo '<pre>';
	print_r($foo);
	echo '</pre>';
	
	function categ($var){
		return ($var[0] === "prize");
	}
	
	function myfunction($v)
	{
		
	}

	echo '<h1>Hello Category</h1>';
	echo '<pre>';
	print_r(array_filter( $youkai->getCSVData(),"categ"));
	echo '</pre>';
?>
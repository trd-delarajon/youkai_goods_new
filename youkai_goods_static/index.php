<?php 

		require_once("config.php");
		$smarty->display('index2.tpl');
/*	require_once("config.php");
	include __DIR__ .'/youkaiClass.php';
	define('NEW_STATUS','../../wp-content/themes/Avada/images/img/new_icon.png');
	define('FILE_PATH2', dirname(__FILE__).'/HTML-Files/HTML_version');
	define('INDEX_LINK', 'hamburger');
	$youkai = new youkaiClass();
	$data;
	$csvFile;
	

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
	$CSVDATA;
	$CSVSingleLink;
	$dataToSmarty;
	$singleLinkSmarty;
	$pageIndex;
	// $csvYeah = array('imgURL' => $data[0][0]);

// 	$smarty->assign('csvData', $data);
// 	$smarty->assign('singleLink',$youkai->getSingle_page_link());
// 	$smarty->assign('maxItem', $youkai->getMaxItem());
// 	$smarty->assign('newIcon', NEW_STATUS);
// 	$smarty->assign('numIndex', $youkai->getTotal_index());
// 	$smarty->assign('indexPage', 1);
	
	$CSVDATA = $youkai->getCSVData();
	$CSVSingleLink = $youkai->getSingle_page_link();
	$pageIndex=1;
	$remainItem;
	$htmlOutput;
	$var2=0;
	for( $var=0;$var < $youkai->getTotal_items(); $var++){
		$remainItem=true;
		echo $var.'var'.'</br>';
		echo $var2.'var2'.'</br>';
		$dataToSmarty[] =  $CSVDATA[$var];
		$singleLinkSmarty = $CSVSingleLink[$var];
		
		if($var2 == $youkai->getMaxItem()-1){
			$smarty->assign('csvData', $dataToSmarty);
			$smarty->assign('singleLink',$singleLinkSmarty);
			$smarty->assign('maxItem', $youkai->getMaxItem());
			$smarty->assign('newIcon', NEW_STATUS);
			$smarty->assign('numIndex', $youkai->getTotal_index());
			$smarty->assign('indexLink', INDEX_LINK);
			$smarty->assign('indexPage', $pageIndex++);
// 			$smarty->display('index.tpl');
// 			$htmlOutput[] = $smarty->fetch('index.tpl');
			echo '<pre>';
			print_r($dataToSmarty);
			echo '</pre>';
			$dataToSmarty = null;
			$singleLinkSmarty = null;
			$remainItem=false;
			$var2=-1;
		}	
// 		else if($remainItem==true){
// 			$smarty->assign('csvData', $dataToSmarty);
// 			$smarty->assign('singleLink',$singleLinkSmarty);
// 			$smarty->assign('maxItem', $youkai->getMaxItem());
// 			$smarty->assign('newIcon', NEW_STATUS);
// 			$smarty->assign('numIndex', $youkai->getTotal_index());
// 			$smarty->assign('indexPage', $pageIndex);
// 			echo '<pre>';
// 			print_r($dataToSmarty);
// 			echo '</pre>';
// // 			$htmlOutput[] = $smarty->display('index.tpl');
// 			$dataToSmarty = null;
// 			$singleLinkSmarty = null;
// 		}
		$var2++;
	}
	
	// echo '<pre>';
	// print_r($youkai->getCSVData());
	// echo '</pre>';
	
// 	echo '<pre,</br></br>';
// 	echo '<h1>helo</h1>';
// 	print_r($youkai->getTotal_items());
// 	print_r($youkai->getTotal_index());
// 	echo '</pre>';
	
// 	for($var=0;$var<count($htmlOutput);$var++){
// 		file_put_contents(FILE_PATH2."/hamburger".($var+1).".html", $htmlOutput[$var]);
// 	}
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
// 	*/

 ?>
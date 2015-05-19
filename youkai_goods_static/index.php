<?php 

	require_once("config.php");
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
			echo '<pre>';
			print_r($pageIndex);
			echo '</pre>';
			$smarty->assign('indexPage', $pageIndex++);
			$smarty->display('index.tpl');
			$htmlOutput[] = $smarty->fetch('index.tpl');
			echo '<pre>';
			print_r($dataToSmarty);
			echo '</pre>';
			$dataToSmarty = null;
			$singleLinkSmarty = null;
			$remainItem=false;
			$var2=-1;
		}	

		$var2++;
	}

	for($var=0;$var<count($htmlOutput);$var++){
		file_put_contents(FILE_PATH2."/".INDEX_LINK.($var+1).".html", $htmlOutput[$var]);
	}

 ?>
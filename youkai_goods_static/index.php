<?php 

	require_once("config.php");
	include __DIR__ .'/youkaiClass.php';
	define('NEW_STATUS','../../wp-content/themes/Avada/images/img/new_icon.png');
	define('FILE_PATH2', dirname(__FILE__).'/HTML-Files/HTML_version');
	define('INDEX_LINK', 'topPage');
	define('SINGLE_LINK', 'singlePage');
	$youkai = new youkaiClass();
	$data;
	$csvFile;
	
	//read the csv file and placing the data in object
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
	$CSVDATA = $youkai->getCSVData();
	$CSVSingleLink = $youkai->getSingle_page_link();
	$topPageHtmlOutput;
	$singlePageHtml;
	
	function processTopPageHtml(){
		global $youkai;
		global $CSVDATA;
		global $CSVSingleLink;
		global $smarty;
		$total_item = $youkai->getTotal_items();
		$max_item = $youkai->getMaxItem()-1;
		$total_index = $youkai->getTotal_index();
		$img_path_array = $youkai->getImg_Path_Array();
		$counter = 0;
		$pageIndex=1;
		$dataToSmarty;
		$singleLinkSmarty;
		$HtmlOutput;
		for( $var=0;$var < $total_item; $var++){
			$dataToSmarty[] =  $CSVDATA[$var];
			$singleLinkSmarty = $CSVSingleLink[$var];
			if($counter == $max_item){
				$smarty->assign('csvData', $dataToSmarty);
				$smarty->assign('singleLink',$singleLinkSmarty);
				$smarty->assign('maxItem', $max_item);
				$smarty->assign('numIndex', $total_index);
				$smarty->assign('img_path_array', $img_path_array);
				$smarty->assign('indexPage', $pageIndex++);
				$smarty->assign('newIcon', NEW_STATUS);
				$smarty->assign('indexLink', INDEX_LINK);
				$HtmlOutput[] = $smarty->fetch('index.tpl');
				$dataToSmarty = null;
				$singleLinkSmarty = null;
				$counter=-1;
			}
			$counter++;
		}
		return $HtmlOutput;
	}
	
	function processSingleHtml(){
		global $youkai;
		global $CSVDATA;
		global $smarty;
		$total_item = $youkai->getTotal_items();
		$img_path_array = $youkai->getImg_Path_Array();
		$prod_desc_array = $youkai->getProd_Desc_Array();
		$external_links_array = $youkai->getExternal_Links_Array();
		$external_links_label_array = $youkai->getExternal_Links_Label_Array();
		$htmlOutput;
		for($var=0; $var < $total_item; $var++){
			$htmlOutput[] = $smarty->fetch('single_page.tpl');
		}
		return $htmlOutput;
	}
	// $singlePageHtml = processSingleHtml();
	// for($var=0;$var<count($singlePageHtml);$var++){
	// 	file_put_contents(FILE_PATH2."/".SINGLE_LINK.($var+1).".html", $singlePageHtml[$var]);
	// }
	$topPageHtmlOutput = processTopPageHtml();
	for($var=0;$var<count($topPageHtmlOutput);$var++){
		file_put_contents(FILE_PATH2."/".INDEX_LINK.($var+1).".html", $topPageHtmlOutput[$var]);
	}




	function processCategoryListHtml(){


		
	}
	
 ?>
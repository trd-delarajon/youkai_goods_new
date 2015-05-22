<?php 

	require_once("config.php");
	include __DIR__ .'/youkaiClass.php';
	define('NEW_STATUS','../../wp-content/themes/Avada/images/img/new_icon.png');
	define('FILE_PATH2', dirname(__FILE__).'/HTML-Files/HTML_version');
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

	$csvFile = 'csv_file/sampleData.csv';
	readCSV($csvFile);
	$CSVDATA = $youkai->getCSVData();
	$CSVSingleLink = $youkai->getSingle_page_link();
	$categories;
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
		$HtmlOutput = array();
		for( $var=0;$var < $total_item; $var++){
			$dataToSmarty[] =  $CSVDATA[$var];
			$singleLinkSmarty[] = $CSVSingleLink[$var];
			if($counter == $max_item){
				$smarty->assign('csvData', $dataToSmarty);
				$smarty->assign('singleLink',$singleLinkSmarty);
				$smarty->assign('maxItem', $max_item);
				$smarty->assign('numIndex', $total_index);
				$smarty->assign('img_path_array', $img_path_array);
				$smarty->assign('indexPage', $pageIndex++);
				$smarty->assign('newIcon', NEW_STATUS);
				$smarty->assign('indexLink', INDEX_LINK);
				echo '$max_item '.$max_item.'<br>';
				echo '$total_index '.$total_index.'<br>';
				echo '$pageIndex '.$pageIndex.'<br>';
				$HtmlOutput[] = $smarty->fetch('index.tpl');
				$dataToSmarty = null;
				$singleLinkSmarty = null;
				$counter=-1;
			}
			$counter++;
		}
		if($counter > 0){
			$smarty->assign('csvData', $dataToSmarty);
			$smarty->assign('singleLink',$singleLinkSmarty);
			$smarty->assign('maxItem', $max_item);
			$smarty->assign('numIndex', $total_index);
			$smarty->assign('img_path_array', $img_path_array);
			$smarty->assign('indexPage', $pageIndex++);
			$smarty->assign('newIcon', NEW_STATUS);
			$smarty->assign('indexLink', INDEX_LINK);
			echo '$max_item '.$max_item.'<br>';
			echo '$total_index '.$total_index.'<br>';
			echo '$pageIndex '.$pageIndex.'<br>';
			$HtmlOutput[] = $smarty->fetch('index.tpl');
			$dataToSmarty = null;
			$singleLinkSmarty = null;
			$counter=-1;
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
			$smarty->assign('csvData', $CSVDATA[$var]);
			$smarty->assign('img_path_array', $img_path_array);
			$smarty->assign('prod_desc_array', $prod_desc_array);
			$smarty->assign('external_links_array', $external_links_array);
			$smarty->assign('external_links_label_array', $external_links_label_array);
			$smarty->assign('newIcon', NEW_STATUS);
			$smarty->assign('indexItem', $var);
			$htmlOutput[] = $smarty->fetch('single_page.tpl');
		}
		return $htmlOutput;
	}
	
	function processCategoryHtml(){
		$category_list = array("toy","dcd","carddas	","gashapon","pramo","candy","dailynec"
								,"fashionaccessories","prize","stationery","food");
		global $youkai;
		global $CSVDATA;
		global $CSVSingleLink;
		global $smarty;
		global $categories;
		$img_path_array = $youkai->getImg_Path_Array();
		$dataToSmarty;
		$htmlOutput;
		$indexItem;
		for($index=0;$index<count($category_list); $index++){
			$category = $category_list[$index];
			$categories[$category] = array_filter($youkai->getCSVData(), function($csvdata) use ($category) { return $csvdata[0] === $category ;});
		}
		$itemIndex = array_keys($categories[$category_list[0]]);
		//takes care of removing NULL array elements
		//$categories = array_filter($categories);
		echo '<pre>';
		print_r($categories);
		echo '</pre>';
		echo '<pre>';
		print_r(count($categories['toy']));
		echo '</pre>';
		echo '<pre>';
		echo '<h1>hello</h1>';
		print_r($categories['toy']);
		echo '</pre>';
		echo '<pre>';
		echo '<h1>$itemIndex</h1>';
		print_r($itemIndex);
		echo '</pre>';
		
		$temp;
		$temp2;
		
		for($var2=0;$var2 < count($category_list); $var2++){
			if($category_list[$var2] == "toy"){
				for($var=0; $var < count($categories['toy']); $var++){
					if($var != MAX_ITEM_CATEG){
						$dataToSmarty[] = $categories['toy'][$itemIndex[$var]];
						$temp[] = $img_path_array[$itemIndex[$var]][0];
						$temp2[] = $CSVSingleLink[$itemIndex[$var]];
					}
				}
			}
		}
		
		echo '<pre>';
		echo '<h1>$$dataToSmarty</h1>';
		print_r($dataToSmarty);
		echo '</pre>';
		echo '<pre>';
		echo '<h1>$temp</h1>';
		print_r($temp);
		echo '</pre>';
		echo '<pre>';
		echo '<h1>$temp2</h1>';
		print_r($temp2);
		echo '</pre>';
		$smarty->assign('dataToSmarty',$dataToSmarty);
		$smarty->assign('img_path_array', $temp);
		$smarty->assign('singleLinkSmarty', $temp2);
		$smarty->assign('newIcon', NEW_STATUS);
		$htmlOutput = $smarty->fetch('category.tpl');
// 		print_r($categories);
// 		echo '<h1>HELLO</h1>';
// 		echo '<pre>';
// 		print_r(array_keys($categories['toy']));
// 		echo '</pre>';
		return $htmlOutput;
	}
	
// 	$singlePageHtml = processSingleHtml();
// 	for($var=0;$var<count($singlePageHtml);$var++){
// 		file_put_contents(FILE_PATH2."/".SINGLE_LINK.($var+1).".html", $singlePageHtml[$var]);
// 	}
	
	$topPageHtmlOutput = processTopPageHtml();
	for($var=0;$var<count($topPageHtmlOutput);$var++){
		file_put_contents(FILE_PATH2."/".INDEX_LINK.($var+1).".html", $topPageHtmlOutput[$var]);
	}
// 	file_put_contents(FILE_PATH2."/".INDEX_LINK.".html", processCategoryHtml());
 ?>
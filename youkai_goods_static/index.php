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

	$csvFile = 'csv_file/sampleData3.csv';
	readCSV($csvFile);
	$CSVDATA = $youkai->getCSVData();
	$CSVSingleLink = $youkai->getSingle_page_link();
	$categories;
	$topPageHtmlOutput;
	$singlePageHtml;
	$categoryPageHtml;
	
	function processIndexPageHtml(){
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
				$smarty->assign('numIndex', $total_index);
				$smarty->assign('img_path_array', $img_path_array);
				$smarty->assign('indexPage', $pageIndex);
				$smarty->assign('newIcon', NEW_STATUS);
				$smarty->assign('indexLink', INDEX_LINK);
				echo 'index Page'.($pageIndex) .'<br>';
				echo '$total_index '.$total_index.'<br>';
				echo '$pageIndex '.$pageIndex.'<br><br>';
				$HtmlOutput[] = $smarty->fetch('index.tpl');
				$dataToSmarty = null;
				$singleLinkSmarty = null;
				$counter=-1;
				$pageIndex++;
			}
			$counter++;
		}
		if($counter > 0){
			$smarty->assign('csvData', $dataToSmarty);
			$smarty->assign('singleLink',$singleLinkSmarty);
			$smarty->assign('maxItem', $max_item);
			$smarty->assign('numIndex', $total_index);
			$smarty->assign('img_path_array', $img_path_array);
			$smarty->assign('indexPage', $pageIndex);
			$smarty->assign('newIcon', NEW_STATUS);
			$smarty->assign('indexLink', INDEX_LINK);
			echo 'index Page'.($pageIndex) .'<br>';
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
	
	function processCategoryHtml($category){
		global $youkai;
		global $CSVDATA;
		global $CSVSingleLink;
		global $smarty;
		global $categories;
		$img_path_array = $youkai->getImg_Path_Array();
		$total_index = $youkai->getTotal_index();
		$categories[$category] = array_filter($youkai->getCSVData(), function($csvdata) use ($category) { return $csvdata[0] === $category ;});
		$htmlOutput = array();
		$counter = 0;
		$pageIndex = 1;
		$indexItem;
		$singleLinkSmarty;
		if($categories[$category] == null){
			
		}
		else{
			
			$indexPage;
			$indexImgPathArr;
			$dataToSmarty;
			$itemIndex = array_keys($categories[$category]);
			if((count($categories[$category]) % MAX_ITEM_CATEG) != 0)
				$indexPage = (int)((count($categories[$category]) / MAX_ITEM_CATEG)) + 1;
			else
				$indexPage = (count($categories[$category]) / MAX_ITEM_CATEG);
			
			for($var=0; $var < count($categories[$category]); $var++){
				$dataToSmarty[] = $categories[$category][$itemIndex[$var]];
				$indexImgPathArr[] = $img_path_array[$itemIndex[$var]][0];
				$singleLinkSmarty[] = $CSVSingleLink[$itemIndex[$var]];
				if($counter == MAX_ITEM_CATEG-1){
					$smarty->assign('dataToSmarty',$dataToSmarty);
					$smarty->assign('numIndex', $indexPage);
					$smarty->assign('indexPage', $pageIndex);
					$smarty->assign('img_path_array', $indexImgPathArr);
					$smarty->assign('singleLinkSmarty', $singleLinkSmarty);
					$smarty->assign('newIcon', NEW_STATUS);
					$smarty->assign('categoryLink', $category);
					$htmlOutput[] = $smarty->fetch('category.tpl');
					$dataToSmarty = null;
					$indexImgPathArr = null;
					$singleLinkSmarty = null;
					$counter=-1;
					$pageIndex++;
				}
				$counter++;
			}
			if($counter > 0){
				$smarty->assign('dataToSmarty',$dataToSmarty);
				$smarty->assign('numIndex', $indexPage);
				$smarty->assign('indexPage', $pageIndex);
				$smarty->assign('img_path_array', $indexImgPathArr);
				$smarty->assign('singleLinkSmarty', $singleLinkSmarty);
				$smarty->assign('newIcon', NEW_STATUS);
				echo 'index Page'.($pageIndex) .'<br>';
				echo '$$tempIndex '.$indexPage.'<br>';
				echo '$pageIndex '.$pageIndex.'<br><br>';
				$htmlOutput[] = $smarty->fetch('category.tpl');
				$dataToSmarty = null;
				$indexImgPathArr = null;
				$singleLinkSmarty = null;
				$counter=-1;
			}
		}
		
		return $htmlOutput;
	}
// 	$singlePageHtml = processSingleHtml();
// 	for($var=0;$var<count($singlePageHtml);$var++){
// 		file_put_contents(FILE_PATH2."/".SINGLE_LINK.($var+1).".html", $singlePageHtml[$var]);
// 	}
	
// 	$topPageHtmlOutput = processIndexPageHtml();
// 	for($var=0;$var<count($topPageHtmlOutput);$var++){
// 		file_put_contents(FILE_PATH2."/".INDEX_LINK.($var+1).".html", $topPageHtmlOutput[$var]);
// 	}
	
	/***temp code***/
	/*
	for($var=0;$var<count($categoryPageHtml);$var++){
		file_put_contents(FILE_PATH2."/".CATEGORY_LINK.($var+1).".html", $categoryPageHtml[$var]);
	}
	*/
	
	$category_list2 = array("toy","dcd","carddas","gashapon","pramo","candy","dailynec"
			,"fashionaccessories","prize","stationery","food");
	
	for($var = 0; $var < count($category_list2); $var++){
		$categoryPageHtml[$category_list2[$var]] = processCategoryHtml($category_list2[$var]);
	}
	
// 	for($var = 0; $var < count($category_list2); $var++){
// 		if($categoryPageHtml[$category_list2[$var]] != null){
// 			for($var2 = 0; $var2 < count($categoryPageHtml[$category_list2[$var]]); $var2++){
// 				file_put_contents(FILE_PATH2."/".$category_list2[$var].($var2+1).".html", $categoryPageHtml[$category_list2[$var]][$var2]);
// 			}
// 			echo '<pre>';
// 			echo '<h1>count($categoryPageHtml[$category_list2[$var]])</h1>';
// 			print_r(count($categoryPageHtml[$category_list2[$var]]));
// 			echo '</pre>';
// 		}
// 	}
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo dirname(__DIR__).'<br>';
	echo $actual_link.'<br>';
// 	echo '<pre>';
// 	echo '<h1>$categoryPageHtml</h1>';
// 	print_r($categoryPageHtml);
// 	echo '</pre>';
 ?>
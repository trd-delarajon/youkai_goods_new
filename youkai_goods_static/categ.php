<?php
	require_once("config.php");
	
	$smarty->display('single_page.tpl');

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
		$total_index = $youkai->getTotal_index();
		$pageIndex = 1;
		$htmlOutput = array();
		$indexItem;
		$counter = 0;
		for($index=0;$index<count($category_list); $index++){
			$category = $category_list[$index];
			$categories[$category] = array_filter($youkai->getCSVData(), function($csvdata) use ($category) { return $csvdata[0] === $category ;});
		}
		$itemIndex = array_keys($categories[$category_list[0]]);
		echo '<pre>';
		echo '<h1>count($categories["toy"])</h1>';
		print_r(count($categories['toy']));
		echo '</pre>';
		echo '<pre>';
		echo '<h1>$itemIndex</h1>';
		print_r($itemIndex);
		echo '</pre>';
	
		$temp;
		$temp2;
	
		/**temp code**/
		/*
			$tempIndex;
	
			if((count($categories["toy"]) % 14) != 0)
				$tempIndex = (int)((count($categories["toy"]) / MAX_ITEM_CATEG)) + 1;
				else
					$tempIndex = (count($categories["toy"]) / MAX_ITEM_CATEG);
					*/
	
				for($var2=0;$var2 < count($category_list); $var2++){
					$categ = $category_list[$var2];
					if($categories[$categ] == null){
						echo '<pre>';
						echo '<h1>'.$categ.'</h1>';
						print_r($categories[$categ]);
						echo '</pre>';
					}
					else{
						$tempIndex;
	
						if((count($categories[$categ]) % MAX_ITEM_CATEG) != 0)
							$tempIndex = (int)((count($categories[$categ]) / MAX_ITEM_CATEG)) + 1;
						else
							$tempIndex = (count($categories[$categ]) / MAX_ITEM_CATEG);
	
						for($var=0; $var < count($categories[$categ]); $var++){
							$dataToSmarty[] = $categories['toy'][$itemIndex[$var]];
							$temp[] = $img_path_array[$itemIndex[$var]][0];
							$temp2[] = $CSVSingleLink[$itemIndex[$var]];
							if($counter == MAX_ITEM_CATEG-1){
								$smarty->assign('dataToSmarty',$dataToSmarty);
								$smarty->assign('numIndex', $tempIndex);
								$smarty->assign('indexPage', $pageIndex);
								$smarty->assign('img_path_array', $temp);
								$smarty->assign('singleLinkSmarty', $temp2);
								$smarty->assign('newIcon', NEW_STATUS);
								$smarty->assign('categoryLink', CATEGORY_LINK);
								echo 'index Page'.($pageIndex) .'<br>';
								echo '$$tempIndex '.$tempIndex.'<br>';
								echo '$pageIndex '.$pageIndex.'<br><br>';
								$htmlOutput[$categ] = $smarty->fetch('category.tpl');
								$dataToSmarty = null;
								$temp = null;
								$temp2 = null;
								$counter=-1;
								$pageIndex++;
							}
							$counter++;
						}
						if($counter > 0){
							$smarty->assign('dataToSmarty',$dataToSmarty);
							$smarty->assign('numIndex', $tempIndex);
							$smarty->assign('indexPage', $pageIndex);
							$smarty->assign('img_path_array', $temp);
							$smarty->assign('singleLinkSmarty', $temp2);
							$smarty->assign('newIcon', NEW_STATUS);
							echo 'index Page'.($pageIndex) .'<br>';
							echo '$$tempIndex '.$tempIndex.'<br>';
							echo '$pageIndex '.$pageIndex.'<br><br>';
							$htmlOutput[$categ] = $smarty->fetch('category.tpl');
							$dataToSmarty = null;
							$temp = null;
							$temp2 = null;
							$counter=-1;
						}
					}
						
					/***temp code***/
					/*
					 if($category_list[$var2] == "toy"){
					 for($var=0; $var < count($categories['toy']); $var++){
						$dataToSmarty[] = $categories['toy'][$itemIndex[$var]];
						$temp[] = $img_path_array[$itemIndex[$var]][0];
						$temp2[] = $CSVSingleLink[$itemIndex[$var]];
						if($counter == 13){
						$smarty->assign('dataToSmarty',$dataToSmarty);
						$smarty->assign('numIndex', $tempIndex);
						$smarty->assign('indexPage', $pageIndex);
						$smarty->assign('img_path_array', $temp);
						$smarty->assign('singleLinkSmarty', $temp2);
						$smarty->assign('newIcon', NEW_STATUS);
						$smarty->assign('categoryLink', CATEGORY_LINK);
						echo 'index Page'.($pageIndex) .'<br>';
						echo '$$tempIndex '.$tempIndex.'<br>';
						echo '$pageIndex '.$pageIndex.'<br><br>';
						$htmlOutput[] = $smarty->fetch('category.tpl');
						$dataToSmarty = null;
						$temp = null;
						$temp2 = null;
						$counter=-1;
						$pageIndex++;
						}
						$counter++;
						}
						if($counter > 0){
						$smarty->assign('dataToSmarty',$dataToSmarty);
						$smarty->assign('numIndex', $tempIndex);
						$smarty->assign('indexPage', $pageIndex);
						$smarty->assign('img_path_array', $temp);
						$smarty->assign('singleLinkSmarty', $temp2);
						$smarty->assign('newIcon', NEW_STATUS);
						echo 'index Page'.($pageIndex) .'<br>';
						echo '$$tempIndex '.$tempIndex.'<br>';
						echo '$pageIndex '.$pageIndex.'<br><br>';
						$htmlOutput[] = $smarty->fetch('category.tpl');
						$dataToSmarty = null;
						$temp = null;
						$temp2 = null;
						$counter=-1;
						}
						}
						*/
				}
				return $htmlOutput;
	}
?>
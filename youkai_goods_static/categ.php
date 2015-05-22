<?php
	require_once("config.php");
	
	$smarty->display('single_page.tpl');

	for($var=0;$var < count($category_list); $var++){
		if(!empty($categories[$category_list[$var]])){
			$itemIndex = array_keys($categories[$category_list[$var]]);
			for ($counter=0;$counter < count($categories[$category_list[$var]]); $counter++){
					
				if($counter != MAX_ITEM_CATEG){
					$dataToSmarty[] = $categories[$category_list[$var]][$itemIndex[$counter]];
				}
				$smarty->assign('itemIndex',$itemIndex);
				$smarty->assign('dataToSmarty',$dataToSmarty);
				$smarty->assign('img_path_array', $img_path_array);
				$smarty->assign('singleLinkSmarty', $CSVSingleLink);
				$smarty->assign('newIcon', NEW_STATUS);
				$htmlOutput[] = $smarty->fetch('category.tpl');
				$dataToSmarty = null;
				$itemIndex = null;
			}
				
			// 				foreach($categories[$category_list[$var]] as $values=>$keys){
			// 					$dataToSmarty[] = $keys;
			// 				}
			// 				$smarty->assign('itemIndex',array_keys($categories[$category_list[$var]]));
			// 				$smarty->assign('dataToSmarty',$dataToSmarty);
			// 				$smarty->assign('img_path_array', $img_path_array);
			// 				$smarty->assign('singleLinkSmarty', $CSVSingleLink);
			// 				$smarty->assign('max_item', MAX_ITEM_CATEG);
			// 				$smarty->assign('newIcon', NEW_STATUS);
			// 				$htmlOutput[$category_list[$var]] = $smarty->fetch('single_page.tpl');
			// 				echo '<h1>HELLO</h1>';
			// 				echo '<pre>';
			// 				echo '<h1>HELLO1</h1>';
			// 				print_r(count($categories[$category_list[$var]]));
			// 				echo '<h1>HELLO2</h1>';
			// 				print_r($dataToSmarty);
			// 				print_r(array_keys($categories[$category_list[$var]]));
			// 				echo '</pre>';
	
			// 				foreach ($dataToSmarty as $value){
			// 					echo '<pre>';
			// 					print_r($dataToSmarty);
			// 					echo '</pre>';
			// 				}
	
	}
		
				return $htmlOutput;
?>
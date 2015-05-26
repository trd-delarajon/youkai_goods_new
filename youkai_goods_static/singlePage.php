<?php
$smarty->assign('csvData', $dataToSmarty);
$smarty->assign('singleLink',$singleLinkSmarty);
$smarty->assign('numIndex', $total_index);
$smarty->assign('img_path_array', $img_path_array);
$smarty->assign('indexPage', $pageIndex);
$smarty->assign('newIcon', NEW_STATUS);
$smarty->assign('indexLink', INDEX_LINK);
$HtmlOutput[] = $smarty->fetch('index.tpl');
$dataToSmarty = null;
$singleLinkSmarty = null;
$counter=-1;
$pageIndex++;

function processhtml(){
	$CSVDATA = $youkai->getCSVData();
	$CSVSingleLink = $youkai->getSingle_page_link();
	$htmlOutput;
	
}
?>
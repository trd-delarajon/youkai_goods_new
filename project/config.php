<?php 

	require_once("smarty/libs/Smarty.class.php");

	$smarty = new Smarty(); //new object
	$smarty->template_dir = 'templates';
	$smarty->compile_dir = 'cache';




	$url 	= 'Avada';
	$title = '妖怪ウォッチ　グッズ   &#8211;  商品カテゴリ';
	
	$smarty->assign("baseurl", $url);

 ?>
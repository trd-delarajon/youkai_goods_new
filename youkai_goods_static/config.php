<?php 

	require_once("Archive/smarty/libs/Smarty.class.php");

	$smarty = new Smarty(); //new object
	$smarty->template_dir = 'templates';
	$smarty->compile_dir = 'cache2';
	
	
 ?>
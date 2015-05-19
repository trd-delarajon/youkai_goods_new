<?php 

	// require_once("smarty/libs/Smarty.class.php");

	// $smarty = new Smarty(); //new object
	

	require_once('smarty/libs/SmartyBC.class.php');
	$smarty = new SmartyBC();
	$smarty->template_dir = 'templates';
	$smarty->compile_dir = 'cache';




 ?>
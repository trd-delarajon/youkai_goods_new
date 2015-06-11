<?php 

// 	require_once("smarty/libs/Smarty.class.php");

// 	$smarty = new Smarty(); //new object
// 	$smarty->template_dir = 'templates';
// 	$smarty->compile_dir = 'cache';
// echo dirname(__FILE__);
// $url2 = array(0 => 'tiger', 1 =>'dog');
$url = array(0 => 'tiger', 1 =>'dog', 2 =>'fish', 3 => 'dog');
echo '<pre>';
print_r($url);
echo '</pre>';
array_walk($url, function(&$value, &$key) {
// 	echo '<br>'.$key.'h1<br>';
// 	echo '<br>'.$value.'h2<br>';
// 	echo '<br>'.$value[$key].'h3<br>';
// 	$value = '//'.$value;
	$value = '//'.$value;
});

	echo '<pre>';
	print_r($url);
	echo '</pre>';
 ?>
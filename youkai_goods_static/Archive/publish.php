<?PHP
	define('FILE_PATH', dirname(__DIR__).'/HTML-Files');
	define('FILE_PATH2', dirname(__FILE__).'/HTML-Files/HTML_version');
	
	$today = date("Y-m-d H:i:s");
	
	$file = file_get_contents("http://localhost/Youkai_goods_new/youkai_goods_static/Archive/index.php");
	file_put_contents(FILE_PATH2."/susshi.html", $file);
	
	echo FILE_PATH.'</br>';
	echo FILE_PATH2;
?>
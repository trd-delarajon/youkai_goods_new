<?php
require_once("config.php");
define('FILE_PATH2', dirname(__FILE__).'/HTML-Files/HTML_version');
define('INDEX_LINK', 'single');

	
	file_put_contents(FILE_PATH2."/".INDEX_LINK.".html", $smarty->fetch('single_page.tpl'));
?>
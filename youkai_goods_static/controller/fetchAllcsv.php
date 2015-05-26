<?php 
		

		include_once('database.php');
	
			$data = fetchAllCsvfile();;
		
			echo json_encode(array("aaData"=>$data));


 ?>
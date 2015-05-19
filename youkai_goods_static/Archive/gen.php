<?php
// Set path to CSV file
$csvFile = 'csv_file/toppage.csv';


function readCSV($csvFile){
	$file_handle = fopen($csvFile, 'r');
	while (!feof($file_handle) ) {
		$line_of_text[] = fgetcsv($file_handle, 1024);
	}
	fclose($file_handle);
	return $line_of_text;
}




function paginate_three($reload, $page, $tpages, $adjacents) {
	
	$prevlabel = "« 前へ";
	$nextlabel = "次へ »";
	
	//$out = "<div class=\"pagin\">\n";
	$out = "<div >";
	
	// previous
	if($page==1) {
		$out.= "<span class='prev page-numbers' style='display: none;'>" . $prevlabel . "</span>\n";
	}
	elseif($page==2) {
		$out.= "<a class='prev page-numbers' href=\"" . $reload . "\">" . $prevlabel . "</a>\n";
	}
	else {
		$out.= "<a class='prev page-numbers' href=\"" . $reload . "&amp;page=" . ($page-1) . "\">" . $prevlabel . "</a>\n";
	}
	
	// first
	if($page>($adjacents+1)) {
		$out.= "<a class='page-numbers' href=\"" . $reload . "\">1</a>\n";
	}
	
	// interval
	if($page>($adjacents+2)) {
		$out.= "…\n";
	}
	
	// pages
	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<span class=\"current\">" . $i . "</span>\n";
		}
		elseif($i==1) {
			$out.= "<a class='page-numbers' href=\"" . $reload . "\">" . $i . "</a>\n";
		}
		else {
			$out.= "<a class='page-numbers' href=\"" . $reload . "&amp;page=" . $i . "\">" . $i . "</a>\n";
		}
	}
	
	// interval
	if($page<($tpages-$adjacents-1)) {
		$out.= "…\n";
	}
	
	// last
	if($page<($tpages-$adjacents)) {
		$out.= "<a class='page-numbers' href=\"" . $reload . "&amp;page=" . $tpages . "\">" . $tpages . "</a>\n";
	}
	
	// next
	if($page<$tpages) {
		$out.= "<a class='next page-numbers' href=\"" . $reload . "&amp;page=" . ($page+1) . "\">" . $nextlabel . "</a>\n";
	}
	else {
		$out.= "<span next class='page-numbers' style='display: none;'>" . $nextlabel . "</span>\n";
	}
	
	$out.= "</div>";
	
	return $out;
}

?>

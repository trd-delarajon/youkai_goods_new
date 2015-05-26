<?php 
	
	include_once("config.php");
 	define ('csvfolder', getcwd().'/'."csv_file/");

	$files = glob(csvfolder.'*.{csv}', GLOB_BRACE);
	krsort($files);	


	foreach($files as $key=> $value) {
		$pathinfo = pathinfo($value);
		$newpath = str_replace(" ","", $pathinfo);
		$temp = date('H:i:s', strtotime($newpath['filename'])); 
		?>
			<tr>
				<td><?=$newpath['filename']?></td>
                <td><?=date('l\, F d\, Y', strtotime($newpath['filename'])) ?></td>
                <td><?=time_ago_en($temp)?></td>
			</tr>
<?php  } ?>	
<?php 

include_once("gen.php");

$csvdata = readCSV($csvFile);


$num_rec_per_page=4;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
 $start_from = ($page-1) * $num_rec_per_page; 


$total_records =count($csvdata);
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='pagination.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='pagination.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='pagination.php?page=$total_pages'>".'>|'."</a> "; // Goto last page



//$tpages = ($_GET['tpages']) ? intval($_GET['tpages']) : 20; // 20 by default
$tpages = 11;	//ceil($total_records / $num_rec_per_page);
$adjacents  = 2;

//if($page<=0)  $page  = 1;
// if($adjacents<=0) $adjacents = 2;

//$reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages . "&amp;adjacents=" . $adjacents;
$reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;


echo paginate_three($reload, $page, $tpages, $adjacents);

?>
	<table border="1">
		<tr>
			<td>ProdId</td>
			<td>Imagelink</td>
		</tr>
<? foreach(array_slice($csvdata,  $start_from, $num_rec_per_page)as $key => $value) {?> 
         <tr>
            <td><?=$value['0']; ?></td>
            <td><img src="<?=$value['1']; ?>" alt=""></td>            
         </tr>
<?}?> 
	</table>




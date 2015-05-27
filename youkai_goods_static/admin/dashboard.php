<?php
	include_once("../controller/database.php");

	if(!isset($_SESSION['islogin']))
	{
		header('location: index.php');
		exit();
	}

	$user 		= $_SESSION['user'];
	$user_id 	= $user['user_id'];

	$status1 = fetchCsvfileStatus1();
	//$newest_file = fetchCsvfile();// function newest status 1
	/*	$status1 = fetchCsvfileStatus1();
	if (isset($_POST['csv_id'])) 
	{
		if($status1['csv_id'])
		{
			$csv_id1  = $status1['csv_id']; //csv_id status 1 active
			restoreCsv1($csv_id1); //update the status 1 to 0 
		}
		$csv_id = $_POST['csv_id'];
		restoreCsv($csv_id);
	}
	echo $status1['csv_id'];
	echo $status1['status'];*/
?>
<?php include_once("header.php"); ?>
	<div class="jumbotron">
        <?php  $csvfname = fetchAllCsvfile();
        if ($csvfname!= null): ?>
        <span style="float:right;">Newest csv file:  <i style="color:#337ab7" id="newestfile">
        	<?php if ($status1['status']== 1): ?> <?=$status1['filename']?> <?php endif ?> 
         </i></span> 
		
		<form method="post">
			<label>Choose csv file to restore :</label>
			<select name="csv_id">
			<?php foreach ($csvfname as $key => $value):  ?>	
				<option  value="<?=$value['csv_id']?>"  <?php if ($value['status']== 1) : ?>  style="background-color:#337ab7"  selected <?php endif ?> > <?=$value['filename']?> </option>
			 <?php endforeach ?>
			</select>
			<button type="submit" name="save" class="btn btn-default btn-xs">Save</button>
		</form>

		 <table class="table table-bordered table-condensed table-hover datatable">
		 	<thead>
				<tr>
					<th><span class="glyphicon glyphicon-file"> Filename</span></th>
					<th><span class="glyphicon glyphicon-calendar"> Date</span></th>
					<th><span class="glyphicon glyphicon-time"> Time</span></th>
				</tr>
			</thead>
			<tbody >
			<?php foreach($csvfname as $key=> $value) : $temp = $value['date_added']; ?>
			<tr class="actve">
				<td <?php if ($value['status']== 1): ?> class="info" style="color:#337ab7" <?php endif ?>> <?=$value['filename']?></td>
                <td <?php if ($value['status']== 1): ?> class="info" <?php endif ?>><?=date('l\, F d\, Y', strtotime($value['date_added'])) ?></td>
                <td <?php if ($value['status']== 1): ?> class="info" <?php endif ?>><?=time_ago_en($temp)?> <span style="float:right; font-size:9px;">Uploaded by: <?=$value['username']?></span> </td>
			</tr>
			<?php  endforeach ?>	
			</tbody>
		 </table>

		<?php else: ?>
		 		<div class="alert alert-danger text-center"><button type="button" class="close btn-xs" data-dismiss="alert" aria-hidden="true">&times;</button>Please Upload csv file!</div>
        <?php endif ?>
	</div>
<?php include_once("footer.php"); ?>

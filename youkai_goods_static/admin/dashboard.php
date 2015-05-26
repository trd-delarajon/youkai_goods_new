<?php
	//session_start();
		
	include_once("../controller/database.php");

	if(!isset($_SESSION['islogin']))
	{
		header('location: index.php');
		exit();
	}

	$user 		= $_SESSION['user'];
	$user_id 	= $user['user_id'];

	$newest_file = fetchCsvfile();// function newest status 1

	if (isset($_POST['csv_id']))
	{
		if($newest_file['csv_id'])
		{
			$csv_id1  = $newest_file['csv_id']; //csv_id status 1 active
			restoreCsv1($csv_id1); //update the status 1 to 0 
		}
		$csv_id = $_POST['csv_id'];
		restoreCsv($csv_id);
	}


?>
 <?php include_once("header.php"); ?>
	<div class="jumbotron">
        <?php 
       	 $csvfname = fetchAllCsvfile();
        if ($csvfname!= null): ?>
        <span style="float:right;">Newest csv file:  <i style="color:#337ab7"> <?php $newest_file = fetchCsvfile(); echo $newest_file['filename']?></i></span>
		
		<form method="post" >
			<label>Choose csv file :</label>
			<select name="csv_id">
			<?php foreach ($csvfname as $key => $value):  ?>	
				<option value="<?=$value['csv_id']?>">
					<?php if (!$value['status'] ==1): ?>
					<?=$value['filename']?>
					<?php endif ?>
				</option>
			 <?php endforeach ?>
			</select>
			<button type="submit" name="save" class="btn btn-default btn-xs">Save</button>
		</form>

		 <table class="table table-bordered table-condensed table-hover datatable">
		 	<thead>
				<tr>
					<th>Filename</th>
					<th>Date</th>
					<th>Uploaded</th>
				</tr>
			</thead>
			<tbody >
			<?php foreach($csvfname as $key=> $value) { $temp = $value['date_added']; ?>
			<tr>
				<td <?php if ($value['filename']== $newest_file['filename']): ?> class="info" style="color:#337ab7" <?php endif ?>> <?=$value['filename']?></td>
                <td <?php if ($value['filename']== $newest_file['filename']): ?> class="info" <?php endif ?>><?=date('l\, F d\, Y', strtotime($value['date_added'])) ?></td>
                <td <?php if ($value['filename']== $newest_file['filename']): ?> class="info" <?php endif ?>><?=time_ago_en($temp)?> <span style="float:right; font-size:9px;">Uploaded by: <?=$value['username']?></span> </td>
			</tr>
			<?php  } ?>	
			</tbody>
		 </table>

		 <?php else: ?>
		 		<div class="alert alert-danger text-center"><button type="button" class="close btn-xs" data-dismiss="alert" aria-hidden="true">&times;</button>Please Upload csv file!</div>
        <?php endif ?>
	</div>
 <?php include_once("footer.php"); ?>

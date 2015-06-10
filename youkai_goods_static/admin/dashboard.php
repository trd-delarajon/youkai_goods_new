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

	function btnstatus($status,$num)
    {
          if($status=='1' && $num=='1'){
            return 'disabled';
          }
	}	

?>
<?php include_once("header.php"); ?>
	<div class="jumbotron">
			<?php 

				$directory = "../HTML-Files/";
 
				$files = glob($directory . "*");
				 
			 	//$a = each($files)[1];
			 	$a 	= end($files);
				echo 'Latest Static HTML: <a href="'.$a.'/indexPage1.html" target="_blank"><i>Click Here</i></a><br><br>';
			 ?>
        <?php  $csvfname = fetchAllCsvfile();
        if ($csvfname!= null): ?>
        <span>Newest csv file:  <i style="color:#337ab7" id="newestfile">
        	<?php if ($status1['status']== 1): ?> <?=$status1['filename']?> <?php endif ?> 
         </i></span> 
		
		
		 <table class="table table-bordered table-condensed table-hover datatable">
		 	<thead>
				<tr>
					<th><span class="glyphicon glyphicon-file"> Filename</span></th>
					<th><span class="glyphicon glyphicon-calendar"> Date</span></th>
					<th><span class="glyphicon glyphicon-time"> Time</span></th>
					<th><span class="glyphicon glyphicon-alert"> Action</span></th>
				</tr>
			</thead>
			<tbody >
			<?php foreach($csvfname as $key=> $value) : $temp = $value['date_added']; ?>
			<tr class="actve">
				<td <?php if ($value['status']== 1): ?> class="info" style="color:#337ab7" <?php endif ?>> <?=$value['filename']?></td>
                <td <?php if ($value['status']== 1): ?> class="info" <?php endif ?>><?=date('l\, F d\, Y', strtotime($value['date_added'])) ?></td>
                <td <?php if ($value['status']== 1): ?> class="info" <?php endif ?>><?=time_ago_en($temp)?> <span style="float:right; font-size:9px;">Uploaded by: <?=$value['username']?></span> </td>
				<td <?php if ($value['status']== 1): ?> class="info" <?php endif ?>>
                    <a csvstat="<?=$value['status']?>" data-csvid="<?=$value['csv_id']?>" data-date="<?=date('l\, F d\, Y', strtotime($value['date_added'])) ?>" usern="<?=$value['username']?>" data-time="<?=time_ago_en($temp)?>" csvfilename="<?=$value['filename']?>" class="btn btn-default<?php if ($value['status']== 1): ?>  restore<?php endif ?> <?=btnstatus($value['status'],1);?> restore_btn" ><span  class="glyphicon glyphicon-check"> </span> restore</a>   
					
				</td>
			</tr>

		
			<?php  endforeach ?>	
			</tbody>
		 </table>


		 <div class="modal fade rest" id="modalrestore" tabindex="-1" role="dialog"  aria-hidden="true"  data-backdrop="static" data-keyboard="false">
		      <div class="modal-dialog">
		        <div class="modal-content">
		          <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            <h4 class="modal-title">Restore</h4>
		          </div>
		           <div class="restmessage"></div>
		          <div class="modal-body">
		          </div>
		          <div class="modal-footer">
		            <button type="button"  class="btn btn-default btn-sm btnrestore" >Restore</button>
		            <button type="button" class="btn btn-default btn-sm"  data-dismiss="modal">Close</button>
		          </div>
		        </div>
		      </div>
		    </div>   


		<?php else: ?>
		 		<div class="alert alert-danger text-center"><button type="button" class="close btn-xs" data-dismiss="alert" aria-hidden="true">&times;</button>Please Upload csv file!</div>
        <?php endif ?>
	</div>
<?php include_once("footer.php"); ?>

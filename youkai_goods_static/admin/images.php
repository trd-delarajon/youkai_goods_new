<?php
	include_once("../controller/database.php");
	session_start();
	if(!isset($_SESSION['islogin']))
	{
		header('location: index.php');
		exit();
	}


	$directory 	= "../uploadimages/"; // define at database.php
	$images 	= glob($directory."*.jpg");
	$count 		= 0;
	asort($images);

/*	echo "<pre>";
	print_r($images);*/

?>
<?php include_once("header.php"); ?>
	<div class="jumbotron">
    	
		<div class="container">
			<a href="#uploadimg" data-toggle="modal" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Upload Image</a><br><br>

			<form class="form-inline">
				<div class="checkbox">
				    <label>
				      <input type="checkbox" id="selecctall"> Select All
				    </label>
					<button type="button" class="btn btn-danger btn-xs">Delete</button>
			  	</div>
		  	</form>
		   <ul style=" padding:0 0 0 0; margin:0 0 0 0;">
		<?php foreach ($images as $key => $image): $c = ++$count;?>
		       <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" id="fadeimg<?=$c?>" style="list-style:none;  margin-bottom:25px; ">
		       	<input type="checkbox" value="<?=$c?>" name="checkbox[]" id="checkbox[]" class="checkbox1">
		       	<img src="<?=$image?>" style="cursor: pointer;" class="img-thumbnail" filename="<?=$image?>" funq="<?=$c?>" />
		       </li>
		<?php endforeach ?>
			</ul>
		</div>						

		<div class="modal fade" id="modalimage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	      <div class="modal-dialog">
	        <div class="modal-content">         
	          <div class="modal-body">                
	          </div>
	          <div class="modal-footer"></div>
	        </div><!-- /.modal-content -->
	      </div><!-- /.modal-dialog -->
	    </div><!-- /.modal -->


	 <div class="modal fade" id="uploadimg" tabindex="-1" role="dialog"  aria-hidden="true"  data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Upload Images</h4>
          </div>
          <div class="modal-body">
		    <h6><b>Note:</b> <em>Allowed extention .jpg, jpeg</em> </h6>
			<form enctype="multipart/form-data">
		    	<center><div id="queue"></div>
				<input id="file_upload" name="file_upload" type="file" multiple="true">
				<div class="picmsg"></div>
				</center>
		    </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm"  data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>			
		


	</div>
<?php include_once("footer.php"); ?>

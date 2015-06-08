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
           <!--  <button type="submit" class="btn btn-default btn-sm" id="btnuploadimg">Upload</button> -->
            <button type="button" class="btn btn-default btn-sm"  data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>			
		


	</div>
<?php include_once("footer.php"); ?>
<script type="text/javascript">
	$(function() {
		$('.uploadify').attr('accept', '.jpg, .jpeg, .png');
		$('#file_upload').uploadify({
			'formData'	: {
				'img' 	: $('#file_upload').val()
			},
			'uploader' : '../controller/uploadimage.php',
			'onUploadSuccess' : function(file, data, response) {
				$('.picmsg').html(data);
		      		setTimeout(function(){
					        $('#uploadimg').modal('hide');  
					        location.reload();
						},3000)

        }
		});
	});
 $(document).ready(function(){

		//images list 
           $('li img').on('click',function(){
                var src 	= $(this).attr('src');
                var fname 	= $(this).attr('src');
                var funq 	= $(this).attr('funq');
                var img 	= ' <button type="button" funq="'+funq+'" class="btn btn-danger btn-xs btnimg" fname="'+ fname +'"> <span class="glyphicon glyphicon-trash"></span></button> <center> <img style="width:300px; hieght:300px" src="' + src + '" class="img-responsive"/> </center>';
                $('#modalimage').modal();
                $('#modalimage').on('shown.bs.modal', function(){
                    $('#modalimage .modal-body').html(img);
                    $('#modalimage .modal-footer').hide();
                });
                $('#modalimage').on('hidden.bs.modal', function(){
                    $('#modalimage .modal-body').html('');
                });
           });

           $('body').on('click', '.btnimg', function() {
		      	var filename = $(this).attr('fname');
                var funq 	 = $(this).attr('funq');

		        $('#modalimage .modal-body').html('<h6> <center> Are you sure you want to delete <img style="width:55px; hieght:55px" src="' + filename + '" ></span></center></h6>');
                $('#modalimage .modal-footer').show();
		        $('#modalimage .modal-footer').html('<button type="button" class="btn btn-danger btn-sm removedimg" funq="'+funq+'" flname="'+filename+'">Confirm</button> <button type="button" class="btn btn-default btn-sm"  data-dismiss="modal">Close</button>');
		        $('#modalimage').modal('show');
		        return false;
		    });

            $('body').on('click', '.removedimg', function() {
		      	 var flname = $(this).attr('flname');
		      	 var c 		= $(this).attr('funq');
		      
		        $.post('../controller/removeimg.php',{filename:flname},function(data){
	        	console.log(data);
						        $('#modalimage').modal('toggle'); 
							//setInterval(function(){
						        $('#fadeimg'+c).fadeOut(1000); 
							//},1000)
	            });
    		});


            $('#selecctall').click(function(event) {  //on click
                if (this.checked) { // check select status
                    $('.checkbox1').each(function() { //loop through each checkbox
                        this.checked = true;  //select all checkboxes with class "checkbox1"              
                    });
                } else {
                    $('.checkbox1').each(function() { //loop through each checkbox
                        this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                    });
                }
            });
 





 });
</script>

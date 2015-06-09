<?php 
	if(!isset($_SESSION['islogin']))
      {
        header('location: index.php');
        exit();
      }

	  $user = $_SESSION['user'];
	  $username = $user['username'];

$date 		= date("Ymd H:i:s", time());      
$cname 		= date("Ymd H:i:s", time()).'.csv';
$csvdate	= date('l\, F d\, Y', strtotime($date));
$csvtime	= time_ago_en($date);




 ?>	
<script src="../stylesheets/js/jquery-1.11.1.min.js"></script>
<script src="../stylesheets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../stylesheets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../stylesheets/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="../stylesheets/js/jquery.uploadify.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.datatable').dataTable( { bSort: false, "info": true, "paging": true, "searching": true, } );

    $('#loading').hide();
    $('#message').fadeIn(1000);
	$("#uploadForm").on('submit',(function(e) {
			e.preventDefault();
			$("#message").empty();
			fileupload 	= $('#fileupload').val();
			filename 	= '<?=$cname; ?>';  
			csvdate 	= '<?=$csvdate; ?>';  
			csvtime 	= '<?=$csvtime; ?>';  
			user 		= '<?=$username; ?>';  


			if (fileupload=='') {
				$('#message').show().fadeOut(1500).html('<div class="alert alert-danger text-center"><button type="button" class="close btn-xs" data-dismiss="alert" aria-hidden="true">&times;</button>Please choose a file!</div>');
    			$('#loading').hide();
			}else{
				$.ajax({
					url 			: "../controller/uploadcsv.php", 
					type 			: "POST",             
					data 			: new FormData(this), 
					contentType 	: false,      
					cache 			: false,           
					processData     : false,       
					success: function(data)   // A function to be called if request succeeds
					{
						if (data)
						{
							//setTimeout(function(){
	              				$('#loading').show(); //},1000)
		    					   setTimeout(function()
		    					   {
										//$("#message").html(data).show(2500);
			              				 	$('#uploadcsv').modal('hide')
			              				 	 	html = "<tr>";
												html += "<td class='info' style='color:#337ab7'>" + filename + "</td>";
												html += "<td class='info'>" + csvdate + "</td>";	
												html += "<td class='info'>" + csvtime + "<span style='float:right; font-size:9px;'>Uploaded by:" + user + "</span> </td>";	
												html += "<td class='info'>  <a class='btn btn-default disabled' href='#rest' data-toggle='modal' ><span class='glyphicon glyphicon-check'> </span> restore</a> </td>";	
												html += "</tr>";
			    				 			$('tbody').prepend(html);
			    				 			$('#newestfile').text(filename);
											$('#loading').hide();
											$('#message').hide();
											$('#fileupload').val('');
											$('#generatem').addClass('active');
											//$('#generatem').removeAttr('disabled');
			              			 		$('#generatemodal').modal('show')
			              			 		$('.messageupload').html(data).show(2500).fadeOut(2500);	
			              			 		$('#genmodal').attr('data-toggle', 'modal');

			              			},1500);
								 $('.actve td').removeAttr('style');
								 $('.actve td').removeClass('info');
								 $('.actve td, .restore').removeClass('disabled');

						}
   								 $('td').removeAttr('style');
								 $('td').removeClass('info');
								 $('td').removeClass('disabled');

					}
				});
			}
	}));//end of upload

	// restore
 	$('body').on('click', '.restore_btn', function() {
      	csvid = $(this).attr('data-csvid');
     	status = $(this).attr('csvstat');
        $('#modalrestore .modal-body').html('<h6 style="text-align:center">'+ $(this).attr('csvfilename') +  ' ' + $(this).attr('data-date')+ ' <span style="float:right;font-size:9px;">'+ $(this).attr('data-time') + 'Uploaded by:' + $(this).attr('usern') + '</span> </h6>');
        $('#modalrestore').modal('show');
        return false;
    });

 	$('.restmessage').hide();
     $('body').on('click', '.btnrestore', function(e) {
     	e.preventDefault();
        $.post('../controller/restore.php',{csvid:csvid},function(data){
        	console.log(data);

				     		$('.restmessage').attr('class', 'alert alert-info').html('<p style="text-align:center"><b>Success</b></p>').show().fadeOut(1500);
					        $('.actve td').removeAttr('style');
							$('.actve td').removeClass('info');
							$('.actve td, .restore').removeClass('disabled');

        		 	/*	if(status == 1){
				        	$('.actve td').attr('style', 'color:#337ab7');
				        	$('.actve td').addClass('info');
				        	$('.actve td, .restore').attr('disabled', 'disabled');
					        	 alert('equal');
					    }*/

						setTimeout(function(){
					        $('#modalrestore').modal('hide');  
					        location.reload();
						},2500)
            });
    	});


	$('#generate').removeAttr('disabled');
	$("#form").on('submit',(function(e) {
			e.preventDefault();
				$('.progress').css("display",'block');
				$('#percent').text('0%');
			$.ajax({
					url 			: "../generateFolder.php", 
					type  			: 'GET',
					cache 			: false,
					contentType 	: false,
					processData 	: false,
					success: function(percentComplete)
					{
					        console.log(percentComplete)
					        var val 	= Math.floor((percentComplete)*100)+'%';
       							total 	=  $('.progress-bar').width(val).text(val)
       						// $('#percent').text(val);
					       	//$('.bar').css('width', (percentComplete)*100+'%');
							$('#generate').attr('disabled','disabled');
							if(percentComplete == 1){
								setTimeout(function(){ 
									$('#generatemodal').modal('hide'); 
									/*$('#generate').removeAttr('disabled');
									$('.progress').css("display",'block');
									$('#percent').text('0%');*/
									location.reload();
								},2500)

							}
					}
			});
	})); //end of progress
});
</script>
 </body>
</html>
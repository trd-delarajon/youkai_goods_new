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
												html += "</tr>";
			    				 			$('tbody').prepend(html);
			    				 			$('#newestfile').text(filename);
											$('#loading').hide();
											$('#message').hide();
											$('#fileupload').val('');

			              			},1000);
								 $('.actve td').removeAttr('style');
								 $('.actve td').removeClass('info');
								 
						}



					}
				});
			}
	}));//end of upload



	$('#generate').removeAttr('disabled');
	$("#form").on('submit',(function(e) {
			e.preventDefault();
				$('.progress').css("display",'block');
				$('#percent').text('0%');
			$.ajax({
					url 			: "../controller/getgen.php", 
					type  			: 'GET',
					cache 			: false,
					contentType 	: false,
					processData 	: false,
					success: function(percentComplete)
					{
					        console.log(percentComplete)
					        var val = Math.floor((percentComplete)*100)+'%';
       						 $('.progress-bar').width(val).text(val)
       						// $('#percent').text(val);
					       	//$('.bar').css('width', (percentComplete)*100+'%');
							$('#generate').attr('disabled','disabled');
							/*if(val == 100+'%'){
							$('#generatemodal').modal('hide');
							}*/
					}
			});
	})); //end of progress
});
</script>
 </body>
</html>
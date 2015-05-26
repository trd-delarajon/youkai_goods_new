	
<script src="../stylesheets/js/jquery-1.11.1.min.js"></script>
<script src="../stylesheets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../stylesheets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../stylesheets/js/dataTables.bootstrap.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.datatable').dataTable( { bSort: false, "info": true, "paging": true } );

    $('#loading').hide();
    $('#message').fadeIn(1000);
	$("#uploadForm").on('submit',(function(e) {
			e.preventDefault();
			$("#message").empty();
			fileupload = $('#fileupload').val();

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
						if (data) {
						setInterval(function(){
              				$('#loading').show(); },1000)
	    					   setInterval(function(){
									$("#message").html(data).show(2500);
			    					//$('#message').fadeOut(2000);
		              				 	location.reload(); },3000)
						}
					}
				});
			}
	}));



	$('#generate').removeAttr('disabled');
	$("#form").on('submit',(function(e) {
			e.preventDefault();
				$('.progress').css("display",'block');
				$('#percent').text('0%');
			$.ajax({
					url 			: "../controller/getgen.php", 
					type  			: 'GET',
					//data 			: new FormDate(this),
					cache 			: false,
					contentType 	: false,
					processData 	: false,
					success: function(percentComplete)
					{
					        //Do something with upload progress
					        console.log(percentComplete)
					        var val = Math.floor((percentComplete)*100)+'%';
       						 $('.progress-bar').width(val).text(val)
       						// $('#percent').text(val);
					       	//$('.bar').css('width', (percentComplete)*100+'%');
							$('#generate').attr('disabled','disabled');
							if(val == 100+'%'){
							$('#generatemodal').modal('hide');
							}
					}
			});
	}));



});
</script>
 </body>
</html>
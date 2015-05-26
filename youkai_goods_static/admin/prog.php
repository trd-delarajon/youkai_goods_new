 <?php session_start(); include_once("header.php"); ?>

<div class="progress">
  <div class="progress-bar progress-bar-striped active bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" >
    <span id='percent'></span>
  </div>
</div>
<form method="post" id="form">

<button type="submit" id="generate" class="btn btn-default btn-sm">Generate</button>
</form>



 <?php include_once("footer.php"); ?>
<script type="text/javascript">
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
					}
			});
	}));
</script>
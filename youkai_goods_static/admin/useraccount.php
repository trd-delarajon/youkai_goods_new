<?php
	
	session_start();

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
      
          <a href="#create" data-toggle="modal" class="glyphicon glyphicon-plus-sign btn btn-primary"></a>
		 <table class="table table-bordered table-condensed table-hover" id="example"></table>


		 <div class="modal fade" id="create" tabindex="-1" role="dialog"  aria-hidden="true"  data-backdrop="static" data-keyboard="false">
		      <div class="modal-dialog">
		        <div class="modal-content">
		          <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            <h4 class="modal-title">Add user</h4>
		          </div>
		          <div class="modal-body">
		          		  <div class="error-msg alert-success"></div>
		          	  <div class="form-group">
		                <label>Fullname</label>
		                <input type="text" class="form-control fullnamec"  placeholder="Fullname" autofocus >
		              </div>

		              <div class="form-group" id="username">
		                <label>Username</label>
		                <input type="text" class="form-control usernamec "  placeholder="Username" >
		                <span id="availability_status"></span>
		              </div>

		              <div class="form-group">
		                <label>Password</label>
		                <input type="password" class="form-control passwordc"  placeholder="Password" >
		              </div>

		              <div class="form-group">
		                <label>Confirm Password</label>
		                <input type="password" class="form-control cpasswordc"  placeholder="Confirm Password" >
		              </div>

		          </div>
		          <div class="modal-footer">
		            <button type="button"  class="btn btn-default btn-sm btnadduser" >Create</button>
		            <button type="button" class="btn btn-default btn-sm"  data-dismiss="modal">Close</button>
		          </div>
		        </div>
		      </div>
		    </div>   



<!-- Delete Modal  -->
     <div id="deleteModal" class="modal fade" >
        <div class="modal-dialog" >
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                 <h4 id="myModalLabel">Confirmation</h4>
             </div>
             <div id="messagedelete" class=""></div>
             <div class="modal-body">
             </div>
             <div class="modal-footer">
                  <button class="btn btn-danger btn-sm"  id="btnConfirm">Confirm</button>
                  <button class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
            </div>
      </div>
    </div>
<!-- End of Modal Delete -->





	
	</div>
<?php include_once("footer.php"); ?>
<script type="text/javascript">
$(document).ready(function () {

  var table = $('#example');

  table.dataTable( {
    "sAjaxSource": '../controller/fetchalluser.php',
    "bDeferRender": true,
    "bProcessing": true,
    "oLanguage": {            
      "bDeferRender": true,
      "bProcessing": true,
      "sProcessing": '<img src="../stylesheets/img/loading1.gif">'
    },                
    "aoColumns": [                                                                   
    {"mDataProp": "fullname", 'sTitle': 'Fullname'},
    {"mDataProp": "username", 'sTitle': ' Username'},
    {"mDataProp": null, "bSortable": false, 'sTitle': 'Action','mRender': function ( oObj ) {

     var del       = '<a uid="'+oObj.user_id+'"  fname="'+oObj.username+'" id="btndel" class="btn btn-danger btn-sm delete"> <span class="glyphicon glyphicon-trash"> </span></a>';
    /* var deac       = '<a uid="'+oObj.user_id+'"  fname="'+oObj.username+'" id="btndeac" class="btn btn-warning btn-sm deactivate"> <span class="glyphicon glyphicon-exclamation-sign"> </span></a>';*/

    	//return deac +' '+del;
    	return del;
      }},
     
    ], 

  });


/*Create*/

$('body').on('click', '.btnadduser', function () {


  var fullname  = $('.fullnamec').val();
  var username  = $('.usernamec').val();
  var password  = $('.passwordc').val();

  $.post('../controller/usercreate.php', {name:fullname, user:username, pass:password}, function(data) {
        setTimeout(function(){
          table.fnReloadAjax('../controller/fetchalluser.php');
          	$('#create').modal('hide');
        	$('.fullnamec, .usernamec, .passwordc, .cpasswordc').val("");
        	$('.fullnamec').focus();
      		$('.error-msg').removeAttr('style');
      		$('.error-msg').removeClass("alert-success");
      		$('.btnadduser').attr('disabled','disabled');
        },1000)

    });

});

/*Validate*/
 $('.btnadduser').attr('disabled', 'disabled');
 $(".fullnamec, .usernamec, .passwordc, .cpasswordc").on("keyup", function(e) {
      var name      = $(".fullnamenamec").val();
      var username  = $(".usernamec").val();
      var password  = $(".passwordc").val();
      var cpassword = $(".cpasswordc").val();

      if (name == '' || username == '' || password == '' || cpassword == '') {
         
          $(".error-msg").removeClass("alert-success");
          $(".error-msg").addClass("alert-danger");
          $(".error-msg").html("<h6 style='text-align:center'>Please fill all fields...!</h6>");
          $('.btnadduser').attr('disabled','disabled');

      } else if ((password.length) < 5) {
         
          $(".error-msg").removeClass("alert-success");
          $(".error-msg").addClass("alert-danger");
          $(".error-msg").html("<h6 style='text-align:center'>Password should atleast 5 character in length</h6>");
          $('.btnadduser').attr('disabled','disabled');
          
      } else if (!(password).match(cpassword)) {
          
          $(".error-msg").removeClass("alert-success");
          $(".error-msg").addClass("alert-danger");
          $(".error-msg").html("<h6 style='text-align:center'>Your password don't match. Please Try again!</h6>");
          $('.btnadduser').attr('disabled','disabled');
          
      } else if(password == cpassword){
         
          $(".error-msg").removeClass("alert-danger");
          $(".error-msg").addClass("alert-success").html("");

          $('.btnadduser').removeAttr('disabled');
          $('.btnadduser').removeClass('btn-default');
          $('.btnadduser').addClass('btn-primary');
              
      }
  });


  $(".usernamec").on('keyup', function(){ 
	  var username = $(".usernamec").val();
	  $("#availability_status").show();
	  $("#availability_status").html('Checking availability...');

    	$.ajax({    
		        type	:   "POST",  
		        url		:  	"../controller/check_username.php",  //file name
		        data 	:   "username="+ username,  //data
		        success : 	function(server_response){  
       
			        if(server_response == 0)
			        { 
			         	$("#availability_status").addClass("alert-success");
				        $("#availability_status").html('<h6"> Success!</h6> ');
				        $("#availability_status").fadeOut(2000);
				        $('.fullnamec, .passwordc, .cpasswordc').removeAttr('disabled');
			        	$("#username").removeClass("has-error");
			        	$("#availability_status").removeClass("alert-danger");
			        
			        }  
			        else  if(server_response == 1)//if returns "1"
			        {  
			         $("#username").addClass("has-error");
			         $("#availability_status").addClass("alert-danger");
			         $("#availability_status").html('<h6> Username already in use...! </h6>');
			         $('.fullnamec, .passwordc, .cpasswordc').attr('disabled','disabled');
			        }  
       
       		} 
       
      }); //end of ajax

 
  return false;
  });




/*Delete*/
	  $('#messagedelete').hide();
	  $('body').on('click', '#btndel', function(e) {
	    e.preventDefault();

	      uid = $(this).attr('uid');
	      $('#deleteModal .modal-body').html('<h6 style="text-align:center">Are you sure you want to delete ' + $(this).attr('fname') + '?</h6>');
	      $('#deleteModal').modal('show');

	       return false;
	  });

	  $('body').on('click', '#btnConfirm', function() {

	     $.post('../controller/userdelete.php',{id:uid},function(data){
	        $('#messagedelete').show().fadeOut(2000);
	        $('#messagedelete').html('<div class="alert alert-danger text-center"><button type="button" class="close btn-xs" data-dismiss="alert" aria-hidden="true">&times;</button>Deleted!</div>');
	        setTimeout(function(){
	               table.fnReloadAjax('../controller/fetchalluser.php');
	          $('#deleteModal').modal('hide');
	         },1000)

	      });

	  });






});
</script>



</script>



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





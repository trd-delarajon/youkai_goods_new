<?php 
	
	   if(!isset($_SESSION['islogin']))
      {
        header('location: index.php');
        exit();
      }
   
      $user = $_SESSION['user'];
      $user_id 	= $user['user_id'];
      $username = $user['username'];
        
      $projectname = 'Admin Panel';

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="youkaigoods">
    <meta name="author" content="youkaigoods">
   <!--  <link rel="icon" href="../../favicon.ico"> -->

    <title>ダッシュボード</title>

    <link href="../stylesheets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../stylesheets/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
.uploadify {
  position: relative;
  margin-bottom: 1em;
}

.uploadify-button-text{
  color: #000;
}
.uploadify-button.disabled {
  background-color: #D0D0D0;
  color: #808080;
}
.uploadify-queue {
  margin-bottom: 1em;
}
.uploadify-queue-item {
  background-color: #F5F5F5;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  font: 11px Verdana, Geneva, sans-serif;
  margin-top: 5px;
  max-width: 350px;
  padding: 10px;
}
.uploadify-error {
  background-color: #FDE5DD !important;
}
.uploadify-queue-item .cancel a {
  background: url('../stylesheets/img/uploadify-cancel.png') 0 0 no-repeat;
  float: right;
  height: 16px;
  text-indent: -9999px;
  width: 16px;
}
.uploadify-queue-item.completed {
  background-color: #E5E5E5;
}
.uploadify-progress {
  background-color: #E5E5E5;
  margin-top: 10px;
  width: 100%;
}
.uploadify-progress-bar {
  background-color: #0099FF;
  height: 3px;
  width: 1px;
}
    </style>
  </head>

  <body>
    <div class="container">
       <!-- Static navbar -->
        <nav class="navbar navbar-default ">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
             <a class="navbar-brand" href="index.php"><?=$projectname?></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="#uploadcsv" data-toggle="modal"><span class="glyphicon glyphicon-file"> </span> Upload csvfile</a></li>
                <li><a href="images.php"><span class="glyphicon glyphicon-picture"> </span> Images</a></li>
               
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"> </span> Hi! <?=$username?>, <span class="glyphicon glyphicon-cog"> </span><span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="useraccount.php"><span class="glyphicon glyphicon-user"> </span> Add user</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header"> Account Setting</li>
                    <li><a href="#"><span class="glyphicon glyphicon-edit"> </span> Update</a></li>
                     <li><a href="logout.php"><span class="glyphicon glyphicon-off"> </span> Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!--/.container-fluid -->
        </nav>

	<div class="modal fade" id="uploadcsv" tabindex="-1" role="dialog"  aria-hidden="true"  data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Upload csvfile</h4>
          </div>
          <div class="modal-body">
            <div id="message"></div>
			       <span id='loading' style="margin-left: 45%;"><img src="../stylesheets/img/ajaxloader.gif" /></span>
			       <form id="uploadForm" method="post" enctype="multipart/form-data" > 
				        <div class="form-group">
	                 <label><span class="glyphicon glyphicon-file"> </span> Choose csvfile</label>
					         <input type="file"   id="fileupload" name="csv_file" accept=".csv">
	              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-default btn-sm">Upload</button>
            <button type="button" class="btn btn-default btn-sm"  data-dismiss="modal">Close</button>
          	 </form>
          </div>
        </div>
      </div>
    </div>			


  <div class="modal fade" id="generatemodal" tabindex="-1" role="dialog"  aria-hidden="true"  data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
           <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
            <h4 class="modal-title">Generate</h4>
          </div>
          <div class="modal-body">
            <div class="messageupload"></div>
          <form id="form" method="post"> 
            <span><h6>note: <em>Please click generate.</em></h6></span>
              <div class="progress">
                <div class="progress-bar progress-bar-striped active bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" >
                  <span id='percent'></span>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" id="generate" class="btn btn-default btn-sm">Generate</button>
           <!--  <button type="button" class="btn btn-default btn-sm"  data-dismiss="modal">Close</button> -->
            </form>
          </div>
        </div>
      </div>
    </div>    
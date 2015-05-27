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

  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
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
              <li><a href="#uploadcsv" data-toggle="modal"><span class="glyphicon glyphicon-upload"> </span> Upload csv file</a></li>
              <li><a href="#generatemodal" data-toggle="modal"><span class="glyphicon glyphicon-ok"> </span> Generate</a></li>
            <!--   <li><a href="prog.php" ><span class="glyphicon glyphicon-ok"> </span> Generate</a></li> -->
             
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a><span class="glyphicon glyphicon-user"> </span> Hi! <?=$username?>, <span class="sr-only">(current)</span></a></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-off"> </span> Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
						<!--  <a href="add.php" title=""> Add</a> | -->
	<div class="modal fade" id="uploadcsv" tabindex="-1" role="dialog"  aria-hidden="true"  data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Upload csv file</h4>
          </div>
          <div class="modal-body">
            <div id="message"></div>
			       <span id='loading' style="margin-left: 45%;"><img src="../stylesheets/img/ajaxloader.gif" /></span>
			       <form id="uploadForm" method="post" enctype="multipart/form-data" > 
				        <div class="form-group">
	                 <label>Choose csv file</label>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Generate</h4>
          </div>
          <div class="modal-body">
          <form id="form" method="post"> 
              <div class="progress">
                <div class="progress-bar progress-bar-striped active bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" >
                  <span id='percent'></span>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" id="generate" class="btn btn-default btn-sm">Generate</button>
            <button type="button" class="btn btn-default btn-sm"  data-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
      </div>
    </div>    







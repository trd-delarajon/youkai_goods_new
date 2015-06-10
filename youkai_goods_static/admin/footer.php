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
 <div>
 	<input type="hidden" id="csvdataname" data-file="<?=$cname; ?>" data-csvdate="<?=$csvdate; ?>" data-csvtime="<?=$csvtime; ?>" data-user="<?=$username; ?>">
 </div>
<script src="../stylesheets/js/jquery-1.11.1.min.js"></script>
<script src="../stylesheets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../stylesheets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../stylesheets/js/fnReloadAjax.js"></script>
<script type="text/javascript" src="../stylesheets/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="../stylesheets/js/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="../stylesheets/js/youkai-admin.js"></script>

 </body>
</html>
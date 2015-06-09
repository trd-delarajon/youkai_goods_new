<?php
	session_start();

	include_once("../controller/database.php");
	$username = '';
	if(!empty($_POST['submit'])) {
		$username = $_POST['user'];
     	$password = md5($_POST['pass']); 

		$user = login($username, $password);
		if($username != '' && $password != '')
		{
			if($user)
          	{
              $_SESSION['islogin'] = true;
              $_SESSION['user'] = $user;
              header("location: index.php");
              exit();

          	}
			else
				$error = "Invalid username or password";
		}
		else
			$error = "Please fill all fields";
	}

?>
<?php
	if(isset($_SESSION['islogin']))
		include 'dashboard.php';
	else
		include 'login.php';
?>

<?php 
   		define ('CSVFILE', dirname(__DIR__).'/'."csv_file/");
   		define ('IMGDIR', dirname(__DIR__).'/'."uploadimages/");
   		define ('GENFOLDER', dirname(__DIR__).'/'."HTML-Files/");
   		
		

		function database(){
			return new PDO("mysql:host=localhost;dbname=db_youkaigoods","root","");
		}


		function login($username, $password)
		{
			$db = database();
			$sql = "SELECT user_id, username, password FROM users WHERE username=? AND password=?";
			$pdo = $db->prepare($sql);
			$pdo->execute(array($username, $password));
			$user = $pdo->fetch();
			$db = null;

			return $user;
		}

		function addAdmin($username, $password, $fullname)
		{
			$db = database();
			$sql = "INSERT INTO users (username, password, fullname) VALUES (?,?,?)";
			$pdo = $db->prepare($sql);
			$pdo->execute(array($username, $password, $fullname));
			$db = null;
		}


		function check_username($username)
		{
			$db = database();
			$sql ="SELECT user_id FROM users WHERE username=?";
			$stmt = $db->prepare($sql);
			$stmt->execute(array($username));
			$user = $stmt->rowCount();
			$db = null;	
			return $user;

		}


		function deleteUser($user_id)
		{
			$db = database();
			$sql = "DELETE FROM users WHERE user_id=?";
			$pdo = $db->prepare($sql);
			$pdo->execute(array($user_id));
			$db = null;
		}



		function getAllAdmin($user_id)
		{
			$db = database();
			$sql = "SELECT * FROM users WHERE user_id !=?";
			$pdo = $db->prepare($sql);
			$pdo->execute(array($user_id));
			$user = $pdo->fetchAll(PDO::FETCH_ASSOC);
			$db = null;

			return $user;
		}



		function uploadCsvfile($user_id, $csv_id, $filename)
		{
			$db = database();
			if (fetchCsvfileStatus1()) {
				$sql = "UPDATE csvfile SET status = 0 WHERE csv_id=?";
	            $pdo = $db->prepare($sql);
	            $pdo->execute(array($csv_id));
			}
			$sql = "INSERT INTO csvfile (user_id, filename, date_added, status) VALUES (?,?,?,?)";
			$pdo = $db->prepare($sql);
			$pdo->execute(array($user_id, $filename, date("Y-m-d H:i:s", time()),1));
			$db = null;
		}


 		function fetchAllCsvfile()
		{
			$db = database();
			$sql = "SELECT * FROM csvfile INNER JOIN users ON csvfile.user_id = users.user_id ORDER BY date_added DESC";
			$pdo = $db->prepare($sql);
			$pdo->execute();
			$newcsv = $pdo->fetchAll();
			$db = null;

			return $newcsv;
		}

		function fetchCsvfile($csv_id)
		{
			$db = database();
			$sql = "SELECT csv_id, status FROM csvfile WHERE status = 1 AND csv_id=?";
			$pdo = $db->prepare($sql);
			$pdo->execute(array($csv_id));
			$newcsv = $pdo->fetch();
			$db = null;

			return $newcsv;
		}

		function fetchCsvfileStatus1()
		{
			$db = database();
			$sql = "SELECT csv_id, filename, status FROM csvfile WHERE status = 1";
			$pdo = $db->prepare($sql);
			$pdo->execute();
			$val = $pdo->fetch();
			$db = null;

			return $val;
		}





		function restoreCsv($csv_id)
		{
			$db = database();
		/*	if (fetchCsvfile()) {
			    $sql = "UPDATE csvfile SET status = 0 WHERE csv_id=?";
	            $pdo = $db->prepare($sql);
	            $pdo->execute(array($csv_id));
			}*/

			$sql = "UPDATE csvfile SET status = 1 WHERE csv_id=?";
			$pdo = $db->prepare($sql);
			$pdo->execute(array($csv_id));
			$db = null;
		}

			
		function restoreCsv1($csv_id1)
		{
			$db = database();
		    $sql = "UPDATE csvfile SET status = 0 WHERE csv_id=?";
            $pdo = $db->prepare($sql);
            $pdo->execute(array($csv_id1));
			$db = null;
		}

		function countCsv()
		{
			$db = database();
			$sql = "SELECT COUNT(*) AS count FROM csvfile";
			$set = $db->prepare($sql);
			$set->execute();
			$count = $set->fetch();
			$total = $count['count'];
			$db = null;

			return $total;
		}



		/*Date time */
		function time_ago_en($time)
	  	{ 
		  if(!is_numeric($time))
		   $time = strtotime($time);
		   
		   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "age"); 
		   $lengths = array("60","60","24","7","4.35","12","100");
		   $now = time(); 
		   
		   $difference = $now - $time; 
		   if ($difference <= 10 && $difference >= 0) 
		   return $tense = 'just now'; 
		   elseif($difference > 0) 
		  		$tense = 'ago';
		   elseif($difference < 0)
		   $tense = 'later'; 
		   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++)
		   { 
		   		$difference /= $lengths[$j]; 
	   	   } 

		   $difference = round($difference); 
		   $period = $periods[$j] . ($difference >1 ? 's' :''); 

		   return "{$difference} {$period} {$tense} "; 
		 
	 	}
 ?>
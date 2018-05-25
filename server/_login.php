<?php 
	require('db_info.php');
	$connection = mysqli_connect($host, $usr, $psw, $db) or die('Impossibile connettersi al Server: ' . mysqli_error());

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$mail = test_input($_POST['email']);
		$psw = MD5(test_input($_POST['psw']));

		$query = "SELECT email FROM users WHERE email = '$mail' AND psw = '$psw';";
		$result = mysqli_query($connection, $query);
		if ( mysqli_num_rows($result) > 0 ) {
			$row = mysqli_fetch_array($result);
			session_start();
			$_SESSION['email'] = $row['email'];
			header("Location: ../public/home.php");
		} else {
			header("Location: ../public/errore_login.php");
		}
	}

	function test_input($str){
		$str = trim($str);
		$str = stripslashes($str);
		$str = htmlspecialchars($str);
		return $str;
	}
?>
<?php 
	require('db_info.php');
	$connection = mysqli_connect($host, $usr, $psw, $db) or die('Impossibile connettersi al Server: ' . mysqli_error());

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$mail = test_input($_POST['email']);
		$psw = MD5(test_input($_POST['psw']));
		$tipo_ut = $_POST['tipo_ut'];

		$query = "INSERT INTO users (email, psw, FkTipoUtente) VALUES ('$mail', '$psw', $tipo_ut);";
		if ( mysqli_query($connection, $query) ) {
			mysqli_close($connection);
			header("Location: ../public/ins.php");
		} else {
			mysqli_close($connection);
			header("Location: ../public/home.php");
		}
	}

	function test_input($str){
		$str = trim($str);
		$str = stripslashes($str);
		$str = htmlspecialchars($str);
		return $str;
	}
?>
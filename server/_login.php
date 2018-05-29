<?php 
	require('db_info.php');
	$connection = mysqli_connect($host, $usr, $psw, $db) or die('Impossibile connettersi al Server: ' . mysqli_error());

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$login = true;
		$mail = test_input($_POST['email']);
		$psw = MD5(test_input($_POST['psw']));

		$query = "SELECT email, FkTipoUtente FROM users WHERE email = '$mail' AND psw = '$psw';";
		$result = mysqli_query($connection, $query);
		if ( mysqli_num_rows($result) > 0 ) {
			$row = mysqli_fetch_array($result);
			session_start();
			$_SESSION['email'] = $row[0];

			$nome_file = "logs/log_home.txt";
			if (file_exists($nome_file)){
				date_default_timezone_set('CET');
				$idfile = fopen($nome_file, 'a+');
				if (!$idfile) die ('File non aperto');
			}
			//scrittura LOG
			$appo;
			$countline = 0;
			$maxRowsLog = 8;
			while(!feof($idfile))
			{
				$line = fgets($idfile); 
				$appo[$countline] = $line;
				$countline ++;
			}

			if ( ($countline-1) == $maxRowsLog ){
				file_put_contents($nome_file, $appo[1]);
				for ($i = 2; $i <= $maxRowsLog; $i++){
					fwrite($idfile, $appo[$i]);
				}
			}

			fwrite($idfile, '['.date("Y-m-d, H.i.s_e").'] = '. "Accesso effettuato da '" . $_SESSION['email'] . "'" . " --> IP: [" . $_SERVER['REMOTE_ADDR'] . "]" .PHP_EOL );

			fclose($idfile);	

			$query2 = "SELECT tipo, permessi FROM tipo_utente WHERE CodTipoUt = $row[1];";
			$result2 = mysqli_query($connection, $query2);
			mysqli_close($connection);
			if ( mysqli_num_rows($result2) > 0 ) {
				$row2 = mysqli_fetch_array($result2);
				$_SESSION['tipo_ut'] = $row2[0];
				$_SESSION['permessi'] = $row2[1];
				if (strpos($_SESSION['permessi'], "HOME") !== false) { 
					header("Location: ../public/home.php");
				} else { $login = false; }
			} else { $login = false; }
		} else { $login = false; }
	} else { $login = false; }
	if ( !$login ) {
		header("Location: ../public/errore_login.php");
	}

	function test_input($str){
		$str = trim($str);
		$str = stripslashes($str);
		$str = htmlspecialchars($str);
		return $str;
	}
?>
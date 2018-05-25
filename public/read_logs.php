<?php 
	session_start();
	if ( !isset($_SESSION['email']) ){
		header( "Location: ../index.php" );
	}
	$nome_file = "../server/logs/log_home.txt";
	if (file_exists($nome_file)){
		date_default_timezone_set('CET');
		$idfile = fopen($nome_file, 'a+');
		if (!$idfile) die ('File non aperto');

		//$log = file_get_contents($nome_file);
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../lib/materialize/materialize.min.css">
</head>
<body>
	<nav>
		<div class="nav-wrapper">
		  	<a href="#" class="brand-logo">Prova LOGIN</a>
		  	<ul id="nav-mobile" class="right hide-on-med-and-down">
		    	<li><a>Ludovico Venturi</a></li>
		    	<li><a>Stefano Santafè</a></li>
		  	</ul>
		</div>
	</nav>
	<div class="container">
		<h4>LOGs</h4>
		<?php 
			while(! feof($idfile))
			{
				echo fgets($idfile). "<br />";
			}
		?>
	</div>

	<script type="text/javascript" src="../lib/jquery.js"></script>
	<script type="text/javascript" src="../lib/materialize.min.js"></script>
</body>
</html>
<?php 
	fwrite($idfile, '['.date("Y-m-d, H.i.s_e").'] = '. "log letto da '" . $_SESSION['email'] . "'" . PHP_EOL );
	fclose($idfile);
?>
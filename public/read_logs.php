<?php 
	session_start();
	if(!empty($_SESSION['permessi'])){
      	if (strpos($_SESSION['permessi'], "LOG") !== false) { 
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
	<?php require("../server/nav.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col s6">
				<h4>LOGs</h4>
			</div>
			<div class="col s3 offset-s1"><br>
				<a href="home.php" class="waves-effect waves-light btn">HOME</a>
				<p>Torna alla Home</p>
			</div>
		</div>
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
	fclose($idfile);
?>
<?php   
		} else { header( "Location: ../index.php" ); }
	} else { header( "Location: ../index.php" ); }
?>
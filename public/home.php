<?php 
	session_start();
	if ( !isset($_SESSION['email']) ){
		header( "Location: ../index.php" );
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
		<h4>Che bello</h4>
		<div class="row">
			<div class="col s6">
				<a class="waves-effect waves-light btn" href="../server/_logout.php">LOGOUT</a>
				<p>Esci e Tona alla Home</p>
			</div>
			<div class="col s6">
				<a href="read_logs.php" class="waves-effect waves-light btn">leggi LOG</a>
				<p>Visualizza tutti gli accessi a questa pagina</p>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="../lib/jquery.js"></script>
	<script type="text/javascript" src="../lib/materialize.min.js"></script>
</body>
</html>
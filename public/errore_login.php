<?php 
	session_start();
	session_destroy();
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
		<h4>We're Sorry</h4>
		<p>Torna alla HOME e autenticati correttamente</p>
		<a href="../index.php"><div class="btn waves">HOME</div></a>
	</div>

	<script type="text/javascript" src="../lib/jquery.js"></script>
	<script type="text/javascript" src="../lib/materialize.min.js"></script>
</body>
</html>
<?php 
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Identificazione dell'utente</title>
	<link rel="stylesheet" type="text/css" href="lib/materialize/materialize.min.css">
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
		<h4>Accesso all'area riservata</h4>
	<form action="server/_login.php" method="post">
		<p>
			<b>Email</b> <input type="text" name="email" size="40" required/>
			<br><br>
			<b>Password</b> <input type="password" name="psw" size="40" required/><br/><br>
		</p>
		<p>
			<input type="submit" name="invio" value="Login" />
			<input type="reset" name="cancella" value="Reset" />
		</p>
	</form>
	</div>

	<script type="text/javascript" src="lib/jquery.js"></script>
	<script type="text/javascript" src="lib/materialize.min.js"></script>
</body>
</html>
<?php 
	session_start();
	if(!empty($_SESSION['permessi'])){
      	if (strpos($_SESSION['permessi'], "HOME") !== false) { 
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
		<h4>Che bello, siamo nella Home!</h4>
		<br><br>
		<div class="row">
			<div class="col s6">
				<a class="waves-effect waves-light btn" href="../server/_logout.php">LOGOUT</a>
				<p>Esci e Torna alla Home</p>
			</div>
			<?php if (strpos($_SESSION['permessi'], "LOG") !== false) { ?>
			<div class="col s6">
				<a href="read_logs.php" class="waves-effect waves-light btn">leggi LOG</a>
				<p>Visualizza tutti gli accessi al sito</p>
			</div>
			<?php } ?>
		</div>
		<br><br>
		<div class="row">
			<?php if (strpos($_SESSION['permessi'], "VIEW") !== false) { ?>
			<div class="col s6">
				<a class="waves-effect waves-light btn" href="view.php">VISUALIZZA</a>
				<p>Visualizza il contenuto della tabella 'Comuni di Terni'</p>
			</div>
			<?php } ?>
			<?php if (strpos($_SESSION['permessi'], "INS") !== false) { ?>
			<div class="col s6">
				<a href="ins.php" class="waves-effect waves-light btn">INSERISCI UTENTE</a>
				<p>Inserisci nuovi utenti</p>
			</div>
			<?php } ?>
		</div>
	</div>

	<script type="text/javascript" src="../lib/jquery.js"></script>
	<script type="text/javascript" src="../lib/materialize.min.js"></script>
</body>
</html>
<?php   
		} else { header( "Location: ../index.php" ); }
	} else { header( "Location: ../index.php" ); }
?>
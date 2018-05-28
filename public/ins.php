<?php 
	session_start();
  	if(!empty($_SESSION['permessi'])){
      	if (strpos($_SESSION['permessi'], "INS") !== false) { 
			require('../server/db_info.php');
			$connection = mysqli_connect($host, $usr, $psw, $db) or die('Impossibile connettersi al Server: ' . mysqli_error());
			$query = "SELECT CodTipoUt, tipo FROM tipo_utente";
			$result = mysqli_query($connection, $query);
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Inserimento</title>
	<link rel="stylesheet" type="text/css" href="../lib/materialize/materialize.min.css">
</head>
<body>
	<?php require("../server/nav.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col s6">
				<h4>Inserimento Utente</h4>
			</div>
			<div class="col s6" style="padding-top: 50px">
				<a class="waves-effect waves-light btn" href="home.php">HOME</a>
				<p>Torna alla Home</p>
			</div>
		</div>
		<br>
		<div class="row">
			<form action="../server/ins_utente.php" method="post">
		      <div class="row">
		        <div class="input-field col s6">
		        	<b>Email</b>
		          <input name="email" id="email" type="text" class="validate" required>
		        </div>
		        <div class="input-field col s6">
		        	<b>Password</b>
		          <input name="psw" id="psw" type="password" class="validate" required>
		        </div>
		        <div class="row">
		        	<div class="input-field col s3">
						<select id="tipo_ut" name="tipo_ut">
						  <option value="" disabled selected>.. scegli il tipo di utente</option>
						<?php 
					   		while( $row = mysqli_fetch_array($result) ){
					   			echo "<option value ='$row[0]'> $row[1] </option>";
					  	  	}
					  	?>
						</select>
						<label for="tipo_ut">Tipo Utente</label>
					</div>
		        </div>
		      </div>
		      	<input type="submit" name="invio" value="INSERISCI" />
				<input type="reset" name="cancella" value="Reset" />
		    </form>

		</div>
	</div>

	<script type="text/javascript" src="../lib/jquery.js"></script>
	<script type="text/javascript" src="../lib/materialize/materialize.min.js"></script>
	<script type="text/javascript">
		 $(document).ready(function() {
		    $('select').formSelect();
		  });
	</script>
</body>
</html>
<?php   
		} else { header( "Location: ../index.php" ); }
	} else { header( "Location: ../index.php" ); }
?>
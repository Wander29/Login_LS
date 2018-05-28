<?php 
	session_start();
	if(!empty($_SESSION['permessi'])){
      	if (strpos($_SESSION['permessi'], "VIEW") !== false) { 
	require('../server/db_info.php');
	$connection = mysqli_connect($host, $usr, $psw, $db) or die('Impossibile connettersi al Server: ' . mysqli_error());
	$query = "SELECT * FROM comuniterni";
	$result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Visualizza</title>
	<link rel="stylesheet" type="text/css" href="../lib/materialize/materialize.min.css">
</head>
<body>
	<?php require("../server/nav.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col s6">
				<h4>Visualizzazione Comuni Terni</h4>
			</div>
			<div class="col s6" style="padding-top: 50px">
				<a class="waves-effect waves-light btn" href="home.php">HOME</a>
				<p>Torna alla Home</p>
			</div>
		</div>
		<br><br>
		   <ul class="collapsible" data-collapsible="accordion">
		   	<?php 
		   		while( $row = mysqli_fetch_array($result) ){
		   	?>
		    <li>
		      <div class="collapsible-header"><?php echo $row[1]; ?></div>
		      <div class="collapsible-body">
		      		<b>C.A.P</b> <?php echo $row[2]; ?>
		      </div>
		    </li>
		    <?php 
		    	} 
		    ?>
		  </ul>
	</div>

	<script type="text/javascript" src="../lib/jquery.js"></script>
	<script type="text/javascript" src="../lib/materialize/materialize.min.js"></script>
	<script>
		$(document).ready(function(){
		    $('.collapsible').collapsible();
		  });
	</script>
</body>
</html>
<?php   
		} else { header( "Location: ../index.php" ); }
	} else { header( "Location: ../index.php" ); }
?>
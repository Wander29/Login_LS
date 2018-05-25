<?php 
    //prendo la pagina in php contenente le credenziali globali per la connessioni al db
    require("DB_info.php");
    
    //connessione al db
    $connection = mysqli_connect($host, $username, $password, $database); //tramite variabile
    
    if($connection){
        echo "connessione avvenuta";
    } else {
        die("connessione non avvenuta"); //The die() function prints a message and exits the current script.
    }

    //eventuale query
    
    
    //disconnessione dal db
    mysqli_close($connection);
?>
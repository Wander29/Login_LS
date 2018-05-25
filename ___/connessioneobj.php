<?php 
    //prendo la pagina in php contenente le credenziali globali per la connessioni al db
    require("DB_info.php");
    
    //apro sessione
    session_start();
    $_SESSION["connection"] = null;

    //***** Connessione Tramite OBJECT *****

    //connessione al db
    $connection = new mysqli($host, $username, $password, $database);
    
    if($connection -> connect_errno){
        echo "connessione fallita" . $connection -> connect_error . ".";
        exit();
    } else {
        echo "connessione avvenuta<br>";
        
        $_SESSION["connection"] = $connection;
        header("Location: viewtab.php");
    }

    //eventuale query
    
    //chiudo la connessione e distruggo l'oggetto connection
    $connection -> close();
?>
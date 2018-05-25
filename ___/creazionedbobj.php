<?php 
    //prendo la pagina in php contenente le credenziali globali per la connessioni al db
    require("DB_info.php");
    
    //***** Connessione Tramite OBJECT *****

    //connessione al db
    $connection = new mysqli($host, $username, $password);
    
    if($connection -> connect_errno){
        echo "connessione fallita: " . $connessione -> connect_error . ".";
        exit();
    } else {
        echo "connessione avvenuta <br>";
    }

    //creazione db
    if(!$connection -> query("CREATE DATABASE if not exists nuova_rubrica")){
        echo "errore nella query: " . $connection -> error . ".";
    } else {
        echo "query eseguita con successo";
    }
    
    /*
    try{
        $connection -> query("CREATE DATABASE if not exists nuova_rubrica");    
        echo "evviva query riuscita con successo";
    } catch(Exception $e){
        echo "errore: " . $e -> getMessage();
    }
    */
    
    //chiudo la connessione e distruggo l'oggetto connection
    $connection -> close();
?>
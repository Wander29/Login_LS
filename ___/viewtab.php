<?php
    session_start();
    $connection = $_SESSION["connection"]; // effettivamente non se sa se funziona pero la prof dice di si
    
    echo "reindirizzato <br>";

    if($connection){
        
        echo "connection passata"; 
        
        if($result = mysqli_query($connection, "SELECT * FROM alunno")){
            while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                echo $row[0] . " ";
                echo $row[1] . "<br>";
            }   
        } else {
            exit();
        }
    
    } else {
        echo "connessione fallita" . $connection -> connect_error . ".";
    }

    $connection -> close();
?>
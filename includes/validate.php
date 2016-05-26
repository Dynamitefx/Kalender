<?php 
    session_start(); 
     
    $errors = array(); 
     
    $navn            = $_POST['navn']; 
    $Email           = $_POST['email']; 
    $kodeord         = $_POST['kodeord']; 
    $postnummer      =$_POST['postnr']; 
    $gentagetkodeord = $_POST['getagetkodeord']; 
    $adresse         = $_POST['adresse']; 
    //Valider Begge kodeord 

    if (!is_numeric($postnummer)) { 
        $errors[] = "Du har indtastet bogstaver i dit postnummer"; 
    }else{ 
        $msg = $postnummer; 
    } 

    
    // Valider navn 
    if (strlen($navn) < 2) 
    { 
        $errors[] = "Navn for kort."; 
    } 

    if (strlen($navn) > 40)  
    { 
        $errors[] = "Navn for langt."; 
    } 

    // Er der nogen fejl? 
    if (sizeof($errors) > 0) 
    { 
        // Ja, gem fejlene i sessionen 
        $_SESSION["OPRETBRUGER_ERRORS"] = $errors; 
        header("location: ../index.php"); 
        die; 
    } 
    // Nej vi kan fortsÃ¦tte! 
    // Kode til at gemme bruger i databasen 
    header("location: ../success.php");             
?> 
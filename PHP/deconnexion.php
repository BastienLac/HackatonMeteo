<?php
    session_start();
    
    // Destruction de la sessin
    if(session_destroy()) 
    {
        // Redirection a la page d'accueil
        header("Location: ../index.php");
    }
?>
<?php
    session_start();
    if(!isset($_SESSION["login"])) {
    	$login = $_SESSION['login'];
        $nom = $_SESSION['nom'];
        header("Location: index.php");
        exit();
    }
?>
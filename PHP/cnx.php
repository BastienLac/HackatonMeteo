<?php
//connexion a la base de données
// dsn = Data Source Name = driver MYSQL
$dsn='mysql:dbname=bddmeteo;host=localhost';
//login
$login='root';
// Mot de passe
$motDePasse='';
// Connexion au serveur MySQL
try{
    $cnx = new PDO($dsn, $login, $motDePasse,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch (PDOException $e){
	die('Erreur : ' . $e->getMessage());
}

// <?php
// //connexion a la base de données
// // dsn = Data Source Name = driver MYSQL
// $dsn='mysql:dbname=defaultdb;host=mysql-1b4e0968-talbi-757b.aivencloud.com';
// //login
// $login='avnadmin';
// // Mot de passe
// $motDePasse='Up0ZHwi2v153BrwV';
// // Connexion au serveur MySQL
// try{
//     $cnx = new PDO($dsn, $login, $motDePasse,
//             array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//             PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
// }
// catch (PDOException $e){
// 	die('Erreur : ' . $e->getMessage());
// }

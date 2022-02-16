<?php
include "./cnx.php";

$sql = $cnx->prepare("select * from utilisateur where login = ? and mdp = ?");
$sql->bindValue(1,$_POST['login']);
$sql->bindValue(2,$_POST['mdp']);
$sql->execute();
if($sql->rowCount() == 1){
    echo"0";
}else{
   $requete = $cnx->prepare("insert into utilisateur (nom,login,mdp) VALUES(?,?,MD5(?))");
   $requete->bindValue(1,$_POST['nom']);
   $requete->bindValue(2,$_POST['login']);
   $requete->bindValue(3,$_POST['mdp']);
   $requete->execute();
}
?>
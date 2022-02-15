<?php
include "./cnx.php";

$sql = $cnx->prepare("select * from utilisateur where login = ? and mdp = ?");
$sql->bindValue(1,$_GET['login']);
$sql->bindValue(2,$_GET['mdp']);
$sql->execute();
if($sql->rowCount() == 1){
    foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
    {       
        echo"1";
    }
}else{
   echo"0";   
}
?>
<?php
include "./cnx.php";

$sql = $cnx->prepare("select AVG(temperature) from capteur WHERE DAY(date) = DAY(DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)) AND HOUR(date) <= 8");
$sql->execute();
$moyenneHier = $sql->fetch()[0];


$rqt = $cnx->prepare("select AVG(temperature) from capteur WHERE DAY(date) = DAY(DATE(NOW())) AND HOUR(date) <= 8");
$rqt->execute();
$moyenneToday = $rqt->fetch()[0];
$pourcentage = round((($moyenneToday * 100)/$moyenneHier) - 100);

if($pourcentage > 0){
    echo"<div class='card' style='width: 18rem;'>";
    echo"<img src='...' class='card-img-top' alt='...'>";
    echo"<div class='card-body'>";
    echo"<p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>";
    echo"</div>";
    echo"</div>";
}
?>
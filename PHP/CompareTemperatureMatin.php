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
    echo"<div class='card text-center' >";
    echo"<h1>Température du matin</h1>";
    echo"<div class='card-body'>";
    echo"<h1>".round($moyenneToday, 1)."</h1>";
    echo"<h3>+".$pourcentage."%</h3>";
    echo"<h1 class='text-success'><i class='bi bi-arrow-up-right'></i></h1>";
    echo"</div>";
    echo"</div>";
}
else{
    echo"<div class='card text-center' >";
    echo"<h1>Température du matin</h1>";
    echo"<div class='card-body'>";
    echo"<h1>".round($moyenneToday, 1)."</h1>";
    echo"<h3>".$pourcentage."%</h3>";
    echo"<h1 class='text-danger'><i class='bi bi-arrow-down-right'></i></h1>";
    echo"</div>";
    echo"</div>";
}
?>
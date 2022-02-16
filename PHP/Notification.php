<?php

include "cnx.php";

$rqt = $cnx->prepare("select temperature, date from capteur order by date desc");
$rqt->execute();

$tempActuelle = $rqt->fetch()[0];

if ($tempActuelle > 30){
    echo "<h1>La température actuelle est de : " . $tempActuelle . "°C</h1>
    <h3 class='text-danger'>Oubliez pas de boire !</h3>";
}
else if ($tempActuelle < 5){
    echo "<h1>La température actuelle est de : " . $tempActuelle . "°C</h1>
    <h3 class='text-danger'>Attention au gel !</h3>";
}
else {
    echo "<h1>La température actuelle est de : " . $tempActuelle . "°C</h1>";
}

?>
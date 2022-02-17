<?php

include "./cnx.php";
$rqt = $cnx->prepare("select count(humidite) as HumInf from capteur where humidite < (select avg(humidite) from capteur) and Month(date) = MONTH(CURDATE());");
$rqt->execute();
$rqt2 = $cnx->prepare("select count(humidite) as HumSup from capteur where humidite > (select avg(humidite) from capteur) and Month(date) = MONTH(CURDATE());");
$rqt2->execute();

$data = array();
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    $data[] = $ligne;
}

foreach ( $rqt2->fetchAll(PDO::FETCH_ASSOC) as $ligne2)
{
    $data[] = $ligne2;
}

echo json_encode($data);

?>

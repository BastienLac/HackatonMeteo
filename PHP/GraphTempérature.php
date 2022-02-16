<?php

include "cnx.php";
$rqt = $cnx->prepare("select count(temperature) as TempInf from capteur where temperature < (select avg(temperature) from capteur);");
$rqt->execute();
$rqt2 = $cnx->prepare("select count(temperature) as TempSup from capteur where temperature > (select avg(temperature) from capteur);");
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

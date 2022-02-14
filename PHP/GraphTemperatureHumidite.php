<?php

include "cnx.php";

$periode = $_GET['periode'];
// var_dump($periode);

$rqt = $cnx->prepare("select temperature, date, DAYOFWEEK(date) as jourSemaine, DATE_FORMAT(date, '%H:%i') as dateHeure, MONTH(date) as mois, DATE_FORMAT(date, '%D %b %Y') as jour, minute(date) as minute from capteur order by date");
$rqt->execute();

$data = array();
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    $date = new DateTime($ligne['date']);
    if ($periode == 0 && ($ligne['minute'] == '30' || $ligne['minute'] == '0'))
        $data[] = $ligne;
    else if ($periode == 1 && ($ligne['dateHeure'] == '08:00' || $ligne['dateHeure'] == '12:00' || $ligne['dateHeure'] == '19:00'))
        $data[] = $ligne;
    else if ($periode == 2 && date_format($date, 'n') == $ligne['mois'] && $ligne['dateHeure'] == '12:00')
        $data[] = $ligne;
}

echo json_encode($data);

?>
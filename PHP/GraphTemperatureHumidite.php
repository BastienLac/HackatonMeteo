<?php

include "cnx.php";

// Période sélectionnée
$periode = $_GET['periode'];

$rqt = $cnx->prepare("select temperature, date, humidite, DAYOFWEEK(date) as jourSemaine, DATE_FORMAT(date, '%H:%i') as dateHeure, MONTH(date) as mois, DATE_FORMAT(date, '%d %b %Y') as jour, minute(date) as minute from capteur order by date");
$rqt->execute();

$data = array();

// date du jour
$date = new DateTime();
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    // date BDD
    $dateBDD = new DateTime($ligne['date']);

    // Donnée du jour (seulement les heures piles sont récuperées)
    if ($periode == 0 && date_format($date, 'j M Y') == $ligne['jour'] && $ligne['minute'] == '0')
        $data[] = $ligne;
    // Semaine --> toutes les 4 heures
    else if ($periode == 1 && date_format($date, 'W') == date_format($dateBDD, 'W')&& ($ligne['dateHeure'] == '00:00' || $ligne['dateHeure'] == '04:00' || $ligne['dateHeure'] == '08:00' || $ligne['dateHeure'] == '12:00' || $ligne['dateHeure'] == '16:00' || $ligne['dateHeure'] == '20:00'))
        $data[] = $ligne;
    // Mois --> une donnée par jour
    else if ($periode == 2 && date_format($date, 'n') == $ligne['mois'] && $ligne['dateHeure'] == '12:00')//  && $ligne['dateHeure'] == '12:00'
        $data[] = $ligne;
}

echo json_encode($data);

?>
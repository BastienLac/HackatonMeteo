<?php

include "cnx.php";
$rqt = $cnx->prepare("SELECT AVG(humidite) as MoyHumDay, date FROM capteur WHERE
 MONTH(date) = MONTH(CURDATE()) GROUP BY DAY(date);");
$rqt->execute();

$var = 99;
$vardate = "";
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    $varHum = $ligne['MoyHumDay'];
    if($varHum < $var){
        $var = $varHum;
        $vardate = $ligne['date'];
    }
}

?>

<h1 class="no-margins"> <?php echo number_format($var,1) ?> %</h1>
    <div class="font-bold text-navy"> Le <?php echo date("d/m/Y", strtotime($vardate));?></small></div>
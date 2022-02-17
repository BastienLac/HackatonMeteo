<?php

include "cnx.php";
$rqt = $cnx->prepare("SELECT AVG(temperature) as MoyTempDay, date FROM capteur WHERE
 MONTH(date) = MONTH(CURDATE()) GROUP BY DAY(date);");
$rqt->execute();

$var = 0;
$vardate = "";
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    $varTemp = $ligne['MoyTempDay'];
    if($varTemp > $var){
        $var = $varTemp;
        $vardate = $ligne['date'];
    }
}

?>

<h1 class="no-margins"> <?php echo number_format($var,1) ?> °C</h1>
    <div class="font-bold text-navy"> Le <?php echo date("d/m/Y", strtotime($vardate));?></small></div>
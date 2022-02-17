<?php

include "./cnx.php";
$rqt = $cnx->prepare("SELECT max(temperature) as Maxtemp, avg(temperature) as Moytemp, min(temperature) as Mintemp FROM `capteur`");
$rqt->execute();

echo "<style>
#title{
    text-align: center;
}
</style>";

foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
        echo'<div class="col-md-4">';
        echo"<h1 class='no-margins'>".number_format($ligne['Mintemp'],1)."</h1>";
        echo'<small class="font-bold text-navy">Temp Min</small>';
        echo'</div>';
        echo'<div class="col-md-4">';
        echo"<h1 class='no-margins'>".number_format($ligne['Moytemp'],1)."</h1>";
        echo'<small class="font-bold text-navy">Temp Moy</small>';
        echo'</div>';
        echo'<div class="col-md-4">';
        echo"<h1 class='no-margins'>".number_format($ligne['Maxtemp'],1)."</h1>";
        echo'<small class="font-bold text-navy">Temp Max</small>';
        echo'</div>';
}
?>
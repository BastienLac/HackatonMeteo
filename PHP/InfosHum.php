<?php

include "./cnx.php";
$rqt = $cnx->prepare("SELECT max(humidite) as Maxhum, avg(humidite) as Moyhum, min(humidite) as Minhum FROM `capteur`");
$rqt->execute();

echo "<style>
#title{
    text-align: center;
}
</style>";

foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
        echo'<div class="col-md-4">';
        echo"<h1 class='no-margins'>".number_format($ligne['Minhum'],1)."</h1>";
        echo'<small class="font-bold text-navy">Humidité Min</small>';
        echo'</div>';
        echo'<div class="col-md-4">';
        echo"<h1 class='no-margins'>".number_format($ligne['Moyhum'],1)."</h1>";
        echo'<small class="font-bold text-navy">Humidité Moy</small>';
        echo'</div>';
        echo'<div class="col-md-4">';
        echo"<h1 class='no-margins'>".number_format($ligne['Maxhum'],1)."</h1>";
        echo'<small class="font-bold text-navy">Humidité Max</small>';
        echo'</div>';
}
?>
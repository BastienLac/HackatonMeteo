<?php

include "cnx.php";
$rqt = $cnx->prepare("SELECT max(humidite) as Maxhum, avg(humidite) as Moyhum, min(humidite) as Minhum FROM `capteur`");
$rqt->execute();

echo "<style>
#title{
    text-align: center;
}
</style>";

foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    echo "<div id='title'>Humidité</div>";
    echo "<div>Moyenne=".number_format($ligne['Moyhum'],1)."<br/>";
    echo "Maximum=".number_format($ligne['Maxhum'],1)."<br/>";
    echo "Minimum=".number_format($ligne['Minhum'],1)."</div>";
}
?>
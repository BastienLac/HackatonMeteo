<?php

include "cnx.php";
$rqt = $cnx->prepare("SELECT max(temperature) as MaxTemp, avg(temperature) as MoyTemp, min(temperature) as MinTemp FROM `capteur`");
$rqt->execute();

echo "<style>
#title{
    text-align: center;
}
</style>";

foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    echo "<div id='title'>Température</div>";
    echo "<div>Moyenne=".number_format($ligne['MoyTemp'],1)."<br/>";
    echo "Maximum=".number_format($ligne['MaxTemp'],1)."<br/>";
    echo "Minimum=".number_format($ligne['MinTemp'],1)."</div>";
}
?>
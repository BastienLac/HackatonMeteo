<?php

include "./cnx.php";
$rqt = $cnx->prepare("SELECT count(*) AS Total FROM capteur WHERE DAY(date) = DAY(CURDATE())");
$rqt->execute();


foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{ ?>
    <div class="ibox-title">
        <span class="label label-primary pull-right">Journalier</span>
        <h5>Données</h5>
    </div>
    <div class="ibox-content">
    <h1 class="no-margins"><?php echo number_format($ligne['Total'],1) ?></h1>
    <small>Total de données capturées</small>
    </div>
<?php
}
?>
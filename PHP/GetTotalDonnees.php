<?php

include "./cnx.php";
$rqt = $cnx->prepare("SELECT count(*) AS Total FROM capteur WHERE YEAR(date) = YEAR(CURDATE())");
$rqt->execute();


foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{ ?>
    <h1 class="no-margins"><?php echo number_format($ligne['Total'],1) ?></h1>
    <small>Total de données capturées</small>

<?php
}
?>
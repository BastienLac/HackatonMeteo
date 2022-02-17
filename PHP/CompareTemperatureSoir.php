<?php
include "./cnx.php";

$sql = $cnx->prepare("select AVG(temperature) from capteur WHERE DAY(date) = DAY(DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)) AND HOUR(date) >= 16");
$sql->execute();
$moyenneHierTemp = $sql->fetch()[0];


$rqt = $cnx->prepare("select AVG(temperature) from capteur WHERE DAY(date) = DAY(DATE(NOW())) AND HOUR(date) >= 16");
$rqt->execute();
$moyenneTodayTemp = $rqt->fetch()[0];
$pourcentageTemp = round((($moyenneTodayTemp * 100)/$moyenneHierTemp) - 100);

$sql1 = $cnx->prepare("select AVG(humidite) from capteur WHERE DAY(date) = DAY(DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)) AND HOUR(date) >= 16");
$sql1->execute();
$moyenneHierHum = $sql1->fetch()[0];


$rqt1 = $cnx->prepare("select AVG(humidite) from capteur WHERE DAY(date) = DAY(DATE(NOW())) AND HOUR(date) >= 16");
$rqt1->execute();
$moyenneTodayHum = $rqt1->fetch()[0];
$pourcentageHum = round((($moyenneTodayHum * 100)/$moyenneHierHum) - 100); ?>


        <div class="col-md-6">
            <h1 class="no-margins"><?php echo round($moyenneTodayHum, 1) ?>%</h1>
        <?php if($pourcentageHum > 0){ ?>
                <div style="" class="font-bold text-navy"><?php echo round($pourcentageHum, 1) ?>% <i class="fa fa-level-up"></i> <small>Augmentation</small></div>
        <?php } else{ ?>
            <div style="color:#ef7865" class="font-bold text-navy"><?php echo round($pourcentageHum, 1) ?>% <i class="fa fa-level-down"></i> <small>Diminution</small></div>
        <?php } ?>
        </div>
        <div class="col-md-6">
            <h1 class="no-margins"><?php echo round($moyenneTodayTemp, 1) ?>°C</h1>
        <?php if($pourcentageTemp > 0){ ?>
                <div style="" class="font-bold text-navy"><?php echo round($pourcentageTemp, 1) ?>% <i class="fa fa-level-up"></i> <small>Augmentation</small></div>
        <?php } else{ ?>
            <div style="color:#ef7865" class="font-bold text-navy"><?php echo round($pourcentageTemp, 1) ?>% <i class="fa fa-level-down"></i> <small>Diminution</small></div>
        <?php } ?>
        </div>
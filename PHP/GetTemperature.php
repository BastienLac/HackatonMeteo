<?php
include "./cnx.php";

$sql = $cnx->prepare("select humidite, temperature, date from capteur ORDER BY date DESC");
$sql->execute();

foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    echo"<tr>";
    if($ligne['humidite'] > 60)
    {
      echo "<td style='font-size:16px;font-weight:bold;color:#ee6170'>".$ligne['humidite']."</td>";
    }
    else{
      echo "<td style='font-size:16px'>".$ligne['humidite']."</td>";
    }
    if($ligne['temperature'] > 30)
    {
      echo "<td style='font-size:16px;font-weight:bold;color:#ee6170'>".$ligne['temperature']."</td>";
    }
    else{
      echo "<td style='font-size:16px'>".$ligne['temperature']."</td>";
    }
    echo "<td style='font-size:16px'>".$ligne['date']."</td>
  </tr>";
}
?>
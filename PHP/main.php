<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page principale</title>
    <link href="../CSS/Style.css" rel="stylesheet">
    <script type="text/javascript" src="../JQuery/Chart.js"></script>
    <script type="text/javascript" src="../JQuery/JQuery 3.5.1.js"></script>
    <script type="text/javascript" src="../JS/fonctions.js"></script>
    <script src="../Bootstrap/js/bootbox.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.js"></script>
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/javascript">
        $
        (
            function()
            {
                DessinerGraphTemperatureHumidite();
                CompareTemperatureMatin();
            }
        );
    </script>

</head>
<body>
    <div id="container" class="m-2">
        <h1 class="text-center">Graphique température/temps</h1>
        <select id='lstPeriode' onChange='DessinerGraphTemperatureHumidite()'>
            <option value='0' selected>Jour</option>
            <option value='1'>Semaine</option>
            <option value='2'>Mois</option>
        </select>
        <div id="graphTemperatureHumidite" style="height: 200px; width: 1000px">
            <canvas id="canvasGraphTemperatureHumidite" style="height: 200px; width: 1000px"></canvas>
        </div>
    </div>
    <div id="cardTemperatureMatin"></div>
</body>
</html>
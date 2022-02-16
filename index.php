<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="../HackatonMeteo/JQuery/Chart.js"></script>
    <script type="text/javascript" src="../HackatonMeteo/JS/fonctions.js"></script>
    <link href="../HackatonMeteo/CSS/Style.css" rel="stylesheet">
    <script type="text/javascript" src="../HackatonMeteo/JQuery/JQuery 3.5.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1
/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <script type="text/javascript">
            $
            (
                function()
                {
                    GetInfos();
                    GetCamembert();
                    GetInfosHum();
                    GetCamembertHum();
                }
            );
    </script>
</head>

<body>
    <div class="bg-light border border-primary" id="container">

    <div class="bg-light border border-primary" id="infos"></div>
    <div class="bg-light border border-primary" id="GraphTemp" ><div id="canvasTemp"><canvas id="canvasGraph"></canvas></div><div></div></div>
    <div class="bg-light border border-primary" id="infosHum"></div>
    <div class="bg-light border border-primary" id="GraphHum"><div id="canvasHum"><canvas id="canvasGraph2"></canvas></div></div>

    </div>
</body>
</html>
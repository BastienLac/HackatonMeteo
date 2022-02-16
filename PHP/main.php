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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">
    <script type="text/javascript">
        $
        (
            function()
            {
                DessinerGraphTemperatureHumidite();
                CompareTemperatureMatin();
                CompareTemperatureMidi();
                CompareTemperatureSoir();
                GetInfos();
                GetCamembert();
                GetInfosHum();
                GetCamembertHum();
                Notification();
                var refresh = setInterval(function() {
                    console.log('aaa')
                    Notification()
                }, 5000);
            }
        );
    </script>

</head>
<body style="background-color: #f6f7ff">
    <div class="bg-light border border-primary" id="container">
        <div class="bg-light border border-primary" id="infos"></div>
        <div class="bg-light border border-primary" id="GraphTemp" ><div id="canvasTemp"><canvas id="canvasGraph"></canvas></div><div></div></div>
        <div class="bg-light border border-primary" id="infosHum"></div>
        <div class="bg-light border border-primary" id="GraphHum"><div id="canvasHum"><canvas id="canvasGraph2"></canvas></div></div>
    </div>
    <div class="m-2 container">
        <h1 class="text-center offset-3 mb-5 mt-2">Graphique température/temps</h1>
        <div class="col-9 text-center offset-3">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body offset-1">
                    <div class="col-2">
                        <select id='lstPeriode' class="form-select form-select-lg text-start mb-2 border border-primary" onChange='DessinerGraphTemperatureHumidite()'>
                            <option value='0' selected>Jour</option>
                            <option value='1'>Semaine</option>
                            <option value='2'>Mois</option>
                        </select>
                    </div>
                    <div id="graphTemperatureHumidite" class="col-10">
                        <canvas id="canvasGraphTemperatureHumidite"></canvas>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div id="btnModal" class="position-absolute bottom-0 end-0" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="ModalClose()"></button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onClick="ModalClose()">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-3 " id="cardTemperatureMatin"></div>
        <div class="col-3" id="cardTemperatureMidi"></div>
        <div class="col-3" id="cardTemperatureSoir"></div>
    </div>
    <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
</body>
</html>
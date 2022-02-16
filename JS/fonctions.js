function GetInfos()
{
    $.ajax
    (
        {
            type:"GET",
            url:"PHP/InfosTemp.php",
            success:function(data)
            {
                $("#infos").append(data);
            },
            error:function()
            {
                alert("Erreur de récupération : Infos");
            }
        }
    );
}

function GetInfosHum()
{
    $.ajax
    (
        {
            type:"GET",
            url:"PHP/InfosHum.php",
            success:function(data)
            {
                $("#infosHum").append(data);
            },
            error:function()
            {
                alert("Erreur de récupération : Infos");
            }
        }
    );
}

function GetCamembert()
{
        $.ajax
    (
        {
            type:"GET",
            url:"PHP/GraphTempérature.php",
            success:function(data)
            {
                var Titre = [];
                var Température = [];

                var valeurs = $.parseJSON(data);

                Titre.push("Inférieure à la moyenne");
                Température.push(valeurs[0].TempInf);
                Titre.push("Suppérieure à la moyenne");
                Température.push(valeurs[1].TempSup);



                var chartdata = {
                    labels: Titre,
                    datasets: [
                        {
                            label: 'Pourcentage des température',
                            backgroundColor: ['#5D89FC ','#FC5D5D'],
                            borderColor: '#46d5f1',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            data: Température
                        }
                    ]
                };

                var graphTarget = $("#canvasGraph");

                    var barGraph = new Chart(graphTarget, {
                        type: 'doughnut',
                        data: chartdata
                    });

            },
            error:function()
            {
                alert("Erreur pour le graphique 1");
            }
        }
    );
}
function GetCamembertHum()
{
        $.ajax
    (
        {
            type:"GET",
            url:"PHP/GraphHumidite.php",
            success:function(data)
            {
                var Titre = [];
                var Humidite = [];

                var valeurs = $.parseJSON(data);

                Titre.push("Inférieure à la moyenne");
                Humidite.push(valeurs[0].HumInf);
                Titre.push("Suppérieure à la moyenne");
                Humidite.push(valeurs[1].HumSup);



                var chartdata = {
                    labels: Titre,
                    datasets: [
                        {
                            label: "Pourcentage des taux d'umidite",
                            backgroundColor: ['#5D89FC ','#FC5D5D'],
                            borderColor: '#46d5f1',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            data: Humidite
                        }
                    ]
                };

                var graphTarget = $("#canvasGraph2");

                    var barGraph = new Chart(graphTarget, {
                        type: 'doughnut',
                        data: chartdata
                    });

            },
            error:function()
            {
                alert("Erreur pour le graphique 1");
            }
        }
    );
}
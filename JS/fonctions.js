function GetInfos()
{
    $.ajax
    (
        {
            type:"GET",
            url:"InfosTemp.php",
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


function VerifierConnexion()
{
    $.ajax
    (
        {
            url:"VerifierConnexion.php",
            data:"login="+txtLogin.value+"&mdp="+txtMdp.value,
            success: function(data)
            {
                if(data == "0")
                    alert("Identifiants Incorrects")
                else{
                    location.href='PHP/main.php';
                }
            },
            error: function()
            {
                alert("Erreur appel des utilisateurs");
            }
        }
    )
}

function GetInfosHum()
{
    $.ajax
    (
        {
            type:"GET",
            url:"InfosHum.php",
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
            url:"GraphTempérature.php",
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
            error: function()
            {
                alert("Erreur appel des temperatures soir");
            }
        }
    );
} 

function CreerUtilisateur()
{
    $.ajax
    (
        {
            type:"POST",
            url:"CreerUtilisateur.php",
            data:"nom="+txtNom.value+"&login="+txtLogin.value+"&mdp="+txtMdp.value,
            success: function(data)
            {
                if(data == "0")
                    alert("Un compte avec les même identifiants existe déjà")
                else{
                    alert("Votre compte a bien été créé")
                    location.href='../index.php';
                }
            },
            error: function()
            {
                alert("Erreur appel de la création");
            }
        }
    )
}


function DessinerGraphTemperatureHumidite()
{

    $.ajax
        (
            {
            url:"GraphTemperatureHumidite.php",
            data:'periode=' + $("#lstPeriode option:selected").val(),
            success:function(data)
            {
                var temperature = [];
                var humidite = [];
                var temps = [];

                semaine = [
                    "Dimanche",
                    "Lundi",
                    "Mardi",
                    "Mercredi",
                    "Jeudi",
                    "Vendredi",
                    "Samedi",
                ];

                var valeurs = $.parseJSON(data);

                for(var i in valeurs)
                {
                    temperature.push(valeurs[i].temperature);
                    humidite.push(valeurs[i].humidite);

                    if ($("#lstPeriode option:selected").val() == 0)
                        temps.push(valeurs[i].dateHeure);
                    else if ($("#lstPeriode option:selected").val() == 1){
                        valeurs[i].jourSemaine = semaine[valeurs[i].jourSemaine - 1];
                        temps.push(valeurs[i].jourSemaine + " " + valeurs[i].jour + " " + valeurs[i].dateHeure);
                    }
                    else if ($("#lstPeriode option:selected").val() == 2)
                        temps.push(valeurs[i].jour);
                }

                var chartdata = {
                    labels: temps,
                    datasets: [{
                        label: 'température en °C',
                        yAxisID: 'A',
                        data: temperature,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                    },
                    {
                        label: 'humidité en %',
                        yAxisID: 'B',
                        data: humidite,
                        fill: false,
                        borderColor: 'rgb(75, 192, 19)',
                    }]
                };

                $("#graphTemperatureHumidite").empty()
                $("#graphTemperatureHumidite").append("<canvas id='canvasGraphTemperatureHumidite'></canvas>");
                var graphTarget = $("#canvasGraphTemperatureHumidite");

                var myGraph = new Chart(graphTarget, {
                    type: 'line',
                    data: chartdata,
                    options: { 
                        scales: { 
                            A: { 
                                type: 'linear', 
                                position: 'left',
                                min: 10,
                                max: 30,
                                grid: {
                                    display: false,
                                }
                            }, 
                            B: { 
                                type: 'linear', 
                                position: 'right',
                                min: 30,
                                max: 50,
                                grid: {
                                    display: false,
                                }
                            },
                            x: {
                                grid: {
                                    display: false,
                                }
                            }
                        } 
                    }
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
            url:"GraphHumidite.php",
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

function CompareTemperatureMatin()
{
    $.ajax
    (
        {
            type:"GET",
            url:"CompareTemperatureMatin.php",
            success: function(data)
            {
                $('#cardTemperatureMatin').append(data);
            },
            error: function()
            {
                alert("Erreur appel des temperatures matin");
            }
        }
    )
}

function CompareTemperatureMidi()
{
    $.ajax
    (
        {
            type:"GET",
            url:"CompareTemperatureMidi.php",
            success: function(data)
            {
                $('#cardTemperatureMidi').append(data);
            },
            error: function()
            {
                alert("Erreur appel des temperatures midi");
            }
        }
    )
}

function CompareTemperatureSoir()
{
    $.ajax
    (
        {
            type:"GET",
            url:"CompareTemperatureSoir.php",
            success: function(data)
            {
                $('#cardTemperatureSoir').append(data);
            },
            error: function()
            {
                alert("Erreur appel des temperatures soir");
            }
        }
    )
}
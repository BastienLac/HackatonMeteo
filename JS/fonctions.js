function VerifierConnexion()
{
    $.ajax
    (
        {
            type:"GET",
            url:"PHP/VerifierConnexion.php",
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

function DessinerGraphTemperatureHumidite(){

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
                        temps.push(valeurs[i].jourSemaine + " " + valeurs[i].jour + "\n" + valeurs[i].dateHeure);
                    }
                    else if ($("#lstPeriode option:selected").val() == 2)
                        temps.push(valeurs[i].jour);
                }

                var chartdata = {
                    labels: temps,
                    datasets: [{
                        label: 'Température en °C',
                        lineTension: 0.2,
                        yAxisID: 'A',
                        data: temperature,
                        fill: true,
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                    },
                    {
                        label: 'Humidité en %',
                        lineTension: 0.2,
                        yAxisID: 'B',
                        data: humidite,
                        fill: true,
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
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
                                max: 30
                            }, 
                            B: { 
                                type: 'linear', 
                                position: 'right',
                                min: 30,
                                max: 50,
                                ticks: { 
                                    max: 1, 
                                    min: 0 
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

function GetTotalDonnees()
{
    $.ajax
    (
        {
            type:"GET",
            url:"GetTotalDonnees.php",
            success:function(data)
            {
                $("#totalDonnees").append(data);
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

function GetInfosTemp()
{
    $.ajax
    (
        {
            type:"GET",
            url:"InfosTemp.php",
            success:function(data)
            {
                $("#infosTemp").append(data);
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
            url:"GraphTemperature.php",
            success:function(data)
            {
                var Titre = [];
                var Température = [];

                var valeurs = $.parseJSON(data);

                Titre.push("Données inférieures à la moyenne");
                Température.push(valeurs[0].TempInf);
                Titre.push("Données supérieures à la moyenne");
                Température.push(valeurs[1].TempSup);



                var chartdata = {
                    labels: Titre,
                    datasets: [
                        {
                            label: 'Pourcentage des températures',
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

                Titre.push("Données inférieures à la moyenne");
                Humidite.push(valeurs[0].HumInf);
                Titre.push("Données supérieures à la moyenne");
                Humidite.push(valeurs[1].HumSup);



                var chartdata = {
                    labels: Titre,
                    datasets: [
                        {
                            label: "Pourcentage des taux d'humidite",
                            backgroundColor: ['#5D89FC ','#1ab394'],
                            borderColor: '#46d5f1',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            data: Humidite,
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

function GetTabTemperature()
{
    $.ajax
    (
        {
            type:"GET",
            url:"GetTemperature.php",
            success: function(data)
            {
                $('#tabTemperature').append(data);
                $('#tableTemperature').bootstrapTable({pagination: true});
            },
            error: function()
            {
                alert("Erreur appel des temperatures tableaux");
            }
        }
    )
}

function converHTMLFileToPDF() {
	html2canvas($("#graphTemperatureHumidite"), {
        onrendered: function(canvas) {
            var imgData = canvas.toDataURL(
                'image/png');
            var doc = new jsPDF('p', 'pt');
            doc.addImage(imgData, 'PNG', 10, 10);
            doc.save('graphique.pdf');
        }
    });
}
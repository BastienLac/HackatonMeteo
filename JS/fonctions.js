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
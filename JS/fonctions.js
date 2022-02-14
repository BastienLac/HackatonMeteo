function DessinerGraphTemperatureHumidite()
{
    console.log()
    $.ajax
    (
        {
            type:"GET",
            url:"GraphTemperatureHumidite.php",
            data:'periode=' + $("#lstPeriode option:selected").val(),
            success:function(data)
            {
                console.log('bbb')
                var temperature = [];
                var temps = [];

                $semaine = [
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
                    if ($("#lstPeriode option:selected").val() == 0)
                        temps.push(valeurs[i].dateHeure);
                    else if ($("#lstPeriode option:selected").val() == 1){
                        valeurs[i].jourSemaine = $semaine[valeurs[i].jourSemaine - 1];
                        temps.push(valeurs[i].jourSemaine + " " + valeurs[i].jour);
                    }                    
                    else if ($("#lstPeriode option:selected").val() == 2)
                        temps.push(valeurs[i].jour);
                }

                var chartdata = {
                    labels: temps,
                    datasets: [{
                        label: 'température',
                        data: temperature,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                };
                
                var graphTarget = $("#canvasGraphTemperatureHumidite");
                console.log(graphTarget)

                var barGraph = new Chart(graphTarget, {
                    type: 'line',
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
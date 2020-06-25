<section>
    <?php $input_line = "Récapitulatif du profil"; include "line.php"?>
<!--    Graphique-->
    <div class="chart_box">
        <script>
            window.onload = function() {

                var chart = new CanvasJS.Chart("chartContainer", {
                    theme: "light2", // "light1", "light2", "dark1", "dark2"
                    exportEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: "Heures de conduite"
                    },
                    data: [{
                        type: "pie",
                        startAngle: 25,
                        toolTipContent: "<b>{label}</b>: {y}%",
                        showInLegend: "true",
                        legendText: "{label}",
                        indexLabelFontSize: 16,
                        indexLabel: "{label} - {y}%",
                        dataPoints: [
                            {y: 10, label: "Prévu"},
                            {y: 75, label: "Reste"},
                            {y: 25, label: "Fait"},
                        ]
                    }]
                });
                chart.render();

            }
        </script>
        <div id="chartContainer" style="height: 300px; width: 400px"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </div>
</section>
<section>
    <?php $input_line = "Historique des sorties"; include "line.php"?>
</section>
<?php
?>

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
                            {y: <?php $req_chart_hours['prevu'] ?>, label: "Prévu"},
                            {y: <?php $req_chart_hours['reste'] ?>, label: "Reste"},
                            {y: <?php $req_chart_hours['fait'] ?>, label: "Fait"},
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
<section style="margin: auto">
    <?php $input_line = "Historique des sorties"; include "line.php"?>
    <?php
        /* Sum of time spent driving */
        $reponse = $bdd->query('SELECT
           SUM(extract(HOUR from duration)) AS duration_sum_hour,
           SUM(extract(MINUTE from duration)) AS duration_sum_minute,
           SUM(extract(SECOND from duration)) AS duration_sum_second FROM history');
        $donnee = $reponse->fetch();
        $collect_duration_sum_hour = $donnee['duration_sum_hour'];
        $collect_duration_sum_minute = $donnee['duration_sum_minute'];
        $collect_duration_sum_second = $donnee['duration_sum_second'];
        $duration_sum_text = $collect_duration_sum_hour . ':' . $collect_duration_sum_minute . ':' . $collect_duration_sum_second;
//        echo 'Le temps que vous avez passé en conduite équivaut a : '. $collect_duration_sum_hour . $collect_duration_sum_minute . $collect_duration_sum_second;
        $reponse->closeCursor();
    ?>
    <div>
        <table class="greyGridTable">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Heure début</th>
                    <th>Heure fin</th>
                    <th>Durée</th>
                    <th>Cumul</th>
                    <th>Restant</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <form id="historyHourDrive" method="post" action="index.php">
                        <th><input type="date" form="historyHourDrive" name="date_in" autofocus required/></th>
                        <th><input type="time" form="historyHourDrive" name="start_time_in" required></th>
                        <th><input type="time" form="historyHourDrive" name="end_time_in" required></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><input type="text" form="historyHourDrive" name="report_in" required></th>
                    </form>
                </tr>
            </tfoot>
            <tbody>
                <?php
                    $reponse = $bdd->query('SELECT * FROM history ORDER BY ID');
                    while($donnee = $reponse->fetch()) { ?>
                        <tr>
                            <?php
                                    echo '<td>' . $donnee['date'] . '</td>
                                    <td>' . $donnee['start_time'] . '</td>
                                    <td>' . $donnee['end_time'] . '</td>
                                    <td>' . $donnee['duration'] . '</td>
                                    <td>' . $duration_sum_text . '</td>
                                    <td>' . $donnee['remaining_hour'] .'</td>
                                    <td>' . $donnee['report'] .'</td>';
                            ?>
                        </tr>
                <?php } $reponse->closeCursor(); ?>
            </tbody>
        </table>
        <input type="submit" form="historyHourDrive">
    </div>
</section>
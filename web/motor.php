<?php
function toSecond($entry) {
    try {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=athpermis;charset=utf8', 'root', 'Have an open mind');
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());
    } //BDD Connect
    $d = $bdd->prepare('SELECT extract(SECOND from ?) AS durationSecond, extract(MINUTE from ?) AS durationMinute, extract(HOUR from ?) AS durationHour FROM athpermis.history');
    $h->execute(array($entry, $entry, $entry));
    return $s;
}


if(!empty($_POST['date_in'])) { // INSERT request

    $req = $bdd->prepare('INSERT INTO athpermis.history (date, start_time, end_time, duration, cumulative_hour, remaining_hour, report) VALUES(?, ?, ?, ?, ?, ?, ?)');

    $_POST['end_time_in']

    $durationCalcul = ; //datetime
//    $cumulative_hourCalcul = ; //datetime
//    $remaining_hourCalcul = ; //datetime

    $req->execute(array($_POST['date_in'], $_POST['start_time_in'], $_POST['end_time_in'], $durationCalcul, $cumulative_hourCalcul, $remaining_hourCalcul, $_POST['report_in']));
    echo $durationCalcul;
}
?>
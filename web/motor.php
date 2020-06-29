<?php
if(!empty($_POST['date_in'])) {
    $req = $bdd->prepare('INSERT INTO athpermis.history (date, start_time, end_time, report) VALUES(?, ?, ?, ?)');

    $req->execute(array($_POST['date_in'], $_POST['start_time_in'], $_POST['end_time_in'], $_POST['report_in']));
}
?>
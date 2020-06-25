<?php
//phpinfo();
try {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=athpermis;charset=utf8', 'admin', 'Have an open mind');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
?>

<html lang="fr">
    <head>
        <title>ATH Permis</title>
        <meta charset="UTF-8" />
        <link href="../style/website_background.css" rel="stylesheet">
    </head>

    <body>
        <?php include 'header_insert.php'; ?>
        <main class="main_page">
            <?php include 'welcome_insert.php'; ?>
        </main>
    </body>
</html>

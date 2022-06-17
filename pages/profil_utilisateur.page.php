<?php
/* Démarrage de la session */
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Auto Enchére || Profil utilisateur</title>
</head>

<body>
    <p>Bonjour <?= $_SESSION["utilisateur_prenom"] ?> <?= $_SESSION["utilisateur_nom"] ?></p>
    <p>Votre adresse email est <?= $_SESSION["utilisateur_email"] ?> et votre id <?= $_SESSION["utilisateur_id"] ?> .</p>
</body>

</html>
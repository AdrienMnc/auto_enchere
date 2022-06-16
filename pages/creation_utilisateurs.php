<?php

/* Imports */
require __DIR__ . "../../class/Utilisateurs_class.php";
require_once __DIR__ . "/connexion_bd.page.php";

use Utilisateurs\Utilisateurs;

/* vérification du verbe HTTP POST */

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405);
    die();
}

/* Récupération et filtration des données du formulaire */
$nom = htmlspecialchars($_POST["nom"]);
$prenom = htmlspecialchars($_POST["prenom"]);
$email = htmlspecialchars($_POST["email"], FILTER_SANITIZE_EMAIL);
$mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);


/* Création de l'utilisateur */
$utilisateurs = new Utilisateurs($nom, $prenom, $email, $mot_de_passe);
$resultat = $utilisateurs->sauvegarder();


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>creation_utilisateurs</title>
</head>

<body>
    <?php if ($resultat == 1) { ?>
        <p>Nom = <?= $utilisateurs->nom ?> créé</p>
        <p>Prénom = <?= $utilisateurs->prenom ?> créé</p>
        <p>Email = <?= $utilisateurs->email ?> créé</p>
        <p>Mot de passe = <?= $utilisateurs->mot_de_passe ?> créé</p>
    <?php } else { ?>
        <p>Une erreur s'est produite</p>
    <?php } ?>
</body>

</html>
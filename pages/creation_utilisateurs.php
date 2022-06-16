<?php

/* Imports */
require __DIR__ . "../../class/Utilisateurs_class.php";
require_once __DIR__ . "/connexion_bd.page.php";

use Utilisateurs\Utilisateurs;

/* Vérification du verbe HTTP POST */

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

$query = $dbh->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?);");
$resultat = $query->execute([$nom, $prenom, $email, $mot_de_passe]);

$utilisateurs = new Utilisateurs($nom, $prenom, $email, $mot_de_passe);




?>

<!-- Affichage de la création -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>creation_utilisateurs</title>
</head>

<body>
    <?php if ($resultat == 1) { ?>

        <h1>Felicitation votre compte à bien était crée!</h1>

        <p>Récapitulatif de création:</p>
        <p>Nom => <?= $nom ?> </p>
        <p>Prénom => <?= $prenom ?> </p>
        <p>Email => <?= $email ?> </p>

        <a href="">Redirection vers le site</a>

    <?php } else { ?>
        <p>Une erreur s'est produite</p>
    <?php } ?>




</body>

</html>
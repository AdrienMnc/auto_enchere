<?php

/* Imports */
require_once __DIR__ . "/connexion_bd.page.php";

use Utilisateurs\Utilisateurs;

/* Démarrage de la session */
session_start();

/* Vérification du verbe HTTP POST */
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405);
    die();
}


/* Récupération des données du formulaire */
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$mot_de_passe = $_POST["mot_de_passe"];


/* Requête de récupération de l'utilisateur */
$query = $dbh->prepare("SELECT * FROM utilisateurs WHERE email = ?");
$query->execute([$email]);
$utilisateur = $query->fetch(PDO::FETCH_ASSOC);


/* Vérification de l'existence de l'utilisateur et de son mot de passe */
if ($utilisateur != false && password_verify($mot_de_passe, $utilisateur["mot_de_passe"])) {
    /* Stockage dans la session des infos de l'utilisateur */
    $_SESSION["utilisateur_email"] = $utilisateur["email"];
    $_SESSION["utilisateur_id"] = $utilisateur["id"];
    $_SESSION["utilisateur_nom"] = $utilisateur["nom"];
    $_SESSION["utilisateur_prenom"] = $utilisateur["prenom"];
    $success = true;
} else {
    $success = false;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php if ($success) { ?>
        <p>Connexion réussie</p>
    <?php } else { ?>
        <p>Identifiant ou mot de passe incorrect</p>
    <?php } ?>

</body>

</html>
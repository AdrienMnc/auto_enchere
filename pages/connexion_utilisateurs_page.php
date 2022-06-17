<?php


/* Imports */
require __DIR__ . "../../class/Utilisateurs_class.php";
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
$mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);


/* Requête de récupération de l'utilisateur */
$query = $dbh->prepare("SELECT * FROM users WHERE email = ?");
$query->execute([$email]);
$utilisateurs = $query->fetch(PDO::FETCH_ASSOC);


/* Vérification de l'existence de l'utilisateur et de son mot de passe */
if ($utilisateurs != false && password_verify($mot_de_passe, $utilisateurs["mot_de_passe"])) {
    /* Stockage dans la session des infos de l'utilisateur */
    $_SESSION["utilisateurs_email"] = $utilisateurs["email"];
    $_SESSION["utilisateurs_id"] = $utilisateurs["id"];
    $success = true;
} else {
    $success = false;
}

<?php

/* Imports */
require_once __DIR__ . "../../pages/connexion_bd.page.php";
require_once __DIR__ . "../../class/Vehicules_class.php";

/* Ouverture de session */
session_start();

// Utilisation du NameSpace
use Vehicules\Vehicules;


/* Traitement de la requête si le verbe HTTP est POST */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    http_response_code(405);
    die();
}    

/* Récupération et filtration des données du formulaire */
$marque = htmlspecialchars($_POST["marque"]);
$modele = htmlspecialchars($_POST["modele"]);
$puissance = htmlspecialchars($_POST["puissance"]);
$description = htmlspecialchars($_POST["description"]);
$prix_depart = htmlspecialchars($_POST["prix_depart"]);
$date_depart = htmlspecialchars($_POST["date_depart"]);
$date_limite_de_fin = htmlspecialchars($_POST["date_limite_de_fin"]);

/* Création de l'utilisateur */
$vehicule = new Vehicules($marque, $modele, $puissance, $description, $prix_depart, $date_depart, $date_limite_de_fin);
$result = $vehicule->sauve_vehicule_bdd();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Affichage de la validation de l'enchère-->

    <div class="affichage_validation_enchere">

        <?php if (isset($nouvelle_enchere)) { ?>

            <h3>L'enchère de votre <?= $nouvelle_enchere->marque; ?> <?= $nouvelle_enchere->modele; ?> est bien enregistrée !</h3>

            <br>

            <p> Récapitulatif de votre enchère : </p>

            <br>
        
            <p> Puissance du véhicule : <?= $nouvelle_enchere->puissance; ?> </p>
            <br>
            
            <p> Prix de départ : <?= $nouvelle_enchere->prix_depart; ?> </p>
            <br>

            <p> Description de votre véhicule : <?= $nouvelle_enchere->description; ?> </p>
            <br>

            <p> Votre enchère se terminera le <?= $nouvelle_enchere->date_limite_de_fin; ?> </p>
            <br>

            

        
        <?php } ?>

    </div>
</body>
</html>
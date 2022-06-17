<?php
use Vehicules\Vehicules;

/* Imports */
require_once __DIR__ . "/connexion_bd.page.php";
require_once __DIR__ . "../../class/Vehicules_class.php";

/* Ouverture de session */
session_start();

/* Traitement de la requête si le verbe HTTP est POST */
if ($_SERVER["REQUEST_METHOD"] != "POST") {
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

/* Création du vehicule */

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
<header>
    <?php include __DIR__ . "../../includes/profil.incl.php" ?>
</header>

    <div class="affichage_validation_enchere">

        <?php if (isset($vehicule)) { ?>

            <h3>L'annonce de votre <?= $vehicule->get_marque(); ?> <?= $vehicule->get_modele(); ?> est bien enregistrée !</h3>

            <br>

             <p>Les enchères commenceront le <?= $vehicule->get_date_depart(); ?> et se termineront le <?= $vehicule->get_date_fin(); ?> </p>
            <br>

            <p> Le prix de départ est fixé à <?= $vehicule->get_prix_depart(); ?> </p>
            <br>

            <h4> Description de votre véhicule : </h4>
                  
            <p> Puissance du véhicule : <?= $vehicule->get_puissance(); ?> </p>
        
            <p> Description de votre véhicule : <?= $vehicule->get_description(); ?> </p>

            <br>
           
            <form action="affichage_des_annonces.page.php" method="POST">

            <input type="submit" value="Retour à l'accueil">

            </form>

            

        
        <?php } ?>

        
            
    </div>
</body>
</html>
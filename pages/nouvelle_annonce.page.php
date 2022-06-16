<?php

/* Imports */
require_once __DIR__ . "/class/Vehicules_class.php";

/* Traitement de la requête si le verbe HTTP est POST */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* Récupération des valeurs du body de la requête */
    $marque = $_POST["marque"];
    $modele = $_POST["modele"];
    $description = $_POST["description"];
    $prix_depart = $_POST["prix_depart"];
    $date_depart = $_POST["date_depart"];
    $date_limite_de_fin = $_POST["date_limite_de_fin"];
    
    

    /* Création des instances "nouveau vehicule" */
   
    $nouvelle_enchere = new Vehicules($marque, $modele, $description, $prix_depart, $date_depart, $date_limite_de_fin);
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une nouvelle enchère</title>
</head>
<body>

<!-- Formulaire permettant la création de l'enchère -->

<div id="creation_enchere">
    <form action="" method="POST" id="formulaire_vehicule">

        <h1>Création d'une nouvelle enchère</h1>

        <div>
            <label>Marque du véhicule</label>
            <input type="text"  name="marque">
        </div>

        <div>
            <label>Modèle du véhicule</label>
            <input type="text"  name="modele">
        </div>

        <div>
            <label>Puissance du véhicule</label>
            <input type="number"  name="puissance">
        </div>

        <div>
            <label>Prix de départ de l'enchère</label>
            <input type="number"  name="prix_depart_input">
        </div>

        <div>
            <label>Date de départ de l'enchère</label>
            <input type="date"  name="date_depart">
        </div>

        <div>
            <label>Date d'expiration de l'enchère (la durée ne doit pas dépasser une semaine)</label>
            <input type="date"  name="date_limite_de_fin_input">
        </div>
        
        <div>
            <label>Description du véhicule</label>
            <textarea name="description"></textarea>
        </div>

        <div>
            <input type="submit" value="Envoyer">
        </div>

    </form>


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
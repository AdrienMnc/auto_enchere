<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Enchére || Créer une nouvelle enchère</title>
</head>
<body>

<!-- Formulaire permettant la création de l'enchère -->

<div id="creation_enchere">
    <form action="result_crea_annonce.php" method="POST" id="formulaire_vehicule">

        <h1>Création d'une nouvelle enchère</h1>

        <div>
            <label>Marque du véhicule</label>
            <input type="text" name="marque">
        </div>

        <div>
            <label>Modèle du véhicule</label>
            <input type="text" name="modele">
        </div>

        <div>
            <label>Puissance du véhicule</label>
            <input type="number" name="puissance">
        </div>

        <div>
            <label>Prix de départ de l'enchère</label>
            <input type="number" name="prix_depart">
        </div>

        <div>
            <label>Date de départ de l'enchère</label>
            <input type="date" name="date_depart">
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


    
</body>
</html>
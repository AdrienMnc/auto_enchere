<?php
/* Connection à la base de données*/
require_once __DIR__ . "/connexion_bd.page.php";
require_once __DIR__ . "/../class/Vehicules_class.php";

/* Ouverture de session */
session_start();


/* Préparation de la requête */
$query = $dbh->prepare("SELECT * FROM vehicules");
$result = $query->execute();

$vehicules = $query->fetchAll(PDO::FETCH_ASSOC);



// $vehicule = new Vehicules($vehicules["marque"], $vehicules["modele"], $vehicules["puissance"], $vehicules["description"], $vehicules["prix_depart"],$vehicule["date_depart"],$vehicule["date_limite_de_fin"]);


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Enchére || Toutes les enchéres</title>
</head>

<header><h1>Auto-Enchères</h1></header>

<body>


<nav>
    <a href="/auto_enchere/pages/nouvelle_annonce.page.php">Déposer une annonce</a>
    <a href="/auto_enchere/pages/inscription_page.php">Inscription</a>
    <a href="../index.php">Connexion</a>
</nav>


    <div>
        <h2>Enchères en cours</h2>
        <?php if (isset($vehicules)) {
            foreach ($vehicules as $vehicule) { ?>
                <ul>
                    <li>Marques : <?= $vehicule["marque"]; ?></li>
                    <li>Modéle : <?= $vehicule["modele"]; ?></li>
                    <li>Puissance : <?= $vehicule["puissance"]; ?> CV</li>
                    <li>Date de fin de l'enchère : <?= $vehicule["date_limite_de_fin"]; ?></li>
                    <li>Enchère en cours: <?= $vehicule["prix_depart"]; ?> €</li>
                    <li>Date de la dernière enchère:<?= $vehicule["date_depart"]; ?></li>
                    <li>
                         <form action="../pages/enchere.page.php" method="POST">
                         <input type="submit" value="Enchérir">
                        </form>
                    </li>
                </ul>
        <?php }
        } ?>
    </div>
</body>

</html>
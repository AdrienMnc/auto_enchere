<?php
/* Connection à la base de données*/
require_once __DIR__ . "/connexion_bd.page.php";
require_once __DIR__ . "/../class/Vehicules_class.php";

/* Ouverture de session */
session_start();

/* Utilisation du NameSpace  */
use Vehicules\Vehicules;

/* Préparation de la requête */
$query = $dbh->prepare("SELECT * FROM vehicules");
$result = $query->execute();

$vehicules = $query->fetchAll(PDO::FETCH_ASSOC);

var_dump($vehicules);

// $vehicule = new Vehicules($vehicule["marque"], $vehicule["modele"], $vehicule["puissance"], $vehicule["description"], $vehicule["prix_depart"],$vehicule["date_depart"],$vehicule["date_limite_de_fin"]);
// var_dump($vehicule);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Enchére || Toutes les enchéres</title>
</head>

<body>
    <div>
        <?php if (isset($vehicules)) {
            foreach ($vehicules as $vehicule) { ?>
                <ul>
                    <li>Marques : <?= $vehicule["marque"]; ?></li>
                    <li>Modéle : <?= $vehicule["modele"]; ?></li>
                    <li>Puissance : <?= $vehicule["puissance"]; ?>ch</li>
                </ul>
        <?php }
        } ?>
    </div>
</body>

</html>
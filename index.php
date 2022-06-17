<?php
/* Démarrage de la session */
session_start();

/* Imports */
require_once __DIR__ . "/pages/connexion_bd.page.php";
require_once __DIR__ . "/functions/connexion_page.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <header>
  <?php include __DIR__ . "/includes/profil.incl.php"; ?>
  </header>

  <?php afficher_connexion_page(); ?>

</body>

</html>
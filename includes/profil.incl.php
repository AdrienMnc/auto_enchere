<form id='fermer' name='fermer' method='post' action="/includes/deco.php">
    <input type='submit' id='soumettre' value='Se déconnecter' style='width:120px;height:25px;' />
</form>

<a href="/pages/profil_utilisateur.page.php">Connecté à <?= $_SESSION["utilisateur_prenom"] ?> <?= $_SESSION["utilisateur_nom"] ?></a>
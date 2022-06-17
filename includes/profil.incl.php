<p>Votre adresse email est <?= $_SESSION["utilisateur_email"] ?> et votre id <?= $_SESSION["utilisateur_id"] ?> .</p>
<a href="/pages/profil_utilisateur.page.php">Connecter à <?= $_SESSION["utilisateur_prenom"] ?> <?= $_SESSION["utilisateur_nom"] ?></a>

<form id='fermer' name='fermer' method='post' action="/deco.php">
    <input type='submit' id='soumettre' value='Se déconnecter' style='width:120px;height:25px;' />
</form>
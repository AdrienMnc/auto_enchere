<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <title>inscription_page</title>
</head>

<body>




    <h1>Inscription</h1>

    <form action="creation_utilisateurs.php" method="POST">

        <div>
            <label for="nom_connexion">Nom :</label>
            <input type="text" name="nom" id="nom_inscription" required />
        </div>

        <div>
            <label for="prenom_connexion">Prénom :</label>
            <input type="text" name="prenom" id="prenom_inscription" required />
        </div>

        <div>
            <label for="email_connexion">Email :</label>
            <input type="email" name="email" id="email_inscription" required />
        </div>

        <div>
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required />
        </div>

        <input type="submit" value="Inscription">
    </form>

    <a href="">Retourner à la page de connexion</a>




</body>

</html>
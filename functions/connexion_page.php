<?php function afficher_connexion_page()
{ ?>


    <h1>Connexion</h1>

    <form action="../pages/connexion_utilisateurs_page.php" method="POST">

        <div>
            <label for="email_connexion">Email :</label>
            <input type="email" name="email" id="email_connexion" required />
        </div>

        <div>
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required />
        </div>

        <input type="submit" value="Connexion">
    </form>

    <a href="pages/inscription_page.php">Vous n'avez pas de compte? Inscrivez vous!</a>


<?php } ?>
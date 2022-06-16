<?php

function afficher_connexion_page()
{ ?>


    <h1>Connexion</h1>

    <form action="" method="POST">

        <div>
            <label for="nom_connexion">Nom :</label>
            <input type="text" name="nom" id="nom_connexion" required />
        </div>

        <div>
            <label for="prenom_connexion">Prénom :</label>
            <input type="text" name="prenom" id="prenom_connexion" required />
        </div>

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


<?php } ?>
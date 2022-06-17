<?php

namespace Utilisateurs;

use PDO;

/* Imports */

require_once __DIR__ . "../../pages/connexion_bd.page.php";



// Création de la classe Utilisateur

class Utilisateurs
{
    public string $id;
    protected string $nom;
    protected string $prenom;
    protected string $email;
    protected string $mot_de_passe;

    // Fonction constructrice Utilisateur

    public function __construct(string $nom, string $prenom, string $email, string $mot_de_passe)
    {
        $this->nom = ucfirst($nom);
        $this->prenom = ucfirst($prenom);
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
    }

    // Getters

    public function get_nom(): string
    {
        return $this->nom;
    }

    public function get_prenom(): string
    {
        return $this->prenom;
    }

    public function get_email(): string
    {
        return $this->email;
    }

    public function get_mot_de_passe(): string
    {
        return $this->mot_de_passe;
    }


    /* Sauvegarde de l'objet utilisateur dans la base de données */
    // public function sauvegarder(): int
    // {
    //     global $dbh;
    //     $query = $dbh->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?);");
    //     return $query->execute([$this->nom, $this->prenom, $this->email, $this->mot_de_passe]);
    // }

    /* Méthode statique de récupération d'un utilisateur dans la base de donnée
     *  Cette méthode retourne une instance la classe User */
    public static function get_utilisateurs(string $email)
    {
        global $dbh;
        $query = $dbh->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $query->execute([$email]);
        $donnees_utilisateurs = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($donnees_utilisateurs != false) {
            $utilisateurs = new Utilisateurs($donnees_utilisateurs["nom"], $donnees_utilisateurs["prenom"], $donnees_utilisateurs["email"], $donnees_utilisateurs["mot_de_passe"]);
            $utilisateurs->id = $donnees_utilisateurs["id"];
            return $utilisateurs;
        } else {
            return null;
        }
    }
}

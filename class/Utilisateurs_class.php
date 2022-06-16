<?php

namespace Utilisateurs;


/* Imports */

require_once __DIR__ . "../../pages/connexion_bd.page.php";



// Création de la classe Utilisateur

class Utilisateurs
{

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
        $this->mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    }

    // Getters

    public function get_show_nom(): string
    {
        return $this->nom;
    }

    public function get_show_prenom(): string
    {
        return $this->prenom;
    }

    public function get_show_email(): string
    {
        return $this->email;
    }


    /* Sauvegarde de l'objet utilisateur dans la base de données */
    public function sauvegarder(): int
    {
        global $dbh;
        $query = $dbh->prepare("INSERT INTO users (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?);");
        return $query->execute([$this->nom, $this->prenom, $this->email, $this->mot_de_passe]);
    }

    /* Méthode statique de récupération d'un utilisateur dans la base de donnée
     *  Cette méthode retourne une instance la classe User */
    public static function get_utilisateurs(string $nom, string $prenom, string $email, string $mot_de_passe): Utilisateurs | null
    {
        global $dbh;
        $query = $dbh->prepare("SELECT * FROM utilisateurs WHERE nom = ? prenom = ? email = ? mot_de_passe = ?;");
        $query->execute([$nom, $prenom, $email, $mot_de_passe]);
        $donnees_utilisateurs = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($donnees_utilisateurs != false) {
            $user = new Utilisateurs($donnees_utilisateurs["nom"], $donnees_utilisateurs["prenom"], $donnees_utilisateurs["email"], $donnees_utilisateurs["mot_de_passe"]);
            $user->id = $donnees_utilisateurs["id"];
            return $user;
        } else {
            return null;
        }
    }
}

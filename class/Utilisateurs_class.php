<?php

namespace Utilisateurs;

class Utilisateurs
{

    protected string $nom;
    protected string $prenom;
    protected string $email;
    protected string $mot_de_passe;



    public function __construct(string $nom, string $prenom, string $email, string $mot_de_passe)
    {
        $this->nom = ucfirst($nom);
        $this->prenom = ucfirst($prenom);
        $this->email = $email;
        $this->mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    }

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
}

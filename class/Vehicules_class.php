<?php

namespace Vehicules;

require_once __DIR__ . "/../pages/connexion_bd.page.php";

// Création de la classe Vehicule
class Vehicules
{
    public string $id;
    public string $marque;
    public string $modele;
    public int $puissance;
    public string $description;
    public float $prix_depart;
    public string $date_depart;
    public string $date_limite_de_fin;


    // Fonction constructrice Vehicule

    public function __construct(
        string $marque,
        string $modele,
        int $puissance,
        string $description,
        float $prix_depart,
        string $date_depart,
        string $date_limite_de_fin
    ) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->puissance = $puissance;
        $this->description = $description;
        $this->prix_depart = $prix_depart;
        $this->date_depart = $date_depart;
        $this->date_limite_de_fin = $date_limite_de_fin;
    }

    /* Sauvegarde de l'objet vehicule dans la base de données */
    public function sauve_vehicule_bdd(): int
    {
        global $dbh;
        $query = $dbh->prepare("INSERT INTO vehicules (marque, modele, puissance, description, prix_depart, date_depart, date_limite_de_fin) VALUES (?, ?, ?, ?, ?, ?, ?);");
        return $query->execute([$this->marque, $this->modele, $this->puissance, $this->description, $this->prix_depart, $this->date_depart, $this->date_limite_de_fin]);
    }

    /* Affichage de l'objet vehicule version mini */
    // public function affiche_mini_vehicule(): void
    // {
    //     global $dbh;
    //     $query = $dbh->prepare("SELECT * FROM vehicules");
    //     $result = $query->execute();

    //     $vehicules = $query->fetchAll(PDO::FETCH_ASSOC);

    //     var_dump($vehicules);
    // }


    // public function show_marque(): string
    // {
    //     return $this->marque;
    // }

    // public function show_modele(): string
    // {
    //     return $this->modele;
    // }

    // public function show_puissance(): int
    // {
    //     return $this->puissance . "cv";
    // }

    // public function show_description(): string
    // {
    //     return $this->description;
    // }

    // public function show_prix_depart(): float
    // {
    //     return number_format($this->prix_depart, 2) . "€";
    // }

    // // Getter permettant que la date de départ de l'enchère ne soit pas antérieure à la date du jour

    // public function show_date_depart(): string
    // {
    //     if (Date("d - m - y") <= $this->date_depart) {
    //         return $this->date_depart;
    //     } else {
    //         return "Date invalide";
    //     }
    // }

    // // Getter permettant que l'enchère ait une durée maximale d'une semaine 


    // public function show_date_fin(): string
    // {
    //     // if (strtotime($date_fin) <= strtotime($this->date_depart . " +1 week")) {
    //     return $this->date_limite_de_fin;
    // }
    // }
}

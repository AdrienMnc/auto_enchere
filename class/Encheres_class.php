<?php

// Création de la classe Vehicule

class Encheres
{

    protected float $prix_actuel;
    protected string $date_enchere;
  


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
        $this->date_depart = date('d-m-Y à H:i:s', strtotime($date_depart));
        $this->date_limite_de_fin = date('d-m-Y à H:i:s', strtotime($date_limite_de_fin));
    }

    /* Sauvegarde de l'objet vehicule dans la base de données */
    public function sauve_vehicule_bdd(): int
    {
        global $dbh;
        $query = $dbh->prepare("INSERT INTO vehicules (marque, modele, puissance, description, prix_depart, date_depart, date_limite_de_fin) VALUES (?, ?, ?, ?, ?, ?, ?);");
        return $query->execute([$this->marque, $this->modele, $this->puissance, $this->description, $this->prix_depart, $this->date_depart, $this->date_limite_de_fin]);
    }

}
<?php

// Création de la classe Enchere

class Encheres
{

    protected float $prix_actuel;
    protected string $date_enchere;

  


    // Fonction constructrice Enchere

    public function __construct(
        float $prix_actuel,
        string $date_enchere,
       
    ) {
        $this->prix_actuel = $prix_actuel;
        $this->date_enchere = date('d-m-Y à H:i:s', strtotime($date_enchere));
   
    }

    /* Sauvegarde de l'objet vehicule dans la base de données */
    public function maj_enchere_bdd(): int
    {
        global $dbh;
        $query = $dbh->prepare("INSERT INTO encheres (prix_actuel, date_enchere) VALUES (?, ?);");
        return $query->execute([$this->prix_actuel, $this->date_enchere]);
    }

    public function get_prix_actuel(): string
    {
        return number_format($this->prix_actuel, 2) . "€";
    }

     public function get_date_enchere(): string
    {
        return $this->date_enchere;
    }


}
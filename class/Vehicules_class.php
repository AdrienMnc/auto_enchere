<?php

namespace Vehicules;

use DateTime;

class Vehicules
{

    protected string $marque;
    protected string $modele;
    protected int $puissance;
    protected string $description;
    protected float $prix_depart;
    protected string $date_depart;
    protected string $date_limite_de_fin;



    public function __construct(string $marque, string $modele, int $puissance, string $description, float $prix_depart)
    {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->puissance = $puissance;
        $this->description = $description;
        $this->prix_depart = $prix_depart;
    }

    public function get_show_marque(): string
    {
        return $this->marque;
    }

    public function get_show_modele(): string
    {
        return $this->modele;
    }

    public function get_show_puissance(): int
    {
        return $this->puissance . "CV";
    }

    public function get_show_description(): string
    {
        return $this->description;
    }

    public function get_show_prix_depart(): float
    {
        return number_format($this->prix_depart, 2) . "€";
    }

    public function get_show_date_depart(): string
    {
        if (Date("d - m - y") <= $this->date_depart) {
            return $this->date_depart;
        } else {
            return "Date invalide";
        }
    }

    public function set_date_fin(string $date_fin): void
    {
        if (strtotime($date_fin) <= strtotime($this->date_depart . " +1 week")) {
            $this->date_limite_de_fin = $date_fin;
        }
    }
}

<?php

class Voitures {
    private $marque;
    private $modele;
    private $annee;
    private $prix;

    public function __construct($marque, $modele, $annee, $prix = null) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->prix = $prix;
    }

  
    public function getDetails() {
        return "Voiture: {$this->marque} {$this->modele}, Année: {$this->annee}, Prix: {$this->prix}";
    }

    // Getters
    public function getMarque() {
        return $this->marque;
    }

    public function getModele() {
        return $this->modele;
    }

    public function getAnnee() {
        return $this->annee;
    }
    public function getPrix() {
        return $this->prix;
    }

    // Setters

    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function setModele($modele) {
        $this->modele = $modele;
    }

    public function setAnnee($annee) {
        $this->annee = $annee;
    }
    public function setPrix($prix) {
        $this->prix = $prix;
    }
    
}

// function qui permet à l'utlisateur de creer une voiture



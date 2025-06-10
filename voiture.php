<?php

class voiture {
    private $marque;
    private $modele;
    private $annee;

    public function __construct($marque, $modele, $annee) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
    }

    public function getMarque() {
        return $this->marque;
    }

    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function getModele() {
        return $this->modele;
    }

    public function setModele($modele) {
        $this->modele = $modele;
    }

    public function getAnnee() {
        return $this->annee;
    }

    public function setAnnee($annee) {
        $this->annee = $annee;
    }

    public function getDetails() {
        return "Marque: {$this->marque}, Modèle: {$this->modele}, Année: {$this->annee}";
    }

    public function destroy($voiture) {
        session_destroy($voiture);

    }


}
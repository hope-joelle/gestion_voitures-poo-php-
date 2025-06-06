<?php
// dans la classe voitures j'aimerais avoir les attributs suivants : marque, modele, annee, prix dans le but 
//de pouvoir creer une voitures, et comme ces attributs sont déclaré en privéé pour les lier et les modifié et lire
// j'aurai besion de get et set
// pour chaque attribut, et une fonction getDetails qui retourne les details de la voiture// le costructeur me permet de creer une voiture
//et pour finir je me veut mettre le crud dans ce meme fichier pour donner quelque fonctionnnalite de création,
// modification, suppression et lecture des voitures .

// I / / Classe Voiture

class Voitures {
    // Unique identifier for the car
    private $id;
    private $marque;
    private $modele;
    private $annee;
    private $prix;

// Constructeur de la classe Voitures il crait // une voiture avec les attributs marque, modele, annee et prix
    public function __construct($id, $marque, $modele, $annee, $prix = null) {
        $this->id = $id;
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->prix = $prix;
    }

  // Fonction qui retourne les détails de la voiture
    public function getDetails() {
        return "Voiture:{$this->id} {$this->marque} {$this->modele}, Année: {$this->annee}, Prix: {$this->prix}";
    }

    // Getters
    public function getId() {
        return $this->id;
    }
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
    public function setId($id) {
        $this->id = $id;
    }

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
    
    // II / / CRUD pour les voitures
    // afin de ne pas creer une nouvelle objet je vais la fonction statique pour pouvoir l'utiliser sans instancier la classe

    // Exemple de méthode statique pour ajouter une voiture
    private static function initSession() {
        if (!isset($_SESSION['voitures'])) {
            $_SESSION['voitures'] = [];
        } return ;
    }

    // crée une voiture à la session
    public static function createVoiture(Voitures $voiture) {
        self::initSession();
        $_SESSION['voitures'][] = $voiture;
    }

    // Récupérer toutes les voitures
    public static function getAll() {
        self::initSession();
        return $_SESSION['voitures'];
    }

    //  update
    public static function updateVoiture( $id, Voitures $voiture) {
        self::initSession();
        if (isset($_SESSION['voitures'][$id])) {
            $_SESSION['voitures'][$id] = $voiture;
        }
    }

    // delete
    public static function deleteVoiture( $id) {
        self::initSession();
        if (isset($_SESSION['voitures'][$id])) {
            unset($_SESSION['voitures'][$id]);
            //m
            $_SESSION['voitures'] = array_values($_SESSION['voitures']);
        }
    }

   
    }




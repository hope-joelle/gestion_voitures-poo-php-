<?php
require_once 'voiture.php';
require_once 'user.php';

session_start();
echo "Bienvenue " .$_SESSION['user']->getEmail();


// Réinitialisation de la liste des voitures
if (isset($_GET['clear'])) {
    unset($_SESSION['voitures']); // Supprime uniquement la liste des voitures
    header("Location: listVoiture.php"); // Redirection pour éviter de rester sur l'URL avec le paramètre clear
    exit;
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Récupération des données du formulaire
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    // Création d'une nouvelle voiture
    $voiture = new Voiture($marque, $modele, $annee);

    // Ajout de la voiture à la session
    $_SESSION['voitures'][] = $voiture;
    var_dump($_SESSION['voitures']);
    // Redirection pour éviter la soumission multiple du formulaire
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
  
}


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Voitures</title>
</head>
<body>
    <h1>Créer une voiture</h1>
    <form method="POST">
        <label for="marque">Marque :</label>
        <input type="text" id="marque" name="marque" required><br>

        <label for="modele">Modèle :</label>
        <input type="text" id="modele" name="modele" required><br>

        <label for="annee">Année :</label>
        <input type="number" id="annee" name="annee" required><br>

        <input type="submit"></input>
    </form>

    <h1>Liste des voitures</h1>
    <ul>
        <?php 
        
        if (empty($_SESSION['voitures'])) {
            echo "<li>Aucune voiture enregistrée.</li>";
        }else{
            foreach ($_SESSION['voitures'] as $voiture): ?>
                <li><?php echo $voiture->getDetails(); ?></li>
                <li> 
                     <form method="GET">
                         <button type="submit" name="clear">supprimer</button>
                      </form>
                </li>
            <?php endforeach; 
            
        }
        
        ?>

        
    </ul>

</body>

<?php

session_start();
require_once 'Voiture.php'; 
require_once 'Users.php';


if (!isset($_SESSION['voiture'])) {
    $_SESSION['voiture'] = [];
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $prix = $_POST['prix']?? null;
   

    $voiture = new Voiture($marque, $modele, $annee, $prix);
    $_SESSION['voiture'][] = $voiture;

    $user = new user($mail,$password);
    if ($user->connexionEmail($_POST['email'], $_POST['password'])) {
        // je stocke les information des user dans la session pour que les données ne disparaissent pas
        $_SESSION['user'] = $user->getEmail(); // je stocke l'email de l'utilisateur
        $_SESSION['password'] = $user->getPassword(); // je stocke le mot de passe de l'utilisateur
        echo "Connexion réussie.";
    } else {
        echo "Échec de la connexion.";
    }
}
// formulaire de la voiture
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>remplissez le formulaire pour creer votre voiture</title>
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

        <label for="prix">Prix :</label>
        <input type="number" id="prix" name="prix" required><br>

        <button type="submit">Créer</button>
      
    
    
    
    
    
    </form>
</body>
</html>
<?php

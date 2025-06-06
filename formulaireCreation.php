<?php
//
session_start();
$_SESSION['Voiture'] = [];
require_once 'Voitures.php'; 



// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $prix = $_POST['prix'];

    $voiture = new Voitures( $id ,$marque, $modele, $annee, $prix);
    $_SESSION['Voiture'] = $voiture;

}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>remplissez le formulaire pour creer votre voiture</title>
</head>
<body>
    <h1>Créer une voiture</h1>
    <form method="POST">
        <label for="id">ID :</label>
        <input type="text" id="id" name="id" required><br>
        <label for="marque">Marque :</label>
        <input type="text" id="marque" name="marque" required><br>

        <label for="modele">Modèle :</label>
        <input type="text" id="modele" name="modele" required><br>

        <label for="annee">Année :</label>
        <input type="number" id="annee" name="annee" required><br>

        <label for="prix">Prix :</label>
        <input type="number" id="prix" name="prix" required><br>

        <input type="submit"></input>
    
    </form>
     <br>
    <h2>Liste des voitures créées :</h2>
    <ul>
        <?php
        if (!empty($_SESSION['Voiture'])) {
            $voiture = $_SESSION['Voiture'];
            echo "<li>" . $voiture->getDetails() . "</li>";
        } else {
            echo "<li>Aucune oiture créée.</li>";
        }
        ?>
</body>
<?php

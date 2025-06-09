<?php
// dans cete page je veux créer un formulaire qui ferait en sorte que l'utilisateur vienne s'identifier avant d'accéder à la page où il va
// je vais ouvrir une session pour stocker les informations de l'utilisateur


session_start();
require_once('user.php');

// Création d'un utilisateur fictif pour la démonstration
$user = new User('h@gmail', '1234');

// Vérifie si le formulaire a été soumis
if (isset($_POST['email']) && isset($_POST['pswd'])) {
    $email = $_POST['email'];
    $password = $_POST['pswd'];

    echo $email . " du formulaire<br>";

    // Utilisation de la méthode getMail() et de l'accès à la propriété ou une méthode pour le mot de passe
    if ($user->getEmail() == $email && $user->getPassword() == $password) {
        // Connexion réussie
        $_SESSION['email'] = $user->getEmail();
        echo "Connexion réussie !";
    } else {
        // Échec de connexion
        echo "Identifiants incorrects";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>veuillez inserez vos identifiant</title>
    

</head>
<body>
<div class="form-container">
    <div class="form-wrapper">
        <div class="form-header">
            <h2>Connexion</h2>
        </div>
        <form method="post" action="index.php" style="display: flex; flex-direction: column; gap: 15px;">
            <div class="form-group">
                <label for="exampleInputEmail1">Adresse email:</label>
                <input type="text" class="form-control" placeholder="Entrez votre email" name="email" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe:</label>
                <input type="password" class="form-control" placeholder="Mot de passe" name="pswd" required>
            </div><br>
            <button type="submit" class="btn btn-primary w-100">Valider</button>
            <br><br>
            <a href="./vue/admin/form/form_admin.php">Inscription</a>
        </form>
    </div>
</div>
</body>
</html>
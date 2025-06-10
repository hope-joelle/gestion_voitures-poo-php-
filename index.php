<?php
//import necessary files
require_once 'user.php';
session_start();

// Check if the user session is already set
if (!isset($_SESSION['user'])) {
    // Initialize user session if not set
    header('Location: form_createUser.php');
}else {
    header('Location: listVoiture.php');
}


//traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($_SESSION['user']->getEmail()=== $email && $_SESSION['user']->getPassword() === $password) {
        // User credentials match, redirect to the index page
        header('Location: listVoiture.php');
        exit();
    } else {
        // Handle error: email or password is incorrect
        echo "Invalid email or password";
    }

}

?>

<form action="" method="post" class="form-horizontal">
    <h2>Login</h2>
    <div class="form-group">
        <label for="email">email:</label>
        <input type="text" id="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
    <input type="submit" class="btn btn-primary"></inpput>
    <br>
    <a href="form_createUser.php">Register</a>
</form>
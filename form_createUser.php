
<?php
//import necessary files
require_once 'user.php';
// Start the session
session_start();
if (isset($_SESSION['user'])) {
    // Initialize user session if not set
    header('Location: index.php');
}


//traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create a new User object
    $_SESSION['user'] = new User($password, $email);

    if( $_SESSION['user']->getEmail() != "null") {
        // Save user data to session
        header('Location: listVoiture.php');
        exit();
        // Optionally, you can save to a database here
    } 
    //redirect to the next page
    //header('Location: index.php');

}

?>

<form action="" method="post" class="form-horizontal">
    <h2>User Registration</h2>
   
    
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
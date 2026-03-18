namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // On récupére le infos du formulaire
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $mdp = $_POST['mdp'];

    if (!$email) {
        die("Email invalide");
    }
    
    if (empty($mdp)) {
        die("Mot de passe non saisi");
    }
    
    if(password_verify($mdp, $sql['ADH_PASSWORD'])) {

    }
    else{

    }
}
?>
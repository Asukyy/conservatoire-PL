<?php
session_start();
include("modele/monPdo.php");
$unPdo = MonPdo::getInstance();

if (isset($_POST['pseudo']) && isset($_POST['motdepasse'])) {
    $pseudo = $_POST['pseudo'];
    $motdepasse = $_POST['motdepasse'];

    // Recherche de l'utilisateur dans la base de données
    $stmt = $unPdo->prepare("SELECT * FROM admins WHERE pseudo=:pseudo AND password=:motdepasse");
    $stmt->execute(array('pseudo' => $pseudo, 'motdepasse' => $motdepasse));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Si l'utilisateur est trouvé, stockez ses informations dans la session et redirigez-le vers la page d'accueil
        $_SESSION['user'] = $user;
        header('Location: vues/accueil.php');
        exit();
    } else {
        // Si l'utilisateur n'est pas trouvé, afficher un message d'erreur
        $message = "Nom d'utilisateur ou mot de passe incorrect";
    }
}
?>

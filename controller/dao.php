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
        header('Location: vues/eleves.php');
        exit();
    } else {
        // Si l'utilisateur n'est pas trouvé, afficher un message d'erreur
        $message = "Nom d'utilisateur ou mot de passe incorrect";
    }
}

if (isset($_POST["loginsign"])) {
    $pseudo = $_POST["pseudosign"];
    $email = $_POST["emailsign"];
    $motDePasse = $_POST["motdepassesign"];
    $confirmeMotDePasse = $_POST["confirmpasswordsign"];

    // Vérifier si l'utilisateur existe déjà
    $pdo = MonPdo::getInstance();
    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $stmt->execute([$email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
      $message = "Cet email est déjà utilisé. Veuillez choisir un autre email.";
    } else {
      // Vérifier si les mots de passe correspondent
      if ($motDePasse != $confirmeMotDePasse) {
        $message = "Les mots de passe ne correspondent pas. Veuillez les saisir à nouveau.";
      } else {
        // Hash du mot de passe en sha256
        $hashMotDePasse = hash('sha256', $motDePasse);

        // Insérer les données dans la base de données
        $stmt = $pdo->prepare("INSERT INTO utilisateur (pseudo, email, mot_de_passe) VALUES (?, ?, ?)");
        $stmt->execute([$pseudo, $email, $hashMotDePasse]);

        $message = "Vous êtes inscrit avec succès.";
      }
    }
}
?>

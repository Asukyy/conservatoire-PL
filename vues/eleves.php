<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Conservatoire_PL</title>
</head>
<body>
<?php include("../header/header.php");

?>

<div class="container">
        <div class="adduser">
            <div class="userflex">
            <h1>Ajouter un élève</h1>
            <!-- form id, nom, prenom, mail, tel, adresse-->
            <form action="eleves.php" method="POST" class="form-input-eleves">
                <!-- id -->
                <input type="number" name="id" placeholder="Id">
                <input type="text" name="nom" placeholder="Nom">
                <input type="text" name="prenom" placeholder="Prénom">
                <input type="email" name="mail" placeholder="Mail">
                <input type="text" name="tel" placeholder="Téléphone">
                <input type="text" name="adresse" placeholder="Adresse">
                <input type="submit" name="adduser" value="Ajouter">
            </form>
            </div>
        </div>
    </div>
<?php

    if (isset($_POST['adduser'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $tel = $_POST['tel'];
        $adresse = $_POST['adresse'];
        $unPdo = new PDO('mysql:host=localhost;dbname=conservatoireefrei', 'root', '');
        $stmt = $unPdo->prepare("INSERT INTO personne (id, nom, prenom, mail, tel, adresse) VALUES (:id, :nom, :prenom, :mail, :tel, :adresse)");
        $stmt->execute(array('id' => $id, 'nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'tel' => $tel, 'adresse' => $adresse));
        header('Location: eleves.php');
        exit();
    }

?>


    <?php
     include("listeP.php"); ?>
</body>
</html>

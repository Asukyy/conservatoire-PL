<?php
include("vues/footer.php");
include("modeles/produit_class.php");

$action = $_GET['action'];
switch($action){
    case "liste":
        $lesProduits = Produit::afficherTousLesProduits();
        include("../vues/listeP.php");
        break;
}

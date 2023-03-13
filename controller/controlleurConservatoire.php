<?php

include("../modele/utilisateur.php");
$action = $_REQUEST['action'];

switch($action)
{
    case 'afficherUtilisateurs':
    {
        $lesUtilisateurs = Utilisateur::afficherUtilisateurs();
        include("../vues/afficherUtilisateurs.php");
        break;
    }
}

?>
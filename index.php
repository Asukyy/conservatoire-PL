<?php

if(empty($_GET["uc"]))
{
    $uc = 'accueil';
}
else
{
    $uc = $_GET["uc"];
}

switch($uc)
{
    case 'accueil':
    {
        include("vues/accueil.php");
        break;
    }
    case 'conservatoire':
    {
        include("controller/controlleurConservatoire.php");
        break;
    }
}
?>
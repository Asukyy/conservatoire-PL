<?php

if(empty($_GET["uc"]))
{
    $uc = 'accueil';
}
else
{
    $uc = $_GET["uc"];
}

include("vues/header.php");

switch($uc)
{
    case 'accueil':
    {
        include("vues/accueil.php");
        break;
    }
    case 'conservatoire':
    {
        include("controller/controleurConservatoire.php");
        break;
    }
}

include("vues/footer.php");

?>
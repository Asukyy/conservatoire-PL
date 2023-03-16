<?php
if(isset($_GET["uc"]))
{
    $uc = $_GET["uc"];
}

else{
    $uc = 'connexion';
}

switch($uc)
{
    case 'connexion':
        include("vues/connexion.php");
        break;
    case 'conservatoire':
        include("controller/controleurConservatoire.php");
        break;
}

include("vues/footer.php");
?>

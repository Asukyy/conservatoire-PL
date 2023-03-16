<?php
include("footer.php");
include("../modele/monPdo.php");

$unPdo = MonPdo::getInstance(); // Crée une instance de la classe MonPdo

$result = $unPdo->query("SELECT * FROM personne");
$result->setFetchMode(PDO::FETCH_ASSOC);

foreach($result as $produit)
{
    echo "<div class='produit'>";
    echo "<h3>" . $produit['NOM'] . "</h3>";
    echo "<p>" . $produit['MAIL'] . "</p>";
    echo "<p>" . $produit['TEL'] . "</p>";
    echo "<p>" . $produit['ADRESSE'] . "</p>";
    echo "</div>";
}
?>

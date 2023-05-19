<?php
include("footer.php");
include("modele/monPdo.php");

$unPdo = MonPdo::getInstance(); // Crée une instance de la classe MonPdo

$result = $unPdo->query("SELECT * FROM personne");
$result->setFetchMode(PDO::FETCH_ASSOC);
$id = 0;

echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<th>Nom</th>";
echo "<th>Prénom</th>";
echo "<th>Mail</th>";
echo "<th>Téléphone</th>";
echo "<th>Adresse</th>";
echo "<th>Id</th>";
echo "<th>Modifier</th>";
echo "<th>Supprimer</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach($result as $produit)
{
    echo "<tr>";
    echo "<td>" . $produit['NOM'] . "</td>";
    echo "<td>" . $produit['PRENOM'] . "</td>";
    echo "<td>" . $produit['MAIL'] . "</td>";
    echo "<td>" . $produit['TEL'] . "</td>";
    echo "<td>" . $produit['ADRESSE'] . "</td>";
    echo "<td>" . $produit['ID'] . "</td>";
    echo "<td><a href='eleves.php?modif=" . $produit['ID'] . "'>Modifier</a></td>";
    echo '<td><a href="#" onclick="supprimerEleve(' . $produit['ID'] . ')">Supprimer</a></td>';
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

if(isset($_GET['supp'])){
    $supp = $_GET['supp'];
    $unPdo->query("DELETE FROM personne WHERE id = $supp");
    $connect = $unPdo->query("SELECT * FROM personne");
}

if(isset($_GET['modif'])){
    $modif = $_GET['modif'];
    $connect = $unPdo->query("SELECT * FROM personne WHERE id = $modif");
    $result = $connect->fetch(PDO::FETCH_ASSOC);
    echo "<form action='eleves.php' method='post' class='formmodif'>";
    echo "<input type='text' name='nom' value='" . $result['NOM'] . "'><br>";
    echo "<input type='text' name='prenom' value='" . $result['PRENOM'] . "'><br>";
    echo "<input type='text' name='mail' value='" . $result['MAIL'] . "'><br>";
    echo "<input type='text' name='tel' value='" . $result['TEL'] . "'><br>";
    echo "<input type='text' name='adresse' value='" . $result['ADRESSE'] . "'><br>";
    echo "<input type='hidden' name='id' value='" . $result['ID'] . "'><br>";
    echo "<input type='submit' name='modif' value='Modifier'>";
    echo "</form>";
}

if(isset($_POST['modif'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];
    $adresse = $_POST['adresse'];
    $id = $_POST['id'];
    $unPdo->query("UPDATE personne SET nom = '$nom', prenom = '$prenom', mail = '$mail', tel = '$tel', adresse = '$adresse' WHERE id = $id");
    $connect = $unPdo->query("SELECT * FROM personne");
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function supprimerEleve(id) {
    if (confirm("Voulez-vous vraiment supprimer cet élève ?")) {
        $.ajax({
            url: "eleves.php",
            type: "GET",
            data: {
                "supp": id
            },
            success: function(result) {
                alert("L'élève a été supprimé.");
                location.reload();
            },
            error: function() {
                alert("Une erreur est survenue lors de la suppression de l'élève.");
            }
        });
    }
}

function modifierEleve(id) {
    $.ajax({
        url: "eleves.php",
        type: "GET",
        data: {
            "modif": id
        },
        success: function(result) {
            alert("L'élève a été modifié.");
            location.reload();
        },
        error: function() {
            alert("Une erreur est survenue lors de la modification de l'élève.");
        }
    });
}
</script>

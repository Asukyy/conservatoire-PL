<?php
    $result = $pdo->query("SELECT * FROM personne");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    while($row = $result->fetch()) {
        echo $row['email'];
    }
?>
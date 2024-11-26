<?php
include('bdd.php');

// Récupérer les données des cavaliers
$sql = "SELECT * FROM cavalier";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Cavaliers</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <h1>Liste des Cavaliers</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Numéro de Licence</th>
            <th>Photo</th>
            <th>Date de Naissance</th>
            <th>Assurance</th>
            <th>Nom Responsable</th>
            <th>Prénom Responsable</th>
            <th>Rue Responsable</th>
            <th>Code Postal Responsable</th>
            <th>Téléphone Responsable</th>
            <th>Email Responsable</th>
            <th>Mot de Passe</th>
            <th>ID Galop</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Parcourir les résultats et afficher les données
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["idcavalier"] . "</td>";
                echo "<td>" . $row["nomcav"] . "</td>";
                echo "<td>" . $row["prenomcav"] . "</td>";
                echo "<td>" . $row["numlicence"] . "</td>";
                echo "<td>" . ($row["photo"] ? "<img src='uploads/" . $row["photo"] . "' alt='Photo' class='cavalier-image'>" : "Aucune photo") . "</td>";
                echo "<td>" . $row["datena"] . "</td>";
                echo "<td>" . $row["assurance"] . "</td>";
                echo "<td>" . $row["nomres"] . "</td>";
                echo "<td>" . $row["prenomres"] . "</td>";
                echo "<td>" . $row["rueres"] . "</td>";
                echo "<td>" . $row["cpres"] . "</td>";
                echo "<td>" . $row["telres"] . "</td>";
                echo "<td>" . $row["mailres"] . "</td>";
                echo "<td>" . $row["mdp"] . "</td>";
                echo "<td>" . $row["idgalop"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='15'>Aucun cavalier trouvé</td></tr>";
        }
        ?>
    </table>
</body>
</html>

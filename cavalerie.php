<?php 
include 'bdd.inc.php';

// Récupération des données de la table cavalerie
$stmt = $pdo->query('SELECT idcavalerie, numsire, nomcheval, datenacheval, garot, idrace, idrobe FROM cavalerie');
$cavalerie = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table des chevaux</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers le CSS -->
    <style>
        /* Styles pour les liens Modifier et Supprimer */
        .action-link {
            color: black; /* Met le texte en noir */
            text-decoration: none; /* Supprime le soulignement */
            padding: 5px 10px; /* Ajoute du padding pour un meilleur look */
            border: 1px solid transparent; /* Bordure transparente pour éviter le saut */
            border-radius: 4px; /* Coins arrondis */
        }
        
        .action-link:hover {
            border-color: #fcca46; /* Couleur de bordure au survol */
            background-color: #eb5c1e; /* Couleur de fond au survol */
            color: white; /* Couleur du texte au survol */
        }
    </style>
</head>
<body>
    <h1>Liste des chevaux</h1>

    <table id="cavalerieTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Numéro</th>
                <th>Nom</th>
                <th>Date de naissance</th>
                <th>Garot</th>
                <th>Idrace</th>
                <th>Idrobe</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cavalerie as $caval) : ?>
                <tr>
                    <td><?= htmlspecialchars($caval['idcavalerie']) ?></td>
                    <td><?= htmlspecialchars($caval['numsire']) ?></td>
                    <td><?= htmlspecialchars($caval['nomcheval']) ?></td>
                    <td><?= htmlspecialchars($caval['datenacheval']) ?></td>
                    <td><?= htmlspecialchars($caval['garot']) ?></td>
                    <td><?= htmlspecialchars($caval['idrace']) ?></td>
                    <td><?= htmlspecialchars($caval['idrobe']) ?></td>
                    <td><a class="action-link" href="modifier_cavalerie.php?id=<?= $caval['idcavalerie'] ?>">Modifier</a></td>
                    <td><a class="action-link" href="cavalerie_traitement.php?action=supprimer&id=<?= $caval['idcavalerie'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cheval ?');">Supprimer</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        // Activation de DataTables sur la table
        $(document).ready(function() {
            $('#cavalerieTable').DataTable();
        });
    </script>
</body>
</html>

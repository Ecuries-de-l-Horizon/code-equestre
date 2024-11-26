<?php
include('bdd.php');

// Nombre de résultats par page
$results_per_page = 15;

// Récupérer les données de la cavalerie
$sql = "SELECT * FROM cavalerie";
$where_clause = "";

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $where_clause .= " WHERE nomcheval LIKE '%$search%' OR numsire LIKE '%$search%' OR idrace LIKE '%$search%' OR idrobe LIKE '%$search%' OR datenacheval LIKE '%$search%' OR garot LIKE '%$search%'";
}

$sql .= $where_clause;
$result = $con->query($sql);
$total_results = $result->num_rows;

// Calculer le nombre total de pages
$total_pages = ceil($total_results / $results_per_page);

// Obtenir la page actuelle ou définir à 1
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculer l'offset pour la requête SQL
$offset = ($current_page - 1) * $results_per_page;

// Requête SQL avec pagination
$sql .= " LIMIT $offset, $results_per_page";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste de la Cavalerie</title>
    <link href="styles.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
</head>
<body>
    <h1>Voilà notre Cavalerie</h1>
    <form action="afficher_cavalerie.php" method="get">
        <input type="text" name="search" placeholder="Rechercher un cheval..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <input type="submit" value="Rechercher">
    </form>
    <button id="download-pdf-button">Télécharger en PDF</button>
    <div id="pdf-content">
        <table id="cavalerie-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Numéro SIRE</th>
                    <th>Nom du Cheval</th>
                    <th>Date de Naissance</th>
                    <th>Photos</th>
                    <th>Garot</th>
                    <th>ID Race</th>
                    <th>ID Robe</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Parcourir les résultats et afficher les données
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["idcavalerie"] . "</td>";
                        echo "<td>" . $row["numsire"] . "</td>";
                        echo "<td>" . $row["nomcheval"] . "</td>";
                        echo "<td>" . $row["datenacheval"] . "</td>";
                        echo "<td>";
                        if (!empty($row["photo"])) {
                            $photos = explode(',', $row["photo"]);
                            foreach ($photos as $photo) {
                                echo "<img src='uploads/" . trim($photo) . "' alt='Photo' class='cavalerie-image' style='width:50px;height:50px;margin:5px;'>";
                            }
                        } else {
                            echo "Aucune photo";
                        }
                        echo "</td>";
                        echo "<td>" . $row["garot"] . "</td>";
                        echo "<td>" . $row["idrace"] . "</td>";
                        echo "<td>" . $row["idrobe"] . "</td>";
                        echo "<td>
                                <form action='modifier_cavalerie.php' method='post' style='display:inline;'>
                                    <input type='hidden' name='idcavalerie' value='" . $row["idcavalerie"] . "'>
                                    <input type='submit' value='Modifier' class='action-button'>
                                </form>
                                <form action='supprimer_cavalerie.php' method='post' style='display:inline;'>
                                    <input type='hidden' name='idcavalerie' value='" . $row["idcavalerie"] . "'>
                                    <input type='submit' value='Supprimer' class='action-button'>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>Aucun cheval trouvé</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='afficher_cavalerie.php?page=$i" . (isset($_GET['search']) ? "&search=" . $_GET['search'] : "") . "' class='pagination-link" . ($i == $current_page ? " active" : "") . "'>$i</a>";
        }
        ?>
    </div>

    <script>
        document.getElementById('download-pdf-button').addEventListener('click', function () {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Capturer le contenu du tableau
            html2canvas(document.getElementById('pdf-content')).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                doc.addImage(imgData, 'PNG', 10, 10, canvas.width * 0.75, canvas.height * 0.75);
                doc.save('liste_cavalerie.pdf');
            });
        });
    </script>
</body>
</html>

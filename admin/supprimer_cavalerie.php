<?php
include('bdd.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idcavalerie'])) {
    $idcavalerie = $_POST['idcavalerie'];
    $sql = "DELETE FROM cavalerie WHERE idcavalerie = $idcavalerie";
    if ($con->query($sql) === TRUE) {
        // Rediriger vers la page de base après la suppression
        header("Location: afficher_cavalerie.php");
        exit;
    } else {
        echo "Erreur lors de la suppression de l'enregistrement: " . $con->error;
    }
}
?>

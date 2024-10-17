<?php
include 'bdd.inc.php'; // Inclusion de votre fichier de connexion à la base de données

// Activer l'affichage des erreurs pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['delete'])) {
    $idCavalerie = $_POST['idcavalerie'];

    try {
        // Commencer une transaction
        $pdo->beginTransaction();

        // Étape 1 : Supprimer les enregistrements associés dans la table photo
        $sqlDeletePhotos = "DELETE FROM photo WHERE idcavalerie = :idcavalerie";
        $stmt = $pdo->prepare($sqlDeletePhotos);
        $stmt->bindParam(':idcavalerie', $idCavalerie);
        $stmt->execute();

        // Étape 2 : Supprimer l'entrée dans la table cavalerie
        $sqlDeleteCavalerie = "DELETE FROM cavalerie WHERE idcavalerie = :idcavalerie";
        $stmt = $pdo->prepare($sqlDeleteCavalerie);
        $stmt->bindParam(':idcavalerie', $idCavalerie);
        $stmt->execute();

        // Validation de la transaction
        $pdo->commit();

        // Redirection ou message de succès
        header("Location: votre_page.php"); // Remplacez 'votre_page.php' par la page de redirection
        exit();
    } catch (PDOException $e) {
        // Annulation de la transaction en cas d'erreur
        $pdo->rollBack();
        echo "Erreur lors de la suppression : " . $e->getMessage();
    }
}
?>

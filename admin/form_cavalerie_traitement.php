<?php
include('bdd.php');
include('cavalerie.class.php');

$numsire = $_POST['numsire'];
$nom_cheval = $_POST['nom_cheval'];
$datenacheval = $_POST['datenacheval'];
$garot = $_POST['garot'];
$id_race = $_POST['id_race'];
$id_robe = $_POST['id_robe'];
$photo_path = null;

// Gérer le téléchargement de l'image
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $target_dir = "uploads/";

    // Vérifier si le répertoire existe, sinon le créer
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Vérifier si le fichier est une image
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check !== false) {
        // Déplacer le fichier téléchargé dans le répertoire cible
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // Enregistrer le chemin de l'image dans la base de données
            $photo_path = basename($_FILES["photo"]["name"]);
        } else {
            echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
            exit;
        }
    } else {
        echo "Le fichier n'est pas une image.";
        exit;
    }
} else {
    echo "Désolé, il y a eu une erreur lors du téléchargement de votre fichier.";
    exit;
}

$protptype = new Cavalerie($numsire, $nom_cheval, $datenacheval, $garot, $id_race, $id_robe, $photo_path);
$protptype->cavalerie_ajout($numsire, $nom_cheval, $datenacheval, $garot, $id_race, $id_robe, $photo_path, $con);

// Rediriger vers la page de base après l'ajout
header("Location: afficher_cavalerie.php");
exit;
?>

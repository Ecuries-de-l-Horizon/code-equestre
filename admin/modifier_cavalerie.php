<?php
include('bdd.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idcavalerie'])) {
    $idcavalerie = $_POST['idcavalerie'];
    $sql = "SELECT * FROM cavalerie WHERE idcavalerie = $idcavalerie";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $idcavalerie = $_POST['idcavalerie'];
    $numsire = $_POST['numsire'];
    $nomcheval = $_POST['nomcheval'];
    $datenacheval = $_POST['datenacheval'];
    $garot = $_POST['garot'];
    $idrace = $_POST['idrace'];
    $idrobe = $_POST['idrobe'];
    $photo_path = $row['photo']; // Conserver l'image existante par défaut

    // Gérer le téléchargement de la nouvelle image
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
                // Enregistrer le chemin de la nouvelle image
                $photo_path = basename($_FILES["photo"]["name"]);
            } else {
                echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                exit;
            }
        } else {
            echo "Le fichier n'est pas une image.";
            exit;
        }
    }

    $sql = "UPDATE cavalerie SET numsire='$numsire', nomcheval='$nomcheval', datenacheval='$datenacheval', garot='$garot', idrace='$idrace', idrobe='$idrobe', photo='$photo_path' WHERE idcavalerie=$idcavalerie";
    if ($con->query($sql) === TRUE) {
        // Rediriger vers la page de base après la mise à jour
        header("Location: afficher_cavalerie.php");
        exit;
    } else {
        echo "Erreur lors de la mise à jour de l'enregistrement: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier la Cavalerie</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <h1>Modifier la Cavalerie</h1>
    <form action="modifier_cavalerie.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idcavalerie" value="<?php echo $row['idcavalerie']; ?>">
        <label for="numsire">Numéro SIRE</label>
        <input type="text" id="numsire" name="numsire" value="<?php echo $row['numsire']; ?>" required>

        <label for="nomcheval">Nom du Cheval</label>
        <input type="text" id="nomcheval" name="nomcheval" value="<?php echo $row['nomcheval']; ?>" required>

        <label for="datenacheval">Date de Naissance</label>
        <input type="date" id="datenacheval" name="datenacheval" value="<?php echo $row['datenacheval']; ?>" required>

        <label for="garot">Garot</label>
        <input type="text" id="garot" name="garot" value="<?php echo $row['garot']; ?>" required>

        <label for="idrace">ID Race</label>
        <input type="text" id="idrace" name="idrace" value="<?php echo $row['idrace']; ?>" required>

        <label for="idrobe">ID Robe</label>
        <input type="text" id="idrobe" name="idrobe" value="<?php echo $row['idrobe']; ?>" required>

        <label for="photo">Photo</label>
        <input type="file" id="photo" name="photo">

        <input type="submit" name="update" value="Mettre à jour">
    </form>
</body>
</html>

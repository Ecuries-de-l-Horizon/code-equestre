<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "votre_base_de_donnees";  // Remplacez par le nom de votre base de données

// Connexion à la base de données avec PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur PDO pour les exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}

// Vérifier si les données ont été envoyées par le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $idemp = $_POST['idemp'];
    $nouveau_salaire = $_POST['nouveau_salaire'];
    $raison = $_POST['raison'];

    try {
        // Récupérer l'ancien salaire de l'employé
        $sql_old_salary = "SELECT salaire FROM employe WHERE idemp = :idemp";
        $stmt = $conn->prepare($sql_old_salary);
        $stmt->bindParam(':idemp', $idemp, PDO::PARAM_INT);
        $stmt->execute();
        
        // Vérifier si un employé est trouvé
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $ancien_salaire = $row['salaire'];

            // Mettre à jour le salaire dans la table employe
            $sql_update = "UPDATE employe SET salaire = :nouveau_salaire WHERE idemp = :idemp";
            $stmt = $conn->prepare($sql_update);
            $stmt->bindParam(':nouveau_salaire', $nouveau_salaire, PDO::PARAM_STR);
            $stmt->bindParam(':idemp', $idemp, PDO::PARAM_INT);
            $stmt->execute();

            // Enregistrer l'historique dans la table logs_salaire
            $sql_log = "INSERT INTO logs_salaire (salaireold, salairenew, raison) VALUES (:salaireold, :salairenew, :raison)";
            $stmt = $conn->prepare($sql_log);
            $stmt->bindParam(':salaireold', $ancien_salaire, PDO::PARAM_STR);
            $stmt->bindParam(':salairenew', $nouveau_salaire, PDO::PARAM_STR);
            $stmt->bindParam(':raison', $raison, PDO::PARAM_STR);
            $stmt->execute();

            echo "Le salaire a été mis à jour avec succès et l'historique a été enregistré.";
        } else {
            echo "Aucun employé trouvé avec cet ID.";
        }

    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour : " . $e->getMessage();
    }
}

// Fermer la connexion PDO
$conn = null;
?>

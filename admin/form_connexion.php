<?php
session_start();
setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra'); // Définit la langue en français
// Variables dynamiques
$titre = "Connexion - Les Écuries des Horizons";
$nomCentre = "Les Écuries des Horizons";
$slogan = "Au cœur de la nature, à l'âme du cheval.";
$messageAccueil = $_SESSION['message'] ?? null;
$footerText = "Centre Européen de Formation © " . date('Y') . " – Tous droits réservés – Politique de protection des données";

// Fonction pour afficher la date et l'heure
function afficherDateHeure() {
    return strftime('%A %d %B %Y à %H:%M:%S');
}

// Définir la classe CSS pour le message
$messageClass = ($messageAccueil == "Bienvenue dans nos Écuries") ? 'success' : 'error';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titre; ?></title>
    <style>
        /* Couleurs de la palette */
        :root {
            --white: #ffffff;
            --yellow: #fcca46;
            --orange: #eb5c1e;
            --brown: #4f2200;
            --dark-orange: #bc5d2e;
        }

        /* Style de base */
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            margin: 0;
            padding-top: 20px;
            background-color: var(--brown);
            font-family: Arial, sans-serif;
            color: var(--white);
            text-align: center;
        }

        .header-banner {
            display: inline-block;
            background-color: var(--dark-orange);
            padding: 15px 30px;
            border-radius: 20px;
            margin-bottom: 10px;
        }

        .header {
            font-size: 36px;
            color: var(--yellow);
            margin: 0;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .subheader {
            font-size: 20px;
            color: var(--yellow);
            margin-top: 5px;
            font-weight: normal;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .header-form {
            font-size: 32px;
            color: var(--yellow);
            margin-bottom: 20px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .main-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 40px;
            padding: 20px;
        }

        .side-images {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: -60px;
        }

        .logo {
            width: 425px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .form-container {
            background-color: var(--dark-orange);
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .form-container h2 {
            color: var(--yellow);
            margin-bottom: 20px;
        }

        .form-container input[type="text"], .form-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid var(--yellow);
            border-radius: 4px;
            background-color: var(--white);
            color: var(--brown);
            font-size: 16px;
        }

        .form-container input[type="text"]:focus, .form-container input[type="password"]:focus {
            border-color: var(--orange);
            outline: none;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            background-color: var(--yellow);
            color: var(--brown);
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container input[type="submit"]:hover {
            background-color: var(--orange);
        }

        .message {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }

        .message.success {
            color: #4CAF50;
        }

        .message.error {
            color: #F44336;
        }

        .footer {
            width: 100%;
            background-color: var(--dark-orange);
            color: var(--yellow);
            padding: 10px 0;
            text-align: center;
            font-size: 16px;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .footer .datetime {
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="header-banner">
        <div class="header"><?php echo $nomCentre; ?></div>
        <div class="subheader"><?php echo $slogan; ?></div>
    </div>

    <?php if ($messageAccueil): ?>
        <div class="message <?php echo $messageClass; ?>">
            <?php echo $messageAccueil; ?>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <div class="main-container">
        <div class="side-images">
            <img src="chevaux.jpg" alt="Image gauche 1" class="logo">
            <img src="ccc.jpg" alt="Image gauche 2" class="logo">
        </div>
        
        <div class="form-container">
            <h2>Connexion</h2>
            <form action="connexion.php" method="post">
                <input type="text" id="mail" name="mail" placeholder="Adresse email" required />
                <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" required />
                <input type="submit" value="Se connecter"/>
            </form>
        </div>
        
        <div class="side-images">
            <img src="quelques-joyeux-jeunes.jpg" alt="Image droite 1" class="logo">
            <img src="poney(8).jpg" alt="Image droite 2" class="logo">
        </div>
    </div>

    <div class="footer">
        <div class="datetime">
            <?php echo afficherDateHeure(); ?>
        </div>
        <div><?php echo $footerText; ?></div>
    </div>
</body>
</html>

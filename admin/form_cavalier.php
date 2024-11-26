<?php
session_start();
include("bdd.php");
if (empty($_SESSION['mail'])) { 
    header('Location: http://localhost/tp_projet_v2/admin/form_connexion.php');
} else {
    $t = 0;
    $sql = "SELECT emailuser FROM user;";
    $test = $con->query($sql);
    $a = "SELECT mdp FROM user;";
    $test2 = $con->query($a);

    foreach ($test as $row) {
        foreach ($test2 as $row2) {
            if ($row['emailuser'] == $_SESSION['mail'] && $row2['mdp'] == $_SESSION['mdp']) {
                echo('<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Cavalier</title>
    <style>
        /* Palette de couleurs */
        :root {
            --white: #ffffff;
            --yellow: #fcca46;
            --orange: #eb5c1e;
            --brown-dark: #4f2200;
            --brown-light: #bc5d2e;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--white);
            color: var(--brown-dark);
            padding: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
            background-color: var(--yellow);
            padding: 20px;
            border: 2px solid var(--brown-dark);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid var(--brown-light);
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: var(--orange);
            color: var(--white);
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: var(--brown-dark);
        }

        fieldset {
            border: none;
            margin: 20px 0;
            padding: 10px;
            background-color: var(--white);
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            margin-left: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form action="form_cavalier_traitement.php" method="post">
        <input type="text" id="nom_cav" name="nom_cav" placeholder="Nom" />
        <input type="text" id="prenom_cav" name="prenom_cav" placeholder="Prénom" />
        <input type="text" id="numlicence" name="numlicence" placeholder="Numéro de Licence" />
        <input type="text" id="photo" name="photo" placeholder="Photo" />
        <input type="text" id="datena" name="datena" placeholder="Date de Naissance" />
        <input type="text" id="idgalop" name="idgalop" placeholder="Galop" />
        <fieldset id="test"> 
            <div>
                <input type="checkbox" id="res" name="select" value="res" />
                <label for="res">Responsable</label>
            </div>
            <div>
                <input type="checkbox" id="prop" name="select2" value="prop" />
                <label for="prop">Propriétaire</label>
            </div>
        </fieldset>
        <div id="additionalFields"></div>
        <script src="script.js"></script>
        <input type="submit" />
    </form>
</body>
</html>');
                $t = 1;
                break;
            }
        }
        if ($t == 1) {
            break;
        }
    }
    echo('25');
    if ($t != 1) {
        header('Location: form_connexion.php');
    }
}
?>

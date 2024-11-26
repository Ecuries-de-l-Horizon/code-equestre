<html>
<head>
    <meta charset="utf-8">
    <title>Ma page</title>
    <link href="styles.css" rel="stylesheet">
    <style>
        :root {
            --white: #ffffff;
            --yellow: #fcca46;
            --orange: #eb5c1e;
            --dark-brown: #4f2200;
            --brown: #bc5d2e;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--dark-brown);
            color: var(--white);
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .image-left, .image-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .image-left img,
        .image-right img {
            max-width: 100%;
            height: auto;
            max-height: 300px; /* Augmenter la hauteur maximale des images */
        }

        .form-container {
            flex: 2;
            background-color: var(--dark-brown);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h4 {
            color: var(--dark-brown);
        }

        input[type="text"], input[type="date"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 2px solid var(--brown);
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: var(--orange);
            color: var(--white);
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: var(--brown);
        }

        .title {
            font-size: 2.5em; /* Agrandir le titre */
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 1.2em; /* Taille de la petite phrase */
            font-style: italic;
        }
    </style>
</head>
<body>
    <center>
        <nav>
            <img src="ugy.png" alt="Image gauche 1" class="nav-image left1">
            <img src="logo.png" alt="Image gauche 2" class="nav-image left2">
            <h1>Zone admin</h1>
            <img src="labe.png" alt="Image droite 1" class="nav-image right1">
            <img src="ffe.png" alt="Image droite 2" class="nav-image right2">
        </nav>
    </center>

    <nav>
        <a class="special" href="#" title="Histoire">Histoire de l'entreprise</a>
        <a class="special" href="#" title="Formulaire de contact">Formulaire de contact</a>
        <a class="special" href="#" title="Avis">Avis clients</a>
        <a class="special" href="#" title="Support">Support clients</a>
    </nav>

    <br>
    <center>
        <h2 class="title">Cavalerie</h2>
        <p class="subtitle">Bienvenue à votre cheval dans notre écurie</p>
    </center>
    <br>

    <div class="container">
        <!-- Image à gauche -->
        <div class="image-left">
            <img src="cava.jpg" alt="Image gauche" class="logo">
            <img src="lerie.jpg" alt="Image gauche" class="logo">
            <img src="chevaux_003.jpg" alt="Image gauche" class="logo">

        </div>

        <!-- Formulaire -->
        <div class="form-container">
            <form action="form_cavalerie_traitement.php" method="post" enctype="multipart/form-data">
                <h4>NumSire</h4>
                <input type="text" id="numsire" name="numsire" />

                <h4>Nom_Cheval</h4>
                <input type="text" id="nom_cheval" name="nom_cheval" />

                <h4>Date_naissance_cheval</h4>
                <input type="date" id="datenacheval" name="datenacheval" />

                <h4>Garot</h4>
                <input type="text" id="garot" name="garot"/>

                <h4>Numero Race</h4>
                <input type="text" id="id_race" name="id_race">

                <h4>Numero Robe</h4>
                <input type="text" id="id_robe" name="id_robe">

                <h4>Photo</h4>
                <input type="file" id="photo" name="photo">

                <br><br>
                <input type="submit"/>
            </form>
        </div>

        <!-- Image à droite -->
        <div class="image-right">
            <img src="cavalerie.jpg" alt="Image droite" class="logo">
            <img src="vale.jpg" alt="Image droite" class="logo">
            <img src="cheva.jpg" alt="Image droite" class="logo">

        </div>
    </div>
</body>
</html>

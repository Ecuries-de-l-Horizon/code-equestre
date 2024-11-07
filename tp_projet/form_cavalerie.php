<?php
session_start();
include("bdd.php");
if(empty($_SESSION['mail'])){ 
    header('Location: http://localhost/tp_projet/form_connexion.php');
}else{
?><html><head>
<meta charset="utf-8">
<title>Ma page</title>
<link href="styles.css" rel="stylesheet">
</head>
</html>
<?php

$t = 0;
$sql = "SELECT emailuser FROM user;";
$test =$con->query($sql);
$a = "SELECT mdp FROM user;";
$test2 =$con->query($a);
foreach($test as $row){
    foreach($test2 as $row2){
        if($row['emailuser'] == $_SESSION['mail']&& $row2['mdp']== $_SESSION['mdp']){
            echo('<html>
<body>
    <center><nav>
        <h1>Zone admin</h1>
    </nav></center>
    <nav>
        <a class="special" href="http://localhost/Project_TechSolutions/Project_Tech_solutions/Histoire_entreprise.html" title="Histoire"> <center>histoire de lentreprise</center> </a> 
        <a class="special" href="http://localhost/Project_TechSolutions/Project_Tech_solutions/Formulaire_contacte.html" title="Formulaire de contacte de lentreprise"> <center>Formulaire de contacte</center> </a>
        <a class="special" href="http://localhost/Project_TechSolutions/Project_Tech_solutions/Avis_de_nos_clients.php" title="Avis"> <center> Avis clients </center> </a>
        <a class="special" href="http://localhost/Project_TechSolutions/Project_Tech_solutions/Support_clients.html" title="Avis"> <center> Support clients </center> </a> 
        <div class="carre"></div>
    </nav>
    <br>
    <center><h2>Cavalerie</h2></right>
    <br>
    <form action = "form_cavalerie_traitement.php" method = "post">
        <h4>NumSire</h4>
        <input type="text" id="numsire" name="numsire" />
        <br>
        <br>
        <h4>Nom_Cheval</h4>
        <input type="text" id="nom_cheval" name="nom_cheval" />
        <br>
        <br>
        <h4>Date_naissance_cheval</h4>
        <input type="text" id="datenacheval" name="datenacheval"  />
        <br>
        <br>
        <h4>Garot</h4>
        <input type="text" id="garot" name="garot"/>
        <br>
        <br>
        <h4>Numero Race</h4>
        <input type="text" id="id_race" name="id_race">
        <br>
        <br>
        <h4>Numero Robe</h4>
        <input type="text" id="id_robe" name="id_robe">
        <br>
        <br>
        <h4>Identifiant photo</h4>
        <input type="text" id="id_photo" name="id_photo">
        <br>
        <br>
        <input type="submit"/>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer>
        <small>@test, 19100 Brive-la-Gaillarde</small>
    </footer>
    </body>
    </html>');
            $t = 1;
            break;
        }
    }
    if($t == 1){
        break;
    }
}
if($t != 1){
    header('form_connexion.php');
}
}


?>
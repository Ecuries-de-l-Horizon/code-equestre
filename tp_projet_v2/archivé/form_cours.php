<?php
session_start();
include("bdd.php");
if(empty($_SESSION['mail'])){ 
    header('Location: http://localhost/tp_projet/form_connexion.php');
}else{

$t = 0;
$sql = "SELECT emailuser FROM user;";
$test =$con->query($sql);
$a = "SELECT mdp FROM user;";
$test2 =$con->query($a);
foreach($test as $row){
    foreach($test2 as $row2){
        if($row['emailuser'] == $_SESSION['mail']&& $row2['mdp']== $_SESSION['mdp']){
            echo('<html>
    <form action = "form_cours_traitement.php" method = "post">
        <input type="text" id="idcours" name="idcours" />
        <input type="text" id="libcours" name="libcours" />
        <input type="text" id="heure_debut" name="heure_debut"  />
        <input type="text" id="heure_fin" name="heure_fin"/>
        <input type="text" id="jour" name="jour">
        <input type="submit"/>
    </form>
    </html>');
            $t = 1;
            break;
        }
    }
    if($t == 1){
        break;
    }
}
echo('25');
if($t != 1){
    header('form_connexion.php');
}
}


?>
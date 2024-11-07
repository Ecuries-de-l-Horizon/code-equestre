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
    <form action = "form_cavalier_traitement.php" method = "post">'.
        /*<input type="text" id="id_cavalier" name="id_cavalier" />*/
        '<input type="text" id="nom_cav" name="nom_cav" />
        <input type="text" id="prenom_cav" name="prenom_cav"  />
        <input type="text" id="numlicence" name="numlicence"/>
        <input type="text" id="photo" name="photo">
        <input type="text" id="datena" name="datena">
        <input type="text" id="idgalop" name="idgalop"  />
        <fieldset id="test"> 
            <div>
                <input type="checkbox" id="res" name="select" value="res" />
                <label for="res">responsable</label>
            </div>
            <div>
                <input type="checkbox" id="prop" name="select2" value="prop" />
                <label for="prop">propriétaire</label>
            </div>
        </fieldset>
        <div id="additionalFields"></div>
        <script src="script.js"></script>
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
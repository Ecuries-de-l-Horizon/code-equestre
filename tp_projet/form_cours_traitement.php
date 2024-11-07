<?php
    include('bdd.php');
    include('cours.class.php');
    $id = $_POST['idcours'];
    $lib = $_POST['libcours'];
    $HD = $_POST['heure_debut'];
    $HF = $_POST['heure_fin'];
    $jour = $_POST['jour'];
    $protptype = new Cours($id,$lib,$HD,$HF,$jour);
    $protptype->cours_ajout($lib,$HD,$HF,$jour,$con);
?>
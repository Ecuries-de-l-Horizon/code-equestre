<?php
    include('bdd.php');
    include('cavalerie.class.php');
    $numsire = $_POST['numsire'];
    $nom_cheval = $_POST['nom_cheval'];
    $datenacheval = $_POST['datenacheval'];
    $garot = $_POST['garot'];
    $id_race = $_POST['id_race'];
    $id_robe = $_POST['id_robe'];
    $id_photo = $_POST['id_photo'];
    $protptype = new Cavalerie($numsire,$nom_cheval,$datenacheval,$garot, $id_race, $id_robe,$id_photo);
    $protptype->cavalerie_ajout($numsire, $nom_cheval, $datenacheval, $garot, $id_race,$id_robe, $id_photo, $con);
<?php
session_start();
include("bdd.php");
$a = $_POST["mail"];
$b = $_POST["mdp"];
$sql = "SELECT emailuser FROM user WHERE emailuser = '".$a."';";
$test =$con->query($sql);
$c = "SELECT passworduser FROM user WHERE passworduser ='".$b."';";
$test2 =$con->query($c);

foreach($test as $tentative) {
    $test = $tentative['emailuser'];
}
foreach($test2 as $tentative2) {
    $test2 = $tentative2['passworduser'];
}

if($test == $a && $b == $test2){
    $_SESSION['mail'] = $test;
    $_SESSION['mdp'] = $test2;
}else{
    echo('erreur autentification veiller réessayer');
    sleep(3);
    header('form_connexion.php');
}
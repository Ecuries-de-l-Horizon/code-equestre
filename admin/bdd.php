<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "equestre";

// Créer une connexion
$con = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>

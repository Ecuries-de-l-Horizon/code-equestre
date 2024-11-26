<?php
	$db = "mysql:host=localhost;dbname=equestre";
	$user = "root";
	$pass = "";
	$con = new PDO($db, $user, $pass);
    return $con;
?>
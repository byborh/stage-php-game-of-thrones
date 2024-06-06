<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";

try {
    $bdd = new PDO("mysql:host=$host;dbname=game-of-thrones", $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    echo "Une erreur s'est produite au cours de la connexion à la base de donnée : " . $err;
    exit();
}
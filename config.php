<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "essaiebdd";
try {
    $idcom = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $idcom->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur: " . $e->getMessage());
}

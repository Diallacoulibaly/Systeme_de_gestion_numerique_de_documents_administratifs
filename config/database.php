<?php
// config/database.php

$host = 'localhost';
$dbname = 'mairie';  // Mets le nom de ta base de données
$username = 'root';  // Mets ton username MySQL
$password = '';  // Mets ton mot de passe MySQL si besoin

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
<<<<<<< HEAD
}
=======
}
>>>>>>> 6e7aacee603d3fe8571515d56dfd0b703b33ab48

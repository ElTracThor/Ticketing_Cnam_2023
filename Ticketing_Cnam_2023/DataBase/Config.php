<?php
// Informations de connexion à la base de données
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'TICKETING_CNAM_2023';

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo 'Connexion à la base de données réussie!';

    // Retourner l'objet PDO
    return $pdo;
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}


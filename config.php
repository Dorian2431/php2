<?php


//Les informations de connexion a la bdd
$host = "localhost";
$dbname = "php2";
$user = "dwwm";
$pass = "dwwm";

try {
    // Creation d'une instance PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
// Configuration de PDO en cas d'exeption
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Permet d'aller chercher les erreurs et les exeption
} catch (PDOException $e) {
    // S'il y a une erreur de connexion
    die("Erreur de connexion : " . $e->getMessage());
}

$query = "SELECT * from produits";

$stmt = $pdo->query($query);

$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
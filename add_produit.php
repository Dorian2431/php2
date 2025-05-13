<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    $stock = $_POST["stock"];

    try {
        // Préparer la requête SQL d'insertion
        $sql = "INSERT INTO produits (nom, prix, stock) VALUES (:nom, :prix, :stock)";
        $stmt = $pdo->prepare($sql);

        // Lier les valeurs aux paramètres de la requête préparée
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT); // Spécifie le type de données pour plus de sécurité

        // Exécuter la requête préparée
        $stmt->execute();

        // Vérifier si l'insertion a réussi
        if ($stmt->rowCount() > 0) {
            echo "<p style='color: green;'>Le produit a été ajouté avec succès !</p>";
        } else {
            echo "<p style='color: red;'>Erreur lors de l'ajout du produit.</p>";
        }

    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout du produit : " . $e->getMessage() . "<br>";
    }

    echo "<p><a href='index.php'>Retour à la liste des produits</a></p>";

} else {
    echo "<p>Ce script ne doit être appelé que via la soumission du formulaire.</p>";
}
?>
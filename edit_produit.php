<?php

require "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = $_POST["id"];
$nom = $_POST["nom"];
$prix = $_POST["prix"];
$stock = $_POST["stock"];

try {
    $query = "UPDATE produits SET nom= :nom, prix= :prix, stock= :stock WHERE id= :id";
        $stmt = $pdo->prepare($query);

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":prix", $prix);
    $stmt->bindParam(":stock", $stock, PDO::PARAM_INT);

    $stmt->execute();

    if($stmt->rowCount() > 0){
        echo "<p style='color: green;'>Le produit a été mis à jour avec succès !</p>";
    } else {
        echo "<p style='color: orange;'>Aucune modification n'a été apportée au produit (peut-être que les valeurs étaient les mêmes).</p>";
    }
} catch(PDOException $e) {
    echo "<p style='color: red;'>Erreur lors de la mise à jour du produit : " . $e->getMessage() . "</p>";
}

echo "<p><a href='index.php'>Retour liste produits</a></p>";

} else {
   echo "<p>Ce script ne doit être applé que vie la soumission du formulaire de modification.</p>";
}

?>

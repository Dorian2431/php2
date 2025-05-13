<?php

require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $query = "SELECT * FROM produits WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        $produit = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$produit) {
            die("Produit n'existe pas");
        }
    } catch (PDOException $e) {
        die("Erreur lors de la récupération du produit : " . $e->getMessage());
    }
} else {
    die("ID du produit manquant. ");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD d'une liste de produits</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Modifier le Produit</h1>
<br><br>
<form action="edit_produit.php" method="post">
    <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($produit['id']) ?>">
    <br><br>
    <div>
        <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($produit['nom']) ?>" required> <br><br>
    </div>

    <div>
        <label for="prix">prix :</label>
        <input type="number" id="prix" name="prix" step="0.01" value="<?= htmlspecialchars($produit['prix']) ?>" required> <br><br>
    </div>

    <div>
        <label for="stock">stock :</label>
        <input type="number" id="stock" name="stock" value="<?= htmlspecialchars($produit['stock']) ?>" required> <br><br>
    </div>
    <input type="submit" value="Enregistrer les modifications">
</form>

<p><a href="index.php">Retour à la liste des produits</a> </p>
</body>

</html>


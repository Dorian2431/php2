<?php
// Importation du config.php
require 'config.php';

$query = "SELECT * from produits";

$stmt = $pdo->query($query);

$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Insertion avec requête préparée
//$stmt = $pdo->prepare('INSERT INTO php () VALUES (?)'); // Prepare est une fonction dans la class PDO
//$stmt->execute([$]);

// Edition et suppresion
// edit.php et delete.php
 // quand y'aura un id egal a l'id afficher,dans on clique dessus on arrivera sur la page grave au href et
// si on parle de suppresion on met delete.php, on prend l'id du produit,une fois sur la page delete, il faut recup l'id
//$id = $_GET['id']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD d'une liste de produits</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Stocks</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($produits as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['id']) ?></td>
            <td><?= htmlspecialchars($p['nom']) ?></td>
            <td><?= htmlspecialchars($p['prix']) ?></td>
            <td><?= htmlspecialchars($p['stock']) ?></td>
            <td><a href="edit.php?id=<?= $produits['id'] ?>"><button>Modifier</button></a></td>
            <td><a href="delete.php?id=<?= $produits['id'] ?>"><button>Supprimer</button></a></td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Produit</title>
</head>
<body>
<h1>Ajouter un Nouveau Produit</h1>

<form action="add_produit" method="post">
    <div>
        <label for="nom">Nom du produit :</label>
        <input type="text" id="nom" name="nom" required><br><br>
    </div>
    <div>
        <label for="prix">Prix :</label>
        <input type="number" id="prix" name="prix" step="0.01" required><br><br>
    </div>
    <div>
        <label for="stock">Stock :</label>
        <input type="number" id="stock" name="stock" required><br><br>
    </div>
    <input type="submit" value="Ajouter le produit">
</form>

<p><a href="index.php">Retour à la liste des produits</a></p>
</body>
</html>
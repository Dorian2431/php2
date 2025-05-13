<?php

require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM produits WHERE id = :id";

    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);

    header("Location: index.php");
    exit();
} else {
    header("Location: index.php?erreur=id_manquant");
    exit();
}

?>
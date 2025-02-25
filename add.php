<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = isset($_POST["id"]) ? trim($_POST["id"]) : "";
    $nom = isset($_POST["nom"]) ? trim($_POST["nom"]) : "";
    $prix = isset($_POST["prix"]) ? trim($_POST["prix"]) : "";
    $stock = isset($_POST["stock"]) ? trim($_POST["stock"]) : "";

//  Vérification que le camp n'est pas vide
    if ($name !== '') { // si name c'est pas vide,sa passeici
        // Stockage dans la session
        $_SESSION['message'] = "Merci $name !"; // on le stock ici message peu etre remplacer par ce qu'on veux

        // Redirection vers la même page
        header("Location: form.php"); // Toujours coller Location avec les : , permet de faire la redirection automatique
        exit();
    } else { // si name est vide, sa passe ici
        // Message d'erreur
        $_SESSION['message'] = "Veuillez indiquer votre nom !";
    }

}

?>
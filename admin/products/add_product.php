<?php
include '../../config/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $quantity = $_POST["quantity"];

    $sql = "INSERT INTO products (name, description, price, category, quantity) 
            VALUES ('$name', '$description', '$price', '$category', '$quantity')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?msg=Produit ajouté avec succès");
        exit();
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Produit</title>
</head>
<body>
    <h1>Ajouter un Produit</h1>
    <form action="" method="POST">
        <label>Nom :</label><br>
        <input type="text" name="name" required><br><br>
        <label>Description :</label><br>
        <textarea name="description" required></textarea><br><br>
        <label>Prix :</label><br>
        <input type="number" name="price" step="0.01" required><br><br>
        <label>Catégorie :</label><br>
        <input type="text" name="category" required><br><br>
        <label>Quantité :</label><br>
        <input type="number" name="quantity" required><br><br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>

<?php
include '../../config/db_conn.php';

$id = $_GET["id"];
$sql = "SELECT * FROM products WHERE id=$id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $quantity = $_POST["quantity"];

    $sql = "UPDATE products 
            SET name='$name', description='$description', price='$price', category='$category', quantity='$quantity' 
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?msg=Produit mis à jour avec succès");
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
    <title>Modifier un Produit</title>
</head>
<body>
    <h1>Modifier un Produit</h1>
    <form action="" method="POST">
        <label>Nom :</label><br>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br><br>
        <label>Description :</label><br>
        <textarea name="description" required><?php echo $product['description']; ?></textarea><br><br>
        <label>Prix :</label><br>
        <input type="number" name="price" step="0.01" value="<?php echo $product['price']; ?>" required><br><br>
        <label>Catégorie :</label><br>
        <input type="text" name="category" value="<?php echo $product['category']; ?>" required><br><br>
        <label>Quantité :</label><br>
        <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required><br><br>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>

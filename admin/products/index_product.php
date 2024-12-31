<?php
include '../../config/db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des Produits</title>
</head>
<body>
    <h1>Liste des Produits</h1>
    <a href="add_product.php">Ajouter un produit</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Quantité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['description']}</td>
                            <td>{$row['price']}</td>
                            <td>{$row['category']}</td>
                            <td>{$row['quantity']}</td>
                            <td>
                                <a href='edit_product.php?id={$row['id']}'>Modifier</a> |
                                <a href='delete_product.php?id={$row['id']}'>Supprimer</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Aucun produit trouvé.</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>

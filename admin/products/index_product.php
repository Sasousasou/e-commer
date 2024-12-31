<?php
include '../../config/db_conn.php';
include "../../src/php/navbar.php"; 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

    
    <main class="container my-5">
        <h1 class="text-center mb-4">Liste des Produits</h1>
        <a href="add_product.php" class="btn btn-primary mb-3">Ajouter un produit</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
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
                
                $sql = "SELECT p.id, p.name, p.description, p.price, c.name AS category_name, p.quantity
                        FROM products p
                        LEFT JOIN category c ON p.category_id = c.id";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['description']}</td>
                                <td>{$row['price']}</td>
                                <td>{$row['category_name']}</td>
                                <td>{$row['quantity']}</td>
                                <td>
                                    <a class='btn btn-warning btn-sm' href='edit_product.php?id={$row['id']}'>Modifier</a> |
                                    <a class='btn btn-danger btn-sm' href='delete_product.php?id={$row['id']}'>Supprimer</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Aucun produit trouvé.</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </main>

    <!-- footer -->
    <?php include "../../src/php/footer.php";   ?>

    <!-- Lien vers Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

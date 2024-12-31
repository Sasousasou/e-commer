<?php
include '../../config/db_conn.php';

$sql = "SELECT orders.id, users.nom AS user_nom, users.prenom AS user_prenom, products.name AS product_name, orders.total, orders.date, orders.etat 
        FROM orders
        JOIN users ON orders.user_id = users.id
        JOIN products ON orders.product_id = products.id";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Erreur SQL : " . mysqli_error($conn);
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Commandes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    
    <!-- Navbar -->
    <?php include "../../src/php/navbar.php"; ?>

    <main class="container my-5">
        <h1 class="text-center mb-4">Liste des Commandes</h1>
        <a href="add_order.php" class="btn btn-primary mb-3">Ajouter une commande</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de l'utilisateur</th>
                    <th>Produit</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['user_nom']} {$row['user_prenom']}</td>
                                <td>{$row['product_name']}</td>
                                <td>{$row['total']}</td>
                                <td>{$row['date']}</td>
                                <td>{$row['etat']}</td>
                                <td>
                                    <a href='edit_order.php?id={$row['id']}' class='btn btn-warning btn-sm'>Modifier</a> |
                                    <a href='delete_order.php?id={$row['id']}' class='btn btn-danger btn-sm'>Supprimer</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Aucune commande trouvée.</td></tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </main>

    <!-- Footer -->
    <?php include "../../src/php/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

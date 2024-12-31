<?php
include '../../config/db_conn.php';

$id = $_GET["id"];
$sql = "SELECT * FROM orders WHERE id=$id";
$result = mysqli_query($conn, $sql);
$order = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $product_id = $_POST["product_id"];
    $total = $_POST["total"];
    $etat = $_POST["etat"];

    $sql = "UPDATE orders 
            SET user_id='$user_id', product_id='$product_id', total='$total', etat='$etat' 
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index_order.php?msg=Commande mise à jour avec succès");
        exit();
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Commande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <?php include "../../src/php/navbar.php"; ?>

    <main class="container my-5">
        <h1 class="text-center mb-4">Modifier une Commande</h1>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="user_id" class="form-label">Utilisateur :</label>
                <select name="user_id" id="user_id" class="form-select" required>
                    <?php
                    $result = mysqli_query($conn, "SELECT id, nom FROM users");
                    while ($row = mysqli_fetch_assoc($result)) {
                        $selected = ($row['id'] == $order['user_id']) ? "selected" : "";
                        echo "<option value='{$row['id']}' $selected>{$row['nom']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="product_id" class="form-label">Produit :</label>
                <select name="product_id" id="product_id" class="form-select" required>
                    <?php
                    $result = mysqli_query($conn, "SELECT id, name FROM products");
                    while ($row = mysqli_fetch_assoc($result)) {
                        $selected = ($row['id'] == $order['product_id']) ? "selected" : "";
                        echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="total" class="form-label">Total :</label>
                <input type="number" name="total" id="total" class="form-control" step="0.01" value="<?php echo $order['total']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="etat" class="form-label">État :</label>
                <select name="etat" id="etat" class="form-select" required>
                    <option value="1" <?php echo ($order['etat'] == 1) ? "selected" : ""; ?>>Accepté</option>
                    <option value="2" <?php echo ($order['etat'] == 2) ? "selected" : ""; ?>>Refusé</option>
                    <option value="3" <?php echo ($order['etat'] == 3) ? "selected" : ""; ?>>Annulé</option>
                    <option value="4" <?php echo ($order['etat'] == 4) ? "selected" : ""; ?>>Passé</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </main>

    <!-- Footer -->
    <?php include "../../src/php/footer.php"; ?>

    <!-- Lien vers Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

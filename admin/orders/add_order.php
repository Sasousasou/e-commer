<?php
include '../../config/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $status = $_POST["status"];
    $total = $_POST["total"];

    $sql = "INSERT INTO orders (user_id, status, total) VALUES ('$user_id', '$status', '$total')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index_orders.php?msg=Commande ajoutée avec succès");
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
    <title>Ajouter une Commande</title>
</head>
<body>
    <h1>Ajouter une Commande</h1>
    <form action="" method="POST">
        <label>Utilisateur (ID) :</label><br>
        <input type="number" name="user_id" required><br><br>
        <label>Statut :</label><br>
        <input type="text" name="status" required><br><br>
        <label>Total :</label><br>
        <input type="number" step="0.01" name="total" required><br><br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>

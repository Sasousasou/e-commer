<?php
include '../../config/db_conn.php';

$id = $_GET["id"];
$sql = "SELECT * FROM orders WHERE id=$id";
$result = mysqli_query($conn, $sql);
$order = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $status = $_POST["status"];
    $total = $_POST["total"];

    $sql = "UPDATE orders SET user_id='$user_id', status='$status', total='$total' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index_orders.php?msg=Commande mise à jour avec succès");
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
    <title>Modifier une Commande</title>
</head>
<body>
    <h1>Modifier une Commande</h1>
    <form action="" method="POST">
        <label>Utilisateur (ID) :</label><br>
        <input type="number" name="user_id" value="<?php echo $order['user_id']; ?>" required><br><br>
        <label>Statut :</label><br>
        <input type="text" name="status" value="<?php echo $order['status']; ?>" required><br><br>
        <label>Total :</label><br>
        <input type="number" step="0.01" name="total" value="<?php echo $order['total']; ?>" required><br><br>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>

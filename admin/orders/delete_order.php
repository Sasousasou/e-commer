<?php
include '../../config/db_conn.php';

$id = $_GET["id"];
$sql = "DELETE FROM orders WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: index_orders.php?msg=Commande supprimée avec succès");
    exit();
} else {
    echo "Erreur : " . mysqli_error($conn);
}
?>

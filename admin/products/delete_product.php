<?php
include '../../config/db_conn.php';

$id = $_GET["id"];
$sql = "DELETE FROM products WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php?msg=Produit supprimé avec succès");
    exit();
} else {
    echo "Erreur : " . mysqli_error($conn);
}
?>

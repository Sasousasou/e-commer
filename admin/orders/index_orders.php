<?php
include '../../config/db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Liste des Commandes</title>
</head>

<body>
    <h1>Liste des Commandes</h1>
    <a href="add_order.php">Ajouter une Commande</a>
    <table id="datatable" class="table" border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT orders.id, orders.total, users.nom, users.prenom, orders.status 
        FROM orders 
        INNER JOIN users ON orders.user_id = users.id";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row["nom"]; ?></td>
                    <td><?php echo $row["prenom"]; ?></td>
                    <td><?php echo $row["total"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    <td>
                        <a href="edit_order.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Editer</a>
                        <a href="delete_order.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>
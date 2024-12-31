<?php
include '../../config/db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des Utilisateurs</title>
</head>
<body>
    <h1>Liste des Utilisateurs</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>État</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $etat = $row['etat'] == 1 ? 'Actif' : 'Inactif';
                    $toggleAction = $row['etat'] == 1 ? 'Désactiver' : 'Activer';
                    $toggleValue = $row['etat'] == 1 ? 0 : 1;
                    
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nom']}</td>
                            <td>{$row['prenom']}</td>
                            <td>{$row['email']}</td>
                            <td>$etat</td>
                            <td>
                                <a href='toggle_user.php?id={$row['id']}&etat=$toggleValue'>$toggleAction</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Aucun utilisateur trouvé.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

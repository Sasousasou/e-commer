<?php
session_start();
include '../../config/db_conn.php';


if (isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit();
}

$error_msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);


        if ($user['etat'] == 0) {

            $error_msg = "Votre compte est désactivé. Veuillez contacter l'administrateur.";
        } else {

            if (password_verify($password, $user['password'])) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_nom'] = $user['nom'];
                $_SESSION['user_prenom'] = $user['prenom'];
                $_SESSION['user_role'] = $user['role'];


                if ($user['role'] == 1) {
                    header("Location: ../../admin/admin/index.php");
                } else {
                    header("Location: ../../users/index");
                }
                exit();
            } else {

                $error_msg = "Mot de passe incorrect.";
            }
        }
    } else {

        $error_msg = "Aucun utilisateur trouvé avec cet email.";
    }
}

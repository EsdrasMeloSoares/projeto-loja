<?php
session_start();
include "../config/db.php";
include "../verify/user_logged.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    $stmt->bind_result($id, $name, $hashed_password, $role);
    
    if ($stmt->fetch()) {
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['role'] = $role;

            if ($role == 1) {
                header("Location: ../dashboard/dashboard.php");
            } else {
                header("Location: ../views/home.php");
            }
            exit;
        } else {
            echo "Prencha todos os campos corretamente!";
        }
    } else {
        echo "Nenhum usuario encontrado";
    }

    $stmt->close();
    $conn->close();
}
?>

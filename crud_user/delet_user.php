<?php
    @session_start();
    include "../config/db.php";
    include "../verify/admin.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM users WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
            echo "Registro deletado com sucesso";
            header("Location: ../views_dashboard/usuarios.php");
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }
    ?>
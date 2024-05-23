<?php
@session_start();
include "../verify/admin.php"; 
include "../config/db.php";

if (isset($_GET['id'])) {
    $pedido_id = $_GET['id'];
    $sql = "UPDATE pedidos SET confirmado = TRUE WHERE id = '$pedido_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Pedido confirmado com sucesso!";
    } else {
        echo "Erro ao confirmar pedido: " . $conn->error;
    }
} else {
    echo "ID do pedido não especificado.";
}
?>

<?php
@session_start();
include "../verify/admin.php"; 
include "../config/db.php";

$sql = "SELECT pedidos.*, users.name AS name FROM pedidos JOIN users ON pedidos.usuario_id = users.id WHERE pedidos.confirmado = FALSE";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Pedidos Pendentes de Confirmação:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>Pedido #" . $row['id'] . " - Total: R$" . $row['total'] . " - Feito por: <a href='../dashboard/usuarios.php?user_id=" . $row['usuario_id'] . "'>" . $row['name'] . "</a> - <a href='../crud_produtos/confirmar_pedido.php?id=" . $row['id'] . "'>Confirmar Pedido</a></li>";

    }
    echo "</ul>";
} else {
    echo "Não há pedidos pendentes de confirmação.";
}
?>

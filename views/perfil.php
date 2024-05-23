<?php
session_start();
include "../config/db.php";
echo '<a href="../views/home.php">Home</a><br>';
echo '<a href="../actions/logout.php">Sair</a><br>';

$user_id = $_SESSION['user_id'];
$sql = "SELECT pedidos.*, produtos.nome AS nome FROM pedidos JOIN produtos ON pedidos.usuario_id = $user_id ORDER BY pedidos.data_pedido DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $pedido = $result->fetch_assoc();
    $status_pedido = $pedido['confirmado'] ? "Confirmado" : "Pendente de Confirmação";
    echo "Último pedido: {$pedido['nome']} em {$pedido['data_pedido']} $status_pedido";
} else {
    echo "Você ainda não fez nenhum pedido.<br>";
}
echo "<br>";
echo isset($_SESSION['role']) && $_SESSION['role'] === 1 ? "Usuário ADMIN <a href='../dashboard/dashboard.php'>Ir para dashboard</a>" : "Usuário padrão";
?>


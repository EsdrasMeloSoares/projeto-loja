<?php
@session_start();
include "../config/db.php";

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);
?>

<h1>Produtos</h1>
<?php while ($produto = $result->fetch_assoc()): ?>
    <div>
        <h2><?php echo $produto['nome']; ?></h2>
        <p><?php echo $produto['descricao']; ?></p>
        <p>R$ <?php echo $produto['preco']; ?></p>
        <a href="../views/carrinho.php?add=<?php echo $produto['id']; ?>">Adicionar ao carrinho</a>
    </div>
<?php endwhile; ?>


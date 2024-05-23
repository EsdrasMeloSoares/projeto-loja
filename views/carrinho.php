<?php
@session_start();
include "../config/db.php";

if (isset($_GET['add'])) {
    $produto_id = $_GET['add'];
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }
    if (!isset($_SESSION['carrinho'][$produto_id])) {
        $_SESSION['carrinho'][$produto_id] = 1;
    } else {
        $_SESSION['carrinho'][$produto_id]++;
    }
    header('Location: carrinho.php');
}

function gerarCodigoPIX($pedido_id, $total) {
    return "123456789765432" . $pedido_id;
}

if (isset($_POST['checkout'])) {
    $user_id = $_SESSION['user_id'];
    $data_pedido = date('Y-m-d H:i:s');
    $total = $_POST['total'];

    $endereco_entrega = isset($_POST['endereco_entrega']) ? $_POST['endereco_entrega'] : '';
    $metodo_pagamento = isset($_POST['metodo_pagamento']) ? $_POST['metodo_pagamento'] : '';

    $sql = "INSERT INTO pedidos (usuario_id, data_pedido, total, endereco_entrega, metodo_pagamento, confirmado) VALUES ('$user_id', '$data_pedido', '$total', '$endereco_entrega', '$metodo_pagamento', FALSE)";
    if ($conn->query($sql) === TRUE) {
        $pedido_id = $conn->insert_id;
        foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
            $result = $conn->query("SELECT preco FROM produtos WHERE id='$produto_id'");
            $produto = $result->fetch_assoc();
            $preco_unitario = $produto['preco'];
            $sql = "INSERT INTO itens_pedido (pedido_id, produto_id, quantidade, preco_unitario) VALUES ('$pedido_id', '$produto_id', '$quantidade', '$preco_unitario')";
            $conn->query($sql);
        }

        if ($metodo_pagamento == 'pix') {
            $codigo_pix = gerarCodigoPIX($pedido_id, $total);
            $conn->query("UPDATE pedidos SET codigo_pix='$codigo_pix' WHERE id='$pedido_id'");
        }

        unset($_SESSION['carrinho']);
        echo "Pedido realizado com sucesso! Verifique no seu <a href='../views/perfil.php'>perfil</a> se o pedido foi aprovado!";
        if (isset($codigo_pix)) {
            echo "<p>Código PIX para pagamento: <strong>$codigo_pix</strong></p>";
        }
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<h1>Carrinho de Compras</h1>
<?php if (!empty($_SESSION['carrinho'])): ?>
    <form method="POST" action="carrinho.php">
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($_SESSION['carrinho'] as $produto_id => $quantidade):
                    $result = $conn->query("SELECT * FROM produtos WHERE id='$produto_id'");
                    $produto = $result->fetch_assoc();
                    $total_item = $produto['preco'] * $quantidade;
                    $total += $total_item;
                ?>
                    <tr>
                        <td><?php echo $produto['nome']; ?></td>
                        <td><?php echo $quantidade; ?></td>
                        <td>R$ <?php echo $produto['preco']; ?></td>
                        <td>R$ <?php echo $total_item; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3">Total</td>
                    <td>R$ <?php echo $total; ?></td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="total" value="<?php echo $total; ?>">
        
        <div>
            <label for="endereco_entrega">Endereço de Entrega:</label>
            <input type="text" id="endereco_entrega" name="endereco_entrega" required>
        </div>
        <div>
            <label for="metodo_pagamento">Método de Pagamento:</label>
            <select id="metodo_pagamento" name="metodo_pagamento" required>
                <option value="pix">PIX</option>
            </select>
        </div>
        
        <button type="submit" name="checkout">Finalizar Compra</button>
    </form>
<?php else: ?>
    <p>Seu carrinho está vazio.</p>
<?php endif; ?>

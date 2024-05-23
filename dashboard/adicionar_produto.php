<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Produto</title>
</head>
<body>
    <h2>Cadastro de Produto</h2>
    <form action="../actions/adicionar_produto.php" method="post">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>
        </div>
        <div>
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" required>
        </div>
        <div>
            <label for="estoque">Estoque:</label>
            <input type="number" id="estoque" name="estoque" required>
        </div>
        <div>
            <button type="submit">Cadastrar Produto</button>
        </div>
    </form>
</body>
</html>

<?php
@session_start();
include "../config/db.php";
include "../verify/admin.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../source//style/read_users.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../path/to/styles.css">
    <title>Lista de Produtos</title>
</head>
<body>
    <div class="container">
    <?php
        $sql = "SELECT * FROM produtos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='user-table'><tr><th>ID</th><th>Nome</th><th>Estoque</th><th>Preço</th><th>Ações</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["nome"] . "</td>
                        <td>" . $row["estoque"] . "</td>
                        <td>" . $row["preco"] . "</td>
                        <td>
                            <a class='edit-link' href='../crud_produtos/update_produto.php?id=" . $row["id"] . "'>Editar</a>
                            <a class='delete-link' href='../crud_produtos/delet_produto.php?id=" . $row["id"] . "'>Excluir</a>
                        </td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "0 resultados";
        }

        $conn->close();
    ?>
    </div>
</body>
</html>

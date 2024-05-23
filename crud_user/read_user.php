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
    <title>Lista de Usuários</title>
</head>
<body>
    <div class="container">
    <?php
        $sql = "SELECT id, name, email, role FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='user-table'><tr><th>ID</th><th>Nome</th><th>Email</th><th>Nível</th><th>Ações</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . ($row["role"] == 1 ? "Admin" : "Usuário") . "</td>
                        <td>
                            <a class='edit-link' href='../crud/update_user.php?id=" . $row["id"] . "'>Editar</a>
                            <a class='delete-link' href='../crud/delet_user.php?id=" . $row["id"] . "'>Excluir</a>
                            <a class='delete-link' href='../dashboard/pedidos.php?id=" . $row["id"] . "'>Pedidos</a>
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

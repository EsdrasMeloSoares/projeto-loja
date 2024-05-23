<?php
@session_start();
include "../config/db.php";
include "../verify/admin.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM produtos WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();
    } else {
        echo "Produto Não Encontrado!";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $estoque = $_POST['estoque'];
    $preco = $_POST['preco'];

    $sql = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$preco' , estoque='$estoque'  WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar registro: " . $conn->error;
    }
    
    $conn->close();
    exit();
}
?>

<?php if (isset($produto)): ?>
<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
    Nome: <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required><br>
    Descrição: <input type="text" name="descricao" value="<?php echo $produto['descricao']; ?>" required><br>
    Estoque: <input type="text" name="estoque" value="<?php echo $produto['estoque']; ?>" required><br>
    Preço: <input type="text" name="preco" value="<?php echo $produto['preco']; ?>" required><br>
    <input type="submit" value="Atualizar">
</form>
<?php endif; ?>

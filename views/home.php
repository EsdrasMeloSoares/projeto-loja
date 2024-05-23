<?php
    session_start();
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <div>
            <ul>
                <li><a href="../venda/loja_produtos.php">Comprar</a></li>
                <?php
                if(!isset($_SESSION['user_id'])) {
                    echo '<li><a href="../views/login.php">Entrar</a></li>';
                }else{
                    echo '<li><a href="../views/perfil.php">Perfil</a></li>';
                }
                ?>
                <li><a href="../views/carrinho.php">Carrinho</a></li>
            </ul>
        </div>
    </header>
</body>
</html>
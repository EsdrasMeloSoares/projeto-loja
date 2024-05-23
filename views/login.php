<?php
session_start();
include "../config/db.php";
include "../verify/user_logged.php";

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../source/style/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="../actions/login.php" method="post">
        <input type="email" name="email" placeholder="Email" id="Email" required><br>
        <input type="password" name="password" placeholder="Password" id="Password" required><br>
        <input type="submit" value="Login">
        <a href="./register.php">Registrar-se</a>

        <button type="button" onclick="inputAdmin()">Logar como ADMIN</button>
        <button type="button" onclick="inputUsuario()">Logar como Usuario</button>
    </form>

    <script>
        function inputAdmin() {
            document.getElementById("Email").value = "admin@hits.com";
            document.getElementById("Password").value = "admin";
        }
  
        function inputUsuario() {
            document.getElementById("Email").value = "usuario@hits.com";
            document.getElementById("Password").value = "usuario";
        }
    </script>
</body>
</html>

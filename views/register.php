<?php
session_start();
include "../verify/user_logged.php";
?>

<form action="" method="post">
    <input type="text" name="name" id="">
    <input type="email" name="email" id="">
    <input type="password" name="password" id="">
    <input type="submit" value="Registrar-se">
</form>
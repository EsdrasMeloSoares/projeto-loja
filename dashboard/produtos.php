<?php
    session_start();
    include "../verify/admin.php"; 
    include "../include/menu_admin.php";
    printf(include "../crud_produtos/count.php"); 
    include "../crud_produtos/read_produto.php";
    
?>

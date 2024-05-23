<?php
if(isset($_SESSION['user_id'])) {
    header("Location: ../views_logged/home.php");
}
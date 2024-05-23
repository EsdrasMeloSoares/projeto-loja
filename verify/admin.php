<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 1) {
    header("Location: ../views/home.php");
    exit();
}
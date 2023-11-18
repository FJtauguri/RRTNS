<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id']) || !isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header('location:index.php');
    exit();
}

$id_session = $_SESSION['id'];

?>
<?php 
session_start();

if (!isset($_SESSION['id'])){
header('location:student');
}else{
    header('location:student/index.php');
}



?>
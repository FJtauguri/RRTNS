<?php 
session_start();
if (!isset($_SESSION['id'])){
header('location:index.php');
}else{
    if(!isset($_SESSION['user'])){
        header('location:index.php');
    }else{
        if($_SESSION['user']!='student'){
            header('location:index.php');
        }
    }
}
$id_session=$_SESSION['id'];
?>
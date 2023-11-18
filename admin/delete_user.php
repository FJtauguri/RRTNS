<?php 

include('include/dbcon.php');

$get_id=$_GET['user_id'];
mysqli_query($con,"UPDATE `user` SET `status2` = '1' where user_id = '$get_id'")or die(mysqli_error());
// mysqli_query($con,"UPDATE from user where user_id = '$get_id' ")or die(mysqli_error());

header('location:user.php');
?>
<?php 


include('include/dbcon.php');

$get_id=$_GET['admin_id'];
mysqli_query($con,"UPDATE `admin` SET `status` = '0' where admin_id = '$get_id'")or die(mysqli_error());

header('location:recycle_bin_admin.php');
?>
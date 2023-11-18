<?php require('include/dbcon.php'); ?>
<?php 

require('session.php'); 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = mysqli_real_escape_string($con, $_POST['current_password']);
    $new_password = mysqli_real_escape_string($con, $_POST['password']);

    
    $user_id = $_SESSION['id']; 
    $query = "SELECT password FROM user WHERE user_id = ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $hashed_password);
            mysqli_stmt_fetch($stmt);

            
            if (password_verify($current_password, $hashed_password)) {
            
                $hashed_new_password = password_hash($new_password, PASSWORD_BCRYPT);

            
                $update_query = "UPDATE user SET password = ? WHERE user_id = ?";
                $update_stmt = mysqli_prepare($con, $update_query);

                if ($update_stmt) {
                    mysqli_stmt_bind_param($update_stmt, 'si', $hashed_new_password, $user_id);
                    $result = mysqli_stmt_execute($update_stmt);

                    if ($result) {
                        echo "Password updated successfully!";
                    } else {
                        echo "Error updating password: " . mysqli_error($con);
                    }

                    mysqli_stmt_close($update_stmt);
                } else {
                    echo "Error in preparing the update statement: " . mysqli_error($con);
                }
            } else {
                echo "Current password is incorrect!";
            }
        } else {
            echo "User not found!";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error in preparing the statement: " . mysqli_error($con);
    }

    mysqli_close($con);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System</title>
    <?php include 'relDashboad.php'; ?>
    
    <style>
        .error-message {
            color: red;
        }
    </style>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <?php include('sidebar_menu.php'); ?>
            <?php include('top_nav.php'); ?>

            <!-- page content -->
            <div class="right_col d-flex" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                                <small>Home /</small> Account Setting
                            </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row" style="height: 75vh;">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="d-flex" style="height: 50vh; display: flex; justify-content: center; align-items: center;">
                                <form method="post" class="w-50" style="">
                                    <div class="mb-3 current-password">
                                        <label class="m-0" for="current_password">Current Password</label>
                                        <input id="current_password" type="text" name="current_password" class="form-control" maxlength="8">
                                    </div>
                                    <div class="mb-3 new-password">
                                        <label class="m-0 mt-4" for="password">Password</label>
                                        <input id="password" type="text" name="password" class="form-control" maxlength="8">
                                    </div>
                                    <div class="mb-3 new-repassword">
                                        <label class="m-0 mt-4" for="repassword">Confirm Password</label>
                                        <input id="repassword" type="text" name="repassword" class="form-control" maxlength="8">
                                        <p id="password-error" class="error-message"></p>
                                    </div>
                                    <button class="mt-4 btn btn-sm btn-block btn-outline-primary" style="margin: 2rem 0 0 0;">Done</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!---end-->
                <!-- /page content -->

                <!-- footer content -->
                <footer class="align-items-end">
                    <div class="">
                        <p class="text-center">Library Management System
                            <span class="lead"> <i class="fa fa-university"></i> R Tangson Sr. National High
                                School
                            </span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
    </div>

    <!-- chart js -->
    <!-- <script src="js/chartjs/chart.min.js"></script> -->

    <!-- bootstrap progress js -->
    <!-- <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script> -->

    <!-- icheck -->
    <!-- <script src="js/icheck/icheck.min.js"></script>
    <script src="js/custom.js"></script> -->

    <!-- daterangepicker -->
    <!-- <script type="text/javascript" src="js/moment.min2.js"></script>
    <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script> -->

    <!-- input mask -->
    <!-- <script src="js/input_mask/jquery.inputmask.js"></script> -->

    <!-- knob -->
    <!-- <script src="js/knob/jquery.knob.min.js"></script> -->

    <!-- range slider -->
    <!-- <script src="js/ion_range/ion.rangeSlider.min.js"></script> -->

    <!-- color picker -->
    <!-- <script src="js/colorpicker/bootstrap-colorpicker.js"></script>
    <script src="js/colorpicker/docs.js"></script> -->

    <!-- image cropping -->
    <!-- <script src="js/cropping/cropper.min.js"></script>
    <script src="js/cropping/main2.js"></script> -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var password = document.getElementById('password');
            var repassword = document.getElementById('repassword');
            var passwordError = document.getElementById('password-error');

            repassword.addEventListener('input', function () {
                if (password.value !== repassword.value) {
                    passwordError.textContent = 'Passwords do not match';
                } else {
                    passwordError.textContent = 'Nice move!';
                }
            });
        });
    </script>

    <?php
    // include '../components/assets/jquery/BahalaNaSiBatMan.php';
    // include 'scripts.php'; 
    include 'scriptDashboard.php';
    ?>
</body>

</html>
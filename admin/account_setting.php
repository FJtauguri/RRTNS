<?php
require('../database/dbcon.php');
include('session.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $current_password = mysqli_real_escape_string($con, $_POST['current_password']);
    $new_password = mysqli_real_escape_string($con, $_POST['password']);
    $repassword = mysqli_real_escape_string($con, $_POST['repassword']);

    if (isset($_SESSION['id'])) {
        $admin_id = $_SESSION['id'];

        // Fetch hashed password from the 'admin' table
        $query = "SELECT password FROM admin WHERE admin_id = ?";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'i', $admin_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) > 0) {
                mysqli_stmt_bind_result($stmt, $hashed_password);
                mysqli_stmt_fetch($stmt);

                // Verify if the entered currentpassword matches the hashed password
                if (password_verify($current_password, $hashed_password)) {
                    // Check if the new password and confirm password match
                    if ($new_password === $repassword) {
                        // for hashing
                        $hashed_new_password = password_hash($new_password, PASSWORD_BCRYPT);

                        // Update the password in the 'admin' table
                        $update_query = "UPDATE admin SET password = ? WHERE admin_id = ?";
                        $update_stmt = mysqli_prepare($con, $update_query);

                        if ($update_stmt) {
                            mysqli_stmt_bind_param($update_stmt, 'si', $hashed_new_password, $admin_id);
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
                        echo "New password and confirm password do not match!";
                    }
                } else {
                    echo "Current password is incorrect!";
                }
            } else {
                echo "Admin not found!";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error in preparing the statement: " . mysqli_error($con);
        }
    } else {
        echo "Session variable 'admin_id' is not set.";
    }

    mysqli_close($con);
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System - Account Setting</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.1.css">
    <link href="css/icheck/flat/green.css" rel="stylesheet">
    <link href="css/floatexamples.css" rel="stylesheet" type="text/css">
    <link href="css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">
    <link href="css/select/select2.min.css" rel="stylesheet">

    <!-- ion_range -->
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />

    <!-- colorpicker -->
    <link href="css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <link id="bootstrap-style" href="css/slide.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/custom.js"></script>

    <script src="js/nprogress.js"></script>

    <!-- Custome CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">

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
            <div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">
                        <h3>
                            <small>Home /</small> Account Setting
                        </h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="row" style="height: 75vh;">
                                <div class="col-md-12 col-sm-12 col-xs-12" style="display: grid; align-items: center;">
                                    <form method="post" enctype=multipart/form-data class="w-100" style="">
                                        <div class="d-flex row">

                                            <!-- LEFT -->
                                            <div class="col-md-4 col-6">
                                                <div class="mb-3">
                                                    <h3>Personal Information</h3>
                                                </div>
                                                <div class="mb-3 current-password">
                                                    <label class="m-0" for="fname">First Name</label>
                                                    <input id="first_name" type="text" name="fname" class="form-control"
                                                        maxlength="50">
                                                </div>
                                                <div class="mb-3 current-password">
                                                    <label class="m-0" for="mname">Middle Name</label>
                                                    <input id="middle_name" type="text" name="mname"
                                                        class="form-control" maxlength="1">
                                                </div>
                                                <div class="mb-3 current-password">
                                                    <label class="m-0" for="lname">Last Name</label>
                                                    <input id="last_name" type="text" name="lname" class="form-control"
                                                        maxlength="50">
                                                </div>
                                                <div class="mb-3 current-password">
                                                    <label class="m-0" for="image">Profile Image</label>
                                                    <input id="profile_image" type="file" name="image"
                                                        class="form-control">
                                                </div>
                                                <button class="mt-4 btn btn-sm btn-block btn-outline-primary"
                                                    style="margin: 2rem 0 0 0;">Confirm
                                                </button>
                                            </div>

                                            <!-- RIGHT -->
                                            <div class="col-md-8 col-12 bg-dark"
                                                style="display: grid; justify-content: center;">
                                                <div class="col-6"
                                                    style="justify-items: center; display: grid; padding: 20px; border: 1px solid #800000;">
                                                    <div class="mb-3">
                                                        <h3>Change Password</h3>
                                                    </div>
                                                    <div class="mb-3 current-password" style="width: 200px;">
                                                        <label class="m-0" for="current_password">Current
                                                            Password</label>
                                                        <input id="current_password" type="text" name="current_password"
                                                            class="form-control" maxlength="8">
                                                    </div>
                                                    <div class="mb-3 new-password" style="width: 200px;">
                                                        <label class="m-0 mt-4" for="password">Password</label>
                                                        <input id="password" type="text" name="password"
                                                            class="form-control" maxlength="8">
                                                    </div>
                                                    <div class="mb-3 new-repassword" style="width: 200px;">
                                                        <label class="m-0 mt-4" for="repassword">Confirm
                                                            Password</label>
                                                        <input id="repassword" type="text" name="repassword"
                                                            class="form-control" maxlength="8">
                                                        <p id="password-error" class="error-message"></p>
                                                    </div>
                                                    <button class="mt-4 btn btn-sm btn-block btn-outline-primary"
                                                        style="margin: 2rem 0 0 0; width: 200px;">Confirm
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php #include('footer_v.0.0.2.php'); ?>

                <!-- Password sync -->
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

                <!-- Password and Button handler -->
                <script>
                    $(document).ready(function () {
                        $("#repassword").on("input", function () {
                            var password = $("#password").val();
                            var confirmPassword = $("#repassword").val();
                            var passwordError = $("#password-error");

                            if (password !== confirmPassword) {
                                passwordError.text("Passwords do not match");
                                $("button[type='submit']").prop("disabled", true);
                                echo 'we';
                            } else {
                                passwordError.text("Nice move!");
                                $("button[type='submit']").prop("disabled", false);
                            }
                        });
                    });
                </script>
</body>

</html>

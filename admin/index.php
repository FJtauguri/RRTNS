<?php
include('../database/dbcon.php');

if (isset($_POST['login'])) {
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);

    $login_query = mysqli_query($con, "SELECT * FROM admin WHERE username='$username'");
    $count = mysqli_num_rows($login_query);
    $row = mysqli_fetch_array($login_query);

    if ($count > 0 && password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['id'] = $row['admin_id'];
        $_SESSION['user'] = 'admin';
        echo "<script>window.location='home.php'</script>";
    } else { ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="alert alert-danger text-center mt-3">
                        <h3 class="blink_text">Access Denied</h3>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System</title>
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico">
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>

<body style="background-color: #666666;">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="post" class="login100-form validate-form">
                    <span class="login100-form-title p-b-43">
                        <div>
                            <h1><i class="fa fa-university"></i> R Tangson Sr. National High School</h1>
                        </div>
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="username" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Username</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>
                        <div>
                            <a href="#" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" name="login" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="row text-center mt-3">
                        <div class="col-sm-12">
                            <p class="text-light">©
                                <?php echo date('Y'); ?> <i class="fa fa-book"></i> Library Management System
                            </p>
                        </div>
                    </div>
                </form>
                <div class="login100-more" style="background-image: url('assets/images/lib.jpg');">
                </div>
            </div>
        </div>
    </div>

    <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="assets/vendor/animsition/js/animsition.min.js"></script>
    <script src="assets/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/select2/select2.min.js"></script>
    <script src="assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="assets/vendor/countdowntime/countdowntime.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
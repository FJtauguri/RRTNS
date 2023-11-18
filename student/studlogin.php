<?php
// FRONT
include '../components/data/data.php';

// Back

include '../database/dbcon.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $school_number = mysqli_real_escape_string($con, $_POST['school_number']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = mysqli_query($con, "SELECT * FROM account WHERE school_number='$school_number'");
    $count = mysqli_num_rows($login_query);
    $row = mysqli_fetch_array($login_query);

    if ($count > 0 && password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user'] = 'student';
        $id_session = $_SESSION['id'];
        header("Location: borrowed_book.php");
        exit();
    } else {
        echo '<div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div class="alert alert-danger text-center mt-3">
                            <h3 class="blink_text">Access Denied</h3>
                        </div>
                    </div>
                </div>
              </div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Login Account</title>

    <!-- Custom Style -->
    <link rel="stylesheet" href="../components/assets/style/style.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Animation -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css"> -->

    <style>
        body {
            background-image: url('<?php echo $img1; ?>');
        }
    </style>

</head>

<body>
    <div class="row bg-white">
        <div class="container-fluid h-100 d-flex">
            <div class="box p-4">
                <div class="header">
                    <h4 class="register-content">Login</h4>
                </div>
                <form method="post">
                    <div class="fieldInput d-block">
                        <div class="input-field mb-3 firstname">
                            <label class="m-0" for="school_number">School Number</label>
                            <input id="school_number" type="number" name="school_number">
                        </div>
                        <div class="input-field mb-3 password">
                            <label class="m-0" for="password">Password</label>
                            <input id="password" type="password" name="password" maxlength="8">
                        </div>
                    </div>
                    <button class="mt-4 btn btn-sm btn-block btn-outline-primary ">Login</button>
                </form>
            </div>
        </div>
    </div>


    <!-- JS Script -->
    <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
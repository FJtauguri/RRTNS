<?php
// FRONT
include '../components/data/data.php';

// Back

include '../database/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $school_number = mysqli_real_escape_string($con, $_POST['school_number']);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $password = mysqli_real_escape_string($con, $_POST['pwd']);
    $role = mysqli_real_escape_string($con, $_POST['role']);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // get the current date
    $user_added = date("Y-m-d H:i:s");

    // SQL query to insert data into 'user' table
    $query = "INSERT INTO user (school_number, firstname, lastname, password, type, user_added) VALUES (?, ?, ?, ?, ?, ?)";
    
    // Create a prepared statement
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, 'ssssss', $school_number, $fname, $lname, $hashedPassword, $role, $user_added);

        // Execute the prepared statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Registration successful
            // echo "Registration successful!";
            header('Location: index.php');
        } else {
            // Registration failed
            echo "Error: " . mysqli_error($con);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error in preparing the statement
        echo "Error: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Create Account</title>

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
                    <h4 class="register-content">Register</h4>
                </div>
                <form method="post">
                    <div class="fieldInput d-block">
                        <div class="input-field mb-3 firstname">
                            <label class="m-0" for="school_number">School Number</label>
                            <input type="number" name="school_number">
                        </div>
                        <div class="input-field mb-3 firstname">
                            <label class="m-0" for="fname">First Name</label>
                            <input type="text" name="fname" maxlength="50">
                        </div>
                        <div class="input-field mb-3 lastname">
                            <label class="m-0" for="lname">Last Name</label>
                            <input type="text" name="lname" maxlength="50">
                        </div>
                        <div class="input-field mb-3 password">
                            <label class="m-0" for="fname">Password</label>
                            <input type="password" name="pwd" maxlength="8">
                        </div>

                        <!-- <div class="input-field mb-3 role">
                            <label class="m-0" for="role">Role</label>
                            <div class="dropdown">
                                <select class="form-control animated fadeInDown" name="role">
                                    <option value="student">Student</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="input-field mb-3 role" style="display: none;">
                            <input type="text" name="role" value="Student" hidden>
                        </div>

                        <div>
                            <input type="date" hidden>
                        </div>
                    </div>
                    <button class="mt-4 btn btn-sm btn-block btn-outline-primary">Register</button>
                </form>
            </div>
        </div>
    </div>


    <!-- JS Script -->
    <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
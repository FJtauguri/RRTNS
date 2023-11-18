<?php

include('../database/dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $result = mysqli_query($con, "SELECT * FROM admin WHERE username='$username'");
    $row = mysqli_num_rows($result);

    if ($row > 0) {
        echo "<script>alert('Username already taken!'); window.location='add_admin.php'</script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $profile = $_FILES["image"]["name"];

        if (!empty($profile)) {
            move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
        }

        mysqli_query($con, "INSERT INTO admin (firstname, middlename, lastname, username, password, admin_image, admin_type, admin_added)
            VALUES ('$firstname', '$middlename', '$lastname', '$username', '$hashed_password', '$profile', 'Encoder', NOW())") or die(mysqli_error());

        echo "<script>alert('Account successfully added!'); window.location='admin.php'</script>";
    }
}


include('header.php');

?>

<div class="page-title">
    <div class="title_left">
        <h3>
            <small>Home / Admin Profile /</small> Add Admin
        </h3>
    </div>
</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-plus"></i> Add Admin</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <!-- If needed 
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li>
                        -->
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <!-- content starts here -->

                <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-4" for="first-name">First Name <span class="required"
                                style="color:red;">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" name="firstname" id="first-name2" required="required"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="first-name">Middle Name
                        </label>
                        <div class="col-md-3">
                            <input type="text" name="middlename" placeholder="MI / Middle Name....." id="first-name2"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="last-name">Last Name <span class="required"
                                style="color:red;">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" name="lastname" id="last-name2" required="required"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="last-name">User Name <span class="required"
                                style="color:red;">*</span>
                        </label>
                        <div class="col-md-4">
                            <input type="text" name="username" id="last-name2" required="required"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="last-name">Password <span class="required"
                                style="color:red;">*</span>
                        </label>
                        <div class="col-md-4">
                            <input type="password" name="password" id="last-name2" required="required"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="last-name">Confirm Password <span class="required"
                                style="color:red;">*</span>
                        </label>
                        <div class="col-md-4">
                            <input type="password" name="confirm_password" id="last-name2" required="required"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="last-name">Admin Image
                        </label>
                        <div class="col-md-4">
                            <input type="file" style="height:44px;" name="image" id="last-name2"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <a href="admin.php"><button type="button" class="btn btn-primary"><i
                                        class="fa fa-times-circle-o"></i> Cancel</button></a>
                            <button type="submit" name="submit" class="btn btn-success"><i
                                    class="fa fa-plus-square"></i> Submit</button>
                        </div>
                    </div>
                </form>

                <?php



                ?>

                <!-- content ends here -->
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
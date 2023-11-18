<!-- sidebar navigation -->
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="home.php" class="site_title"><i class="fa fa-university"></i> <span>R Tangson Sr. NHS</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu prile quick info -->
        <div class="profile">
            <?php
            include('include/dbcon.php');
            $user_query = mysqli_query($con, "select *  from user where user_id='$id_session'") or die(mysqli_error());
            $row = mysqli_fetch_array($user_query); {
                ?>
                <div class="profile_pic">
                    <?php if ($row['user_image'] != ""): ?>
                        <img src="upload/<?php echo $row['user_image']; ?>" style="height:65px; width:75px;"
                            class="img-thumbnail profile_img">
                    <?php else: ?>
                        <img src="images/user.png" style="height:65px; width:75px;" class="img-circle profile_img">
                    <?php endif; ?>
                </div>

                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>
                        <?php echo $row['firstname']; ?>
                    </h2>
                </div>
            <?php } ?>
        </div>
        <!-- /menu prile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3 style="margin-top:85px;">File Information</h3>
                <div class="separator"></div>
                <ul class="nav side-menu">
                    <!-- <li>
                            <a href="home.php"><i class="fa fa-home"></i> Home</a>
                        </li> -->
                    <li>
                        <a href="borrowed_book.php"><i class="fa fa-book"></i> Borrowed Books</a>
                    </li>
                    <li>
                        <a href="book.php"><i class="fa fa-book"></i> Available Books</a>
                    </li>
                    <li>
                        <a href="account.php"><i class="fa fa-book"></i> Account Setting</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
<!-- end of sidebar navigation -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System</title>

    <!-- Bootstrap outer link -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->

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
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
    <script src="js/nprogress.js"></script>

    <script>
        NProgress.start();
    </script>


    <!-- Custome CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body class="nav-md">
    <?php require('../database/dbcon.php'); ?>
    <?php require('session.php'); ?>
    <div class="container body">
        <div class="main_container">
            <?php include('sidebar_menu.php'); ?>
            <?php include('top_nav.php'); ?>

            <!-- page content -->
            <div class="right_col" role="main">
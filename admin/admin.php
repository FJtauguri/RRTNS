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

				<div class="page-title">
					<div class="title_left">
						<h3>
							<small>Home /</small> Admin Profile
						</h3>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2><i class="fa fa-info"></i> Admin Information</h2>
								<ul class="nav navbar-right panel_toolbox">
									<?php
									$user_query = mysqli_query($con, "select * from admin where admin_id = '$id_session'") or die(mysqli_error());
									$user_row = mysqli_fetch_array($user_query);
									$admin_type = $user_row['admin_type'];
									?>
									<?php if ($admin_type == 'Super Admin') {
										?>
										<li>
											<a href="add_admin.php" style="background:none;">
												<button class="btn btn-primary"><i class="fa fa-plus"></i> Add
													Admin</button>
											</a>
										</li>
										<li>
											<a href="recycle_bin_admin.php" style="background:none;">
												<button class="btn btn-success"><i class="fa fa-repeat"></i> Recycle
													Bin</button>
											</a>
										</li>
									<?php } ?>
									<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

									<li><a class="close-link"><i class="fa fa-close"></i></a></li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<!-- content starts here -->

								<div class="table-responsive">
									<table cellpadding="0" cellspacing="0" border="0"
										class="table table-striped table-bordered" id="example">

										<thead>
											<tr>
												<th>Image</th>
												<th>Full Name</th>
												<!---	<th>User Type</th>	-->
												<th>Action</th>
											</tr>
										</thead>
										<tbody>

											<?php
											$result = mysqli_query($con, "select * from admin WHERE status=0 order by admin_id ASC") or die(mysqli_error());
											while ($row = mysqli_fetch_array($result)) {
												$id = $row['admin_id'];
												?>
												<tr>
													<td>
														<?php if ($row['admin_image'] != ""): ?>
															<img src="upload/<?php echo $row['admin_image']; ?>" width="100px"
																height="100px"
																style="border:4px groove #CCCCCC; border-radius:5px;">
														<?php else: ?>
															<img src="images/user.png" width="100px" height="100px"
																style="border:4px groove #CCCCCC; border-radius:5px;">
														<?php endif; ?>
													</td>
													<td>
														<?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?>
													</td>
													<td>
														<a class="btn btn-primary" for="ViewAdmin"
															href="view_admin.php<?php echo '?admin_id=' . $id; ?>">
															<i class="fa fa-search"></i>
														</a>
														<a class="btn btn-warning" for="ViewAdmin"
															href="edit_admin.php<?php echo '?admin_id=' . $id; ?>">
															<i class="fa fa-edit"></i>
														</a>
														<a class="btn btn-danger" for="DeleteAdmin"
															href="#delete<?php echo $id; ?>" data-toggle="modal"
															data-target="#delete<?php echo $id; ?>">
															<i class="glyphicon glyphicon-trash icon-white"></i>
														</a>

														<!-- delete modal admin -->
														<div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1"
															role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title" id="myModalLabel"><i
																				class="glyphicon glyphicon-user"></i> Admin
																		</h4>
																	</div>
																	<div class="modal-body">
																		<div class="alert alert-danger">
																			Are you sure you want to delete?
																		</div>
																		<div class="modal-footer">
																			<button class="btn btn-inverse"
																				data-dismiss="modal" aria-hidden="true"><i
																					class="glyphicon glyphicon-remove icon-white"></i>
																				No</button>
																			<a href="delete_admin.php<?php echo '?admin_id=' . $id; ?>"
																				style="margin-bottom:5px;"
																				class="btn btn-primary"><i
																					class="glyphicon glyphicon-ok icon-white"></i>
																				Yes</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>

								<!-- content ends here -->
							</div>
						</div>
					</div>
				</div>

				<?php include('footer.php'); ?>
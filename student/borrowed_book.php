<?php require ('include/dbcon.php'); ?>
<?php require ('session.php'); ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Library Management System</title>
	<?php include 'relDashboad.php';?>
</head>
<body class="nav-md">
	<div class="container body">
		<div class="main_container">

			<?php include('sidebar_menu.php'); ?>
			<?php include('top_nav.php'); ?>

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">

					<div class="page-title">
						<div class="title_left">
							<h3>
								<small>Home /</small> Borrowed Books
							</h3>
						</div>
					</div>
					<div class="clearfix"></div>

					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<div class="col-xs-3">
										<form method="POST" action="sort_borrowed_book.php">
											<input type="date" class="form-control" name="sort"
												value="<?php echo date('Y-m-d'); ?>">
											<button type="submit" class="btn btn-primary btn-outline"
												style="margin:-34px -195px 0px 0px; float:right;" name="ok"><i
													class="fa fa-calendar-o"></i> Sort By Date Borrowed</button>
										</form>
									</div>
									<?php
									$id = $_SESSION['id'];
									$count = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM `borrow_book` WHERE user_id = '$id'")) or die(mysqli_error());
									$count1 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM `borrow_book` WHERE `borrowed_status` = 'borrowed' AND user_id = '$id' ")) or die(mysqli_error());
									$count2 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM `borrow_book` WHERE `borrowed_status` = 'returned' AND user_id = '$id' ")) or die(mysqli_error());
									?>
									<span style="float:left; margin-left:358px;">
										<!---	<a href="borrowed_book.php"><button class="btn btn-primary"><i class="fa fa-info"></i> All Records (<?php /// echo $count['total']; ?>)</button></a> -->
										<!-- <a href="borrowed_book.php"><button class="btn btn-success btn-outline"><i class="fa fa-info"></i> Borrowed Books (<?php echo $count1['total']; ?>)</button></a> -->
										<!-- <a href="returned.php"><button class="btn btn-danger btn-outline"><i class="fa fa-info"></i> Returned Books (<?php echo $count2['total']; ?>)</button></a> -->
									</span>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<!-- content starts here -->

									<div class="table-responsive">
										<table cellpadding="0" cellspacing="0" border="0"
											class="table table-striped table-bordered" id="example">

											<thead>
												<tr>
													<th>Barcode</th>
													<th>Borrower Name</th>
													<th>Title</th>
													<th>Date Borrowed</th>
													<th>Due Date</th>
													<th>Date Returned</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>

												<?php
												$borrow_query = mysqli_query($con, "SELECT * FROM borrow_book
									LEFT JOIN book ON borrow_book.book_id = book.book_id 
									LEFT JOIN user ON borrow_book.user_id = user.user_id 
									WHERE borrow_book.user_id = '$id'
									ORDER BY borrow_book.borrow_book_id DESC") or die(mysqli_error());
												$borrow_count = mysqli_num_rows($borrow_query);
												while ($borrow_row = mysqli_fetch_array($borrow_query)) {
													$id = $borrow_row['borrow_book_id'];
													$book_id = $borrow_row['book_id'];
													$user_id = $borrow_row['user_id'];
													?>
													<tr>
														<td>
															<?php echo $borrow_row['book_barcode']; ?>
														</td>
														<td style="text-transform: capitalize">
															<?php echo $borrow_row['firstname'] . " " . $borrow_row['lastname']; ?>
														</td>
														<td style="text-transform: capitalize">
															<?php echo $borrow_row['book_title']; ?>
														</td>
														<td>
															<?php echo date("M d, Y h:m:s a", strtotime($borrow_row['date_borrowed'])); ?>
														</td>
														<td>
															<?php echo date("M d, Y h:m:s a", strtotime($borrow_row['due_date'])); ?>
														</td>
														<td>
															<?php echo ($borrow_row['date_returned'] == "0000-00-00 00:00:00") ? "Pending" : date("M d, Y h:m:s a", strtotime($borrow_row['date_returned'])); ?>
														</td>
														<?php
														if ($borrow_row['borrowed_status'] != 'returned') {
															echo "<td class='alert alert-success'>" . $borrow_row['borrowed_status'] . "</td>";
														} else {
															echo "<td  class='alert alert-danger'>" . $borrow_row['borrowed_status'] . "</td>";
														}
														?>
													</tr>
												<?php }

												?>
											</tbody>
										</table>
									</div>

									<!-- content ends here -->
								</div>
							</div>
						</div>
					</div>
				</div><!---end-->
				<!-- /page content -->

				<!-- footer content -->
				<footer>
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

			</div><!---end right col-->
		</div><!---end main container-->
	</div><!---end container body-->

	<!-- chart js -->
	<script src="js/chartjs/chart.min.js"></script>
	<!-- bootstrap progress js -->
	<script src="js/progressbar/bootstrap-progressbar.min.js"></script>
	<script src="js/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- icheck -->
	<script src="js/icheck/icheck.min.js"></script>
	<script src="js/custom.js"></script>
	<!-- daterangepicker -->
	<script type="text/javascript" src="js/moment.min2.js"></script>
	<script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
	<!-- input mask -->
	<script src="js/input_mask/jquery.inputmask.js"></script>
	<!-- knob -->
	<script src="js/knob/jquery.knob.min.js"></script>
	<!-- range slider -->
	<script src="js/ion_range/ion.rangeSlider.min.js"></script>
	<!-- color picker -->
	<script src="js/colorpicker/bootstrap-colorpicker.js"></script>
	<script src="js/colorpicker/docs.js"></script>

	<!-- image cropping -->
	<script src="js/cropping/cropper.min.js"></script>
	<script src="js/cropping/main2.js"></script>




	<?php 
	include '../components/assets/jquery/BahalaNaSiBatMan.php';
	include 'scripts.php'; 
	include 'scriptDashboard.php';
	?>
</body>

</html>
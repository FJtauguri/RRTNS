<?php include ('header.php'); ?>

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
		<form method="POST">
		<input type="date" name="sort" class="form-control" value="<?php echo (isset($_POST['sort'])) ? $_POST['sort']: ''; ?>">
		<button type="submit" class="btn btn-primary" style="margin:-34px -195px 0px 0px; float:right;" name="ok"><i class="fa fa-calendar-o"></i> Sort By Date Borrowed</button>
		</form>
	</div>
					<?php 
					$id = $_SESSION['id'];
					$count = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book` WHERE user_id = '$id'")) or die(mysqli_error());
					$count1 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book` WHERE `borrowed_status` = 'borrowed' AND user_id = '$id' ")) or die(mysqli_error());
					$count2 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book` WHERE `borrowed_status` = 'returned' AND user_id = '$id' ")) or die(mysqli_error());
					?>
						<span style="float:left; margin-left:358px;">
						<!---	<a href="borrowed_book.php"><button class="btn btn-primary"><i class="fa fa-info"></i> All Records (<?php /// echo $count['total']; ?>)</button></a> -->
						</span>
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
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
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
<?php if (isset($_POST['ok'])) {
$sort=$_POST['sort'];
 ?>
							
							<?php
								$borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
									LEFT JOIN book ON borrow_book.book_id = book.book_id 
									LEFT JOIN user ON borrow_book.user_id = user.user_id 
									WHERE date_borrowed between '$sort 00:00:01' and '$sort 23:59:59' 
									AND borrow_book.user_id = '$id'
									 ") or die(mysqli_error());
								$borrow_count = mysqli_num_rows($borrow_query);
								while($borrow_row = mysqli_fetch_array($borrow_query)){
									$id = $borrow_row ['borrow_book_id'];
									$book_id = $borrow_row ['book_id'];
									$user_id = $borrow_row ['user_id'];
							?>
							<tr>
								<td><?php echo $borrow_row['book_barcode']; ?></td>
								<td style="text-transform: capitalize"><?php echo $borrow_row['firstname']." ".$borrow_row['lastname']; ?></td>
								<td style="text-transform: capitalize"><?php echo $borrow_row['book_title']; ?></td>
								<td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?></td>
								<td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['due_date'])); ?></td>
								<td><?php echo ($borrow_row['date_returned'] == "0000-00-00 00:00:00") ? "Pending" : date("M d, Y h:m:s a",strtotime($borrow_row['date_returned'])); ?></td>
								<?php
									if ($borrow_row['borrowed_status'] != 'returned') {
										echo "<td class='alert alert-success'>".$borrow_row['borrowed_status']."</td>";
									} else {
										echo "<td  class='alert alert-danger'>".$borrow_row['borrowed_status']."</td>";
									}
								?>
							</tr>
<?php } 
									
}
?>
							</tbody>
							</table>
						</div>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>
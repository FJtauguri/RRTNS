<?php include ('header.php'); ?>

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
                       
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
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
							$result= mysqli_query($con,"select * from admin WHERE status=1 order by admin_id ASC") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['admin_id'];
							?>
							<tr>
								<td>
									<?php if($row['admin_image'] != ""): ?>
									<img src="upload/<?php echo $row['admin_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php else: ?>
									<img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php endif; ?>	
								</td> 
								<td><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td>
							<!---	<td><?php // echo $row['admin_type']; ?></td>	-->
								<td>
									
									<a class="btn btn-info" for="DeleteAdmin" href="#recover<?php echo $id;?>" data-toggle="modal" data-target="#recover<?php echo $id;?>">
										<i class="glyphicon glyphicon-repeat icon-white"></i>
									</a>
			
									<!-- recover modal admin -->
									<div class="modal fade" id="recover<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Admin</h4>
										</div>
										<div class="modal-body">
												<div class="alert alert-danger">
												Are you sure you want to Recover this user?
												</div>
												<div class="modal-footer">
												<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
												<a href="recover_admin.php<?php echo '?admin_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
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

<?php include ('footer.php'); ?>

								<?php
									include('connection.php');
								       $s_error="";
								       if($_POST)
									   {

									      isset($_POST['name']) ? $name=$_POST['name']:$name="";
										  if($name=="")
										  {
											  echo 'please enter the name for search';
										  }
										$result = mysqli_query($conn, "select * from users where name='$name'");
										 $ct=mysqli_num_rows($result);
										 if($ct>0)
										 {
										$s_error="";
										 }
										  else
										  {
                                           $s_error="not found";
										  }
									   }
										?>

<?php include('include\session.php')?>
<?php include('include\header.php')?>
<?php include('include/header2.php')?>
<div class="col-md-10 constpad30">
		<?php include('include/navbar.php') ?>
</div>



				<div class="container-fluid gallery_page bg_img">
					<div class="row">
						<div class="col-md-12 text-center">
							<h1>
								search result
							</h1>
							<hr class="myhr">
						</div>



					</div>
				</div>



				<div class="container padding_t_b">
					<div class="row">
						<div class="col-md-12">


							<div class="panel panel-success">
							  <div class="panel-heading">
								<span class="glyphicon glyphicon-log-in"></span>
								search result
							  </div>

							  <div class="panel-body">

										<div class="table-responsive">
												<table class="table table-bordered table-hover ">
													<thead>
													  <tr>
														<th>Id</th>
														<th>Name</th>
														<th>Email</th>
													  </tr>
													</thead>
													<tbody>

										<?php
										while( $data = mysqli_fetch_array($result)	)
										{
											//id, name, email, mobile, password

											?>

													  <tr>
														<td><?php echo $data['id']; ?></td>
														<td><?php echo $data['name']; ?></td>
														<td><?php echo $data['email']; ?></td>
													  </tr>



											<?php
										}

										?>
										<span class="danger"><?php echo $s_error ?></span>
										</tbody>

												</table>

											</div>

							  </div>
							</div>
						</div>
					</div>
				</div>






<?php include('include\footer.php')?>

<?php include('include/session.php')?>
<?php include('connection.php')?>
<?php include('include/header.php')?>
<?php include('include/header2.php')?>
<div class="col-md-10 constpad30">
		<?php include('include/navbar.php') ?>
</div>

<?php
if(isset($_GET['msg']))
{
 ?>
 <span class="alert alert-success"><?php echo $_GET['msg'];?></span>
<?php
}
 ?>


<div class="container-fluid gallery_page bg_img">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1 style="color:#fff">
		USERS
			</h1>
		</div>



	</div>
</div>




<div class="container constpad30">
	<div class="row">
		<div class="col-md-8 col-md-offset-3">


							<div class="panel panel-success">

							  <div class="panel-body">
									<?php
										$result = mysqli_query($conn, "select * from users ORDER BY id desc");
										?>

										<div class="table-responsive">
												<table class="table table-bordered table-hover ">
													<thead>
													  <tr>
														<th>Id</th>
														<th>Name</th>
														<th>Email</th>

														<th>option</th>

													  </tr>
													</thead>
													<tbody>

										<?php

										if($login)
										{
											$num=1;
										while( $data = mysqli_fetch_array($result)	)
										{
//echo $data['id'];die();
											//id, name, email, mobile, password

											?>

													  <tr>
														<td><?php echo $num; ?></td>
														<td><a href="profile.php?user_id=<?php echo $data['id'];?>">
												<?php
												if(isset($data['name']))

											{
												echo $data['name'];
											}

												else {
													echo $data['first_name']." ".$data['last_name'];
												} ?>
											</a></td>
														<td><?php echo $data['email']; ?></td>
														<?php if($admin)
														{
//echo $data['id'];die();
															?>
														<td>
														<a href="make_admin.php?user_id=<?php echo $data['id'];?>"><button type="button" class="btn btn-primary">make admin</button></a>
														&nbsp;&nbsp; &nbsp;
														<a href="delet_user.php?user_id=<?php echo $data['id'];?>"><i class="	glyphicon glyphicon-trash " title="Delete" aria-hidden="true"></i></a>
														</td>
														<?php
}



?>
													  </tr>



											<?php
											$num++;
										}
										}
										else
										{
											?>
											<tr>
										<span class="danger"> <?php echo 'first login to display users information'; ?> </span>
											</tr>
											<?php
										}

										?>

										</tbody>

												</table>
											</div>

							  </div>
							</div>
						</div>
					</div>
				</div>







<?php include('include/footer.php')?>

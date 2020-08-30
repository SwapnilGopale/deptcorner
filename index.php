
<?php include('include/session.php') ?>
<?php// var_dump($_SESSION); ?>
<?php// var_dump($_SESSION); ?>
<?php include('include/header.php') ?>
<div class="container-fluid  constpad30 mission   consmarg1" >





	<div class="col-md-10 constpad30">
			<?php include('include/navbar.php') ?>

	</div>
	<div class="row">
<?php
if(isset($_GET['msg']))
{
	?>
	<span class="alert alert-success text-center " style="margin-left: -500;"><?php echo $_GET['msg']?> </span>
	<?php
}
?>
		<div class="text-right">
		<?php
if($login!=true)
		{
		 ?>

<a href="login.php"> <button type="button" class="btn btnind constpad30" >LOGIN</button></a>
<a href="signup.php"> <button type="button" class="btn btnind constpad30" >SIGNUP</button></a>
			<?php
		}

		else {
			?>

			<a href="include/logout.php"> <button type="button" class="btn btnind constpad30" >Logout</button></a>
		<?php
				}
			 ?>

</div>

		<!--div class="col-md-8 col-md-offset-2 text-center "><h2 class="wow slideInUp">MISSION</h2><hr class="myhr"-->
			<div class="col-md-7">

				<h1 class="wow slideInUp mypara">Get a ride in TECHNO WORLD.</h1>


			</div>
			<img src="images/t1.png" class=" myimg1 img-responsive wow slideInUp" style="float:left">
		</div>
	</div>
</div>

<div class="container-fluid  constpad30 mission   consmarg1">
	<div class="row">
		<!--div class="col-md-8 col-md-offset-2 text-center "><h2 class="wow slideInUp">MISSION</h2><hr class="myhr"-->
			<div class="col-md-7">

				<h1 class="wow slideInUp mypara">Questions about any technology ask here.</h1>


			</div>
			<img src="images/t2.png" class=" myimg1 img-responsive wow slideInUp" style="float:left">
		</div>
	</div>
</div>
<div class="container-fluid  constpad30 mission   consmarg1">
	<div class="row">
		<!--div class="col-md-8 col-md-offset-2 text-center "><h2 class="wow slideInUp">MISSION</h2><hr class="myhr"-->
			<div class="col-md-7">

				<h1 class="wow slideInUp mypara">Get all events update from our department.</h1>


			</div>
			<img src="images/t3.png" class=" myimg1 img-responsive wow slideInUp" style="float:left">
		</div>
	</div>
</div>
<div class="container-fluid  constpad30 mission   consmarg1">
	<div class="row ">
		<!--div class="col-md-8 col-md-offset-2 text-center "><h2 class="wow slideInUp">MISSION</h2><hr class="myhr"-->
			<div class="col-md-5 ">

				<h1 class="wow slideInUp mypara">Get daily updated technology news.</h1>


			</div>
			<img src="images/t7.png" class=" myimg1 img-responsive wow slideInUp nimg" style="float:left; margin-left:184px;">
			<div class="text-center">
				<?php
					if($login!=true)
					{
				 ?>
			<a href="signup.php " class=""> <button type="button" class="btn btn-success btngtstarted ">GET STARTED</button></a>
			<?php
		}
			 ?>
			</div>
		</div>
	</div>
</div>



<?php include('include/footer.php')?>

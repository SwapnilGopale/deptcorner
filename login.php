<?php include('include/session.php');
 include('include/header.php'); 
 include('include/header2.php');
 include('connection.php');?>
 <div class="constpad30">
<?php include('include/navbar.php'); ?>
</div>
<?php
$email_error=$password_error="";
if($_POST)
{
	$email=$_POST['email'];
	$password=$_POST['password'];
	$error=0;
	if(strlen($password)<2)
	{
		 $error=1; $password_error="password is too short";
	}
	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
	{
		$email_error = "$email is a not valid email address.<br>";
		$error =1;
	}
	echo $error;
	if($error==0)
	{
		$email_data = mysqli_query($conn,"select * from users where email='$email'");
		$email_available = mysqli_num_rows($email_data);
		if($email_available)
		{
			$password_data = mysqli_query($conn,"select * from users where email='$email' AND password='$password'");
			$password_available = mysqli_num_rows($password_data);
			if($password_available)
			{
				date_default_timezone_set("Asia/Kolkata");
				$user_data = mysqli_fetch_array($password_data);
				//login process
				$_SESSION['login'] = true;
				$_SESSION['id'] = $user_data['id'];
				$_SESSION['login_time'] = date("d M Y, H:i:s a");

				header("Location:index.php?msg=loged in successfully");
		    }
			else
			{
				$password_error='password do not matched';
			}
		}
		else
		{
		    $email_error='email is not registered';
		}
	}
}

?>

<div class="container-fluid gallery_page bg_img">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1 style="color:#fff">
				LOGIN HERE
			</h1>
		</div>



	</div>
</div>



<div class="container constpad30">
	<div class="row">
		<div class="col-md-8 col-md-offset-3">


			<div class="panel panel-success">

			  <div class="panel-body" >
				<span class="text-danger"><?php
        if(isset($_GET['msg']))
        {
          echo $_GET['msg'];
        } ?></span>
				<form type="" action="login.php" method="POST" name="login">
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input type="email" class="form-control" name="email" id="email" >
					  <span class="text-danger"><?php echo $email_error; ?> </span>
					</div>

					<div class="form-group">
					  <label for="pwd">Password:</label>
					  <input type="password" name="password" id="password" class="form-control" id="password">
					 <span class="text-danger"> <?php echo $password_error; ?> </span>
					</div>

					<button class="btn btn-success" action="submit">Log in</button>
					<a href="1353/fbconfig.php" class="fa fa-facebook" title="login with facebook"> </a>
					<a href="https://accounts.google.com/o/oauth2/auth?response_type=code&redirect_uri=http%3A%2F%2Flocalhost%2Fnagar%2Fg%2Flogin_with_google_using_php%2F&client_id=97182693999-5vjnn3jbg000o7hgpef6fv5895vlg7eq.apps.googleusercontent.com&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&access_type=offline&approval_prompt=force" class="fa fa-google" title="login with google"></a>

					<button class="btn btn-danger" action="reset">Cancel</button>
					<a href="signup.php" class="text-center">Create new account</a>
				</form>

			  </div>
			</div>



		</div>
	</div>
</div>
<?php include('include/footer.php');?>

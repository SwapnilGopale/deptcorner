 <?php include('include/session.php'); ?>
 <?php include('include/function.php'); ?>
 <?php include('connection.php'); ?>
<?php
$picture_path="";
$name_error=$password_error=$gender_error=$email_error=$phon_no_error=$condition_error=$cmpassword_error="";
if($_POST)
{

	isset($_POST['name']) ? $name=$_POST['name']:$name="";
	//isset($_POST['avtar']) ? $avtar=$_POST['avtar']:$avtar="";
	isset($_POST['email']) ? $email=$_POST['email']:$email="";
	isset($_POST['password']) ? $password=$_POST['password']:$password="";
	isset($_POST['cmpassword']) ? $cmpassword=$_POST['cmpassword']:$cmpassword="";
	isset($_POST['gender']) ? $gender=$_POST['gender']:$gender="";
	isset($_POST['phon_no']) ? $phon_no=$_POST['phon_no']:$phon_no="";
	isset($_POST['condition']) ? $condition=$_POST['condition']:$condition="";
	$error=0;
	$name_length=strlen($name);
	$email_length=strlen($email);
	$password_length=strlen($password);
	$gender_length=strlen($gender);
	$phon_no_length=strlen($phon_no);



	if($name_length<2)
	{
	 $error=1;
	 $name_error="name is too short";
	}
	if($password_length<8)
	{
		 $error=1; $password_error="password is too short";
	}
	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
	{
		$email_error = "$email is a not valid email address.<br>";
		$error =1;
	}
	if($gender_length<4)
	{
	$error=1;$gender_error="must select gender";
	}

	if($phon_no_length<10)
	{
	$error=1;$phon_no_error="phon no must conatain 10 digits";

	}
	if($condition!=1)
	{
	 $error=1;$condition_error="must accept the term and condition";

	}
	if($cmpassword!=$password)
	{
		$error=1;$cmpassword_error="password not confirmed try again";
    }


	if($error==0)
	{

	   isset($_SESSION['avatar'])? $picture_path=$_SESSION['avatar']:$picture_path = upload_file('avtar', 'images/avatars/',"");

      //  echo "$picture_path";
		//die();
		//$conn = mysqli_connect("localhost", "root", "","drem_info");
		$r = mysqli_query($conn, "insert into users (name, email, password,gender,phon_no,avtar) values('$name', '$email', '$password','$gender',$phon_no,'$picture_path')");


//  var_dump($picture_path); die();
    if($r)
		{
			date_default_timezone_set("Asia/Kolkata");
				//login process
				$direct_login_data = mysqli_query($conn,"select * from users where email='$email' AND password='$password'");
				//$direct_login_data = mysqli_num_rows($direct_login_data);
				$user_data = mysqli_fetch_array($direct_login_data);
				$_SESSION['login'] = true;
				$_SESSION['id'] = $user_data['id'];
				$_SESSION['name'] = $name;
				$_SESSION['login_time'] = date("d M Y, H:i:s a");

				header("Location: index.php");
		   	$msg = "You registration is successfull.";
		}
		else
			$msg="Sorry, unable to register, try again.";
		?>	<div class="alert alert-danger">
         <strong>faild!</strong> sign up failed please try again.
          </div>
	<?php


	}

}
?>
 <?php include('include/header.php'); ?>
<?php include('include/header2.php');?>
<div class="constpad30">
<?php include('include/navbar.php'); ?>
</div>

<div class="container-fluid gallery_page bg_img">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1 style="color:#fff">
				SIGNUP HERE
			</h1>
		</div>



    <div class="container constpad30">
    	<div class="row">
    		<div class="col-md-8 col-md-offset-3">


			<div class="panel panel-success">


			  <div class="panel-body">

				<form action="signup.php" method="POST"  enctype = "multipart/form-data">
				<div class="form-group">
          <span class="	glyphicon glyphicon-user"></span>
					  <label for="usr">Enter Name:</label>
					  <input type="text" class="form-control" id="usr" name="name"><br>
					  <span class="text-danger"><?php echo $name_error ?></span>
					</div>
					<div class="form-group">
					<span class="	glyphicon glyphicon-user"></span>
					 <label for="gnder">Gender:</label><br>

							<label for="male"><input type="radio"  value="male" id="male" name="gender"> Male</label>
							<label for="female"><input type="radio"  id="female" value="female" name="gender"> Female</label>
						 <span class="text-danger"><?php echo $gender_error;  ?></span>
					</div>

					<div class="form-group">
					 <span class="glyphicon glyphicon-envelope"></span>
					  <label for="email">Enter Email:</label>
					  <input type="email" class="form-control" id="email" name="email">
					   <span class="text-danger"><?php echo $email_error; ?></span>
					</div>

					<div class="form-group">
					 <span class="glyphicon glyphicon-phone"></span>
					  <label for="phn">Enter phon no:</label>
					  <input type="number" class="form-control" id="phn" name="phon_no">
					   <span class="text-danger"><?php echo $phon_no_error; ?></span>
					</div>

          <div class="form-group">
          <i class="glyphicon glyphicon-picture" aria-hidden="true"></i>
          <label for="avtar">Upload a profile picture(file must be less than 2mb):</label>
          <input type="file" class="form-control" id="avtar" name="avtar" value="avtar" >
            </div>
              or
         <div class="form-group" id="show">
          <i class="glyphicon glyphicon-picture" aria-hidden="true"></i>
          <a href="demographic.php" class="btn btn-primary" target="_blank">take a selfie</a>
          <?php
            if(isset($image))
            {

           ?>
           <img src="<?php echo $image?>" alt="profile pic" class="img-responsive" style="    max-height: 97px;
    padding: 13px;">
        <?php
        }

         ?>
            </div>




					<div class="form-group">
					<span class="	glyphicon glyphicon-lock"></span>
					  <label for="pwd">Enter Password:</label>
					  <input type="password" class="form-control" id="pwd" name="password">
					   <span class="text-danger"><?php echo $password_error; ?></span>
					</div>

					<div class="form-group">
					<span class="	glyphicon glyphicon-lock"></span>
					  <label for="cmpassword">Conform Password:</label>
					  <input type="password" class="form-control" id="cmpassword" name="cmpassword">
					   <span class="text-danger"><?php echo $cmpassword_error; ?></span>
					</div>


					<div class="checkbox">
						<label><input type="checkbox" name="condition" value="1"> Accept terms and conditions</label>
						 <span class="text-danger"><?php echo $condition_error;?></span>
					</div>
					<input type="submit" class="btn btn-success" value="Sign Up"> &nbsp;or


					<a href="login.php" class="text-center">Login with social accounts</a>
				</form>

			  </div>
			</div>



		</div>
	</div>
</div>
<?php include('include/footer.php');?>

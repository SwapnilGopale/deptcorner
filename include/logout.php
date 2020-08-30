<?php include('session.php') ?>
<?php
           session_destroy();
				date_default_timezone_set("Asia/Kolkata");
				//logout process
				$_SESSION['login'] = false;
				$_SESSION['user_data'] ="";
				$_SESSION['name'] ="";
				$_SESSION['logout_time'] = date("d M Y, H:i:s a");
			
				
			header("Location: ../login.php?msg:'log out sucessfully'");

?>
	

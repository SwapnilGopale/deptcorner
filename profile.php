 <?php include('include/session.php');
include('connection.php');
?>
 <div class="constpad30">

 <?php include('include/navbar.php'); ?>
</div>
 <?php
       if($_GET)
	   {
				isset($_GET['user_id'])? $user_id=$_GET['user_id']:$user_id=0;
				if($user_id>0)
				{
				 $user_data= mysqli_query($conn,"select * from users where id=$user_id");
				 $user_c=mysqli_fetch_array($user_data);
				}
	   }
  ?>
 <?php include('include/header.php'); ?>


 <div class="container container-fluid" style="    background: linear-gradient(white, #272f60);
    margin-left: 35px;">
 <div class="row" >
 <div class="col-md-4 col-md-offset-4">


   <?php
   //var_dump( $user_c['avtar']);?>
   <img src="
   <?php
   if(isset($user_c['avtar']))
   {
     echo $user_c['avtar'];
   }
   if(isset($user_c['picture']))
   {
     echo $user_c['picture'];
   }
    ?>" alt="Avatar" style="max-width:50%;max-hight:50%"  class="img-circle img-responsive">
<h2 class="text-center" style="color:#fff"><?php if(isset($user['first_name']))
{
echo $user['first_name']."  ".$user_c['last_name'];
}
else {
  echo $user_c['name'];
}?></h2>

<p style="font-size:25px; color:white">Email:</p><h2 class="text-center" style="color:#fff"><?php echo $user_c['email'];?></h2>
  </div>
  </div>
  </div>


<?php   //var_dump($user_c);//include('include/footer.php'); ?>

<?php include("include/session.php");?>
<?php include("connection.php");?>
<?php include("include/function.php");?>
<?php


$this_is_myprofile=false;
if($_GET)
{
 // isset($_GET['post_id'])?$post_id=$_GET['post_id']:$post_id='';
  isset($_GET['user_id'])?$uid=$_GET['user_id']:$uid='';
 // isset($_GET['type'])?$type=$_GET['type']:$type='';
  //isset($_GET['type'])?$type=$_GET['type']:$type='';
if($login && $admin)
{
	     $this_is_myprofile=true;
}
else
{
	 	$this_is_myprofile=false;;
}
}//if

else
{
	header("Location:not_allow.php");
}
if($this_is_myprofile)
{

	$r= mysqli_query($conn,"update users  set role=1 WHERE id=$uid;");

  if($r)
  {

  header('location:users.php?msg=make admin successfull');
  }



}

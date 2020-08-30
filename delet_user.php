<?php include("include/session.php");
include("connection.php");
include("include/function.php");



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

	$r= mysqli_query($conn,"DELETE FROM users WHERE id=$uid;");

  if($r)
  {

  header('location:users.php?msg=user deleted successfully');
  }



}

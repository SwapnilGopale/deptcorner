<?php include("include/session.php");
include("connection.php");
include("include/function.php");

$this_is_myprofile=false;
if($_GET)
{
  isset($_GET['post_id'])?$post_id=$_GET['post_id']:$post_id='';
  isset($_GET['uid'])?$uid=$_GET['uid']:$uid='';
  isset($_GET['type'])?$type=$_GET['type']:$type='';
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

	$r= mysqli_query($conn,"DELETE FROM news WHERE id=$post_id;");

  if($r)
  {
      if($type=="tech")
    header('location:technews.php?msg=news deleted successfully');

    if($type=="dept")
  header('location:depnews.php?msg=news deleted successfully');
  }



}

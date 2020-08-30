<?php include("include/session.php");
include("connection.php");
include("include/function.php");

$this_is_myprofile=false;
if($_GET)
{
  isset($_GET['post_id'])?$post_id=$_GET['post_id']:$post_id='';
  isset($_GET['uid'])?$uid=$_GET['uid']:$uid='';
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

	$post_data= mysqli_query($conn,"select * from news where id=$post_id");
  $post=mysqli_fetch_array($post_data);
	$_SESSION['containt']=$post['containt'];
  $_SESSION['photo']=$post['photo'];
  $_SESSION['video']=$post['video'];


}

if($_POST)
{
  //var_dump($_POST);
	isset($_POST['title'])?$title=$_POST['title']:$title='';
	isset($_POST['containt'])?$containt=$_POST['containt']:$containt='';
	isset($_POST['photo'])?$picture=$_POST['photo']:$picture='';
	isset($_POST['video'])?$video=$_POST['video']:$video='';
  isset($_POST['type'])?$type=$_POST['type']:$type='';

 //var_dump($_FILES);die();
  if(strlen($containt)==0)
  {
    $containt=$_SESSION['containt'];
  }
  else if(strlen($_FILES['photo']['name'])==0 )
  {
$picture_path=$_SESSION['photo'];
  }
  else
   {
     $picture_path = upload_file('photo', 'images/news/', "");

  }

    $video_id = getYouTubeVideoId($video);
    if(strlen($video_id)==0)
    {
      $video_id=$_SESSION['video'];
    }

 //echo $picture_path;die();
  $success = mysqli_query($conn,"update news SET title='$title',containt='$containt',photo='$picture_path',video='$video_id',type='$type' where id=$post_id");

if($success && $type=="dept")
{
  header("location:depnews.php?msg=updated successfully");
}
else if($success && $type=="tech")
{
  header("location:technews.php?msg=updated successfully");
}
else {
  echo 'fail to update';
}
}
 //echo $post['photo'];die();
?>
<?php include('include/header.php');?>
<?php include('include/header2.php');?>
<div class="col-md-10 constpad30">
    <?php include('include/navbar.php') ?>
</div>

<div class="container padding_t_b">
	<div class="row">
		<div class="col-md-8 col-md-offset-2  padding_t_b">


			<div class="panel panel-success">
			  <div class="panel-heading">
				&nbsp; <?php echo "EDIT POST"?>
			  </div>

			  <div class="panel-body">

      				<form action="edit_post.php?post_id=<?php echo $post_id;?>" method="POST" enctype = "multipart/form-data">
      								<div class="form-group">
      									  <label for="usr">title:</label>
      									  <input type="text" class="form-control" id="post" name="title" value="<?php echo $post['title'];?>"><br>
                        </div>

      									<div class="form-group">
      									  <label for="containt">Containt:</label>
      									 <textarea type="text" class="form-control" rows="5" id="containt" name="containt" value="<?php echo $post['containt'];?>"> </textarea>
                        <!--input type="text" class="form-control" id="post" name="title" value="<?php// echo $post['containt'];?>"-->
      									</div>

                        <div class="form-group">
                        <label for="type">Type:</label>
                        <label class="radio-inline"><input type="radio" name="type" value="dept" <?php if($post['type']=="dept") echo "checked"?>>Department</label>
                        <label class="radio-inline"><input type="radio" name="type" value="tech" <?php if($post['type']=="tech") echo "checked"?>>Technology</label>
                        	<span class="text-danger"><?php// echo $type_error ?></span>
                      </div>

                      <div class="form-group">
            					<i class="fa fa-picture-o" aria-hidden="true"></i>
            					<label for="photo">select new photo:</label>
            					<input type="file" class="form-control" id="photo" name="photo" value="<?php// echo $post['photo'] ?>" >
            					</div>
      									<div class="form-group">
      										<i class="fa fa-youtube" aria-hidden="true"></i>
      									  <label for="video">enter video link</label>
      									  <input type="text" class="form-control" id="video" name="video" value="<?php echo $post['video'];?>">
      									</div>

      									<div>
      										<button class="btn btn-success" action="submit">Edit</button>
      									<button class="btn btn-danger" action="reset">cancel</button>
      								</div>

      					 </form>

			  </div>
			</div>



		</div>
	</div>
</div>

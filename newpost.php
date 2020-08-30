<?php include('include/session.php');
include('connection.php');
include('include/function.php');

$title_error=$type_error=$containt_error="";
if($login==true)
{
if($_POST)
{
  //var_dump($_POST);
  $error=0;
  isset($_POST['title'])?$title=$_POST['title']:$title="";
  isset($_POST['type'])?$type=$_POST['type']:$type="";
  isset($_POST['containt'])?$containt=$_POST['containt']:$containt="";
  isset($_POST['video'])?$video=$_POST['video']:$video="";
  isset($_POST['photo'])?$photo=$_POST['photo']:$photo="";

  $video_id = getYouTubeVideoId($video);

  if(strlen($title)<3)
  {
	  $error=1;
	  $title_error="title is to short";
  }

  if(!$type)
  {
    $error=1;
    $type_error="type must be selected";
  }
  if(strlen($containt)<3)
  {
	  $error=1;
	  $containt_error="containt is to short";
  }

  if($error==0)
  {
        $picture_path = upload_file('photo', 'images/news/', "");
        //echo $picture_path;die();
        //mysqli_close($conn);
        $posted_on=date('y-m-d H:i:s');
		$r = mysqli_query($conn, "insert into news (title,containt ,photo,video,type,postedon) values('$title', '$containt','$picture_path','$video_id','$type','$posted_on')");

    if($r)
		{
      if($_POST['type']=='dept')
      {
        header('location:depnews.php?msg=NEWS IS POSTED SUCCESSFULLY');
      }
      elseif ($_POST['type']=='tech')
       {
        header('location:technews.php?msg=NEWS IS POSTED SUCCESSFULLY');
      }
    }
		else
		{?>
      <div class="alert alert-danger">
	      <?php echo "enabal to update post try again";?>
      </div><?php
		}
  }
}

}
else
{
  //flush();
  echo "unable to post";
}

?>

<?php include('include/header.php');?>
<?php// include('include/header2.php')?>
<div class="col-md-10 constpad30">
    <?php include('include/navbar.php') ?>
</div>

<div class="container-fluid gallery_page bg_img">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1 style="color:#fff">
				POST NEWS
			</h1>
		</div>



	</div>
</div>
<div class="container constpad30">
	<div class="row">
		<div class="col-md-8 col-md-offset-3">


			<div class="panel panel-success">


			  <div class="panel-body">
					<form type="" accept-charset="UTF-8" action="newpost.php" method="POST" enctype = "multipart/form-data">
					<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" name="title"><br>
					<span class="text-danger"><?php echo $title_error ?></span>


          <div class="form-group">
          <label for="containt">Type:</label>
          <label class="radio-inline"><input type="radio" name="type" value="dept">Department</label>
          <label class="radio-inline"><input type="radio" name="type" value="tech">Technology</label>
          	<span class="text-danger"><?php echo $type_error ?></span>
        </div>

					<div class="form-group">
					<label for="containt">Containt:</label>
					<textarea class="form-control" rows="5" id="containt" name="containt"></textarea>
		               		<span class="text-danger"><?php echo $containt_error; ?></span>
					</div>


					<div class="form-group">
					<i class="fa fa-picture-o" aria-hidden="true"></i>
					<label for="photo">select new photo:</label>
					<input type="file" class="form-control" id="photo" name="photo" >
					</div>

					<div class="form-group">
					<i class="fa fa-youtube" aria-hidden="true"></i>
					<label for="video">enter video link</label>
					<input type="text" class="form-control" id="video" name="video" >
					</div>



					<div><button class="btn btn-success" action="submit">publish</button>
					<a class="btn btn-danger" action="cancel">cancel</a>
					</div>
					</form>
			 	 </div>
			</div>
		</div>
	</div>
</div>
</div>

<?php include('include/footer.php'); ?>

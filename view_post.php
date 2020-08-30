<?php include("include/session.php");
include("include/function.php");
include('connection.php');
if($login)
{
isset($_GET['post_id']) ? $post_id = $_GET['post_id'] : $post_id = null;

$post_data = mysqli_query($conn, "select p.id,p.title, p.containt, p.video, p.photo, p.postedon from news p where p.id = $post_id ");
$post = mysqli_fetch_array($post_data);
//var_dump($post);die();
}
else
{
  header('Location:not_allow.php');
}
?>

<?php include("include/header.php");?>
<?php include('include/header2.php')?>
<div class="col-md-10 constpad30">
    <?php include('include/navbar.php') ?>
</div>


<div class="container-fluid cover_photo pad" >



	<div class="container  constpad30">
		<div class=" text-center ">
			<h1 style="color:#fff">
			<?php echo $post['title'];?>
			</h1>
		</div>
	</div>

</div>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 constpad30">
			<img src="<?php echo $post['photo'];?>" class="img-responsive">
    </div>
  </div>
      <?php if(strlen($post['video'])!=0)
      {
        ?>

  	<div class="row">
      <div class="col-md-4 col-md-offset-4 embed-responsive embed-responsive-16by9  ">
			     <iframe  src="https://www.youtube.com/embed/<?php echo $post['video'];?>" frameborder="0" allowfullscreen></iframe>

      </div>
    </div>
    <?php
    }
    ?>
    </div>

    <div class="container" style="color:#fff">
      <div class="col-md-4 col-md-offset-4 ">
			  <strong><h3 style="color:#55d6ec;background-color:#000 ;width:100px">DETAILS:</h3><h2><?php echo $post['containt'];?><h2></strong>

      </div>
    </div>
    <?php if($login && $admin)
    {

     ?>
   <a href="edit_post.php?post_id=<?php echo $post['id'];?>&u_id=<?php //echo $post['u_id'];?>"><div class="btn btn-success">EDIT</div></a>
<?php
    }
    ?>

		</div>
	</div>

<?php include("include/footer.php");?>

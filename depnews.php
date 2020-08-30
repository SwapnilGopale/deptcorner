<?php include("include/session.php");
include("connection.php");
include("include/function.php");

if($login)
{
if(($login))

{
       $result = mysqli_query($conn, "select p.id,p.title, p.containt, p.video, p.photo, p.postedon from news p where type='dept' ORDER BY p.postedon desc;");
    	//$result = mysqli_query($conn, "select id,u_id, title, photo, posted_on from posts ORDER BY posted_on desc LIMIT 5");
		//echo mysqli_num_rows($result);

  }
  }
  else
  {
    header('Location:not_allow.php');
  }

?>
<?php include('include/header.php');?>
<?php include('include/header2.php')?>
<div class="col-md-10 constpad30">
    <?php include('include/navbar.php') ?>
</div>
<div class="container-fluid ">
	<div class="row">
		<div class="col-md-12 text-center constpad30 " >
			<h1 style="color:#fff" >
				DEPARTMENT NEWS
			</h1><hr>
		</div>
    <?php
    if(isset($_GET['msg']))
    {
      ?>
<div class="container container-fluid alert alert-success text-center " style="width:30%">

<?php   echo $_GET['msg'];

}?>
</div>





    <div class="container-fluid text-center constpad30">
      <div class="row content">



        <div class="col-sm-8 text-center">

    		<?php
    					while($post_data = mysqli_fetch_array($result))
    					{
              //echo  $post_data['photo'];
    					?>
         <div class="row margin_t_b">


    						<a href="view_post.php?post_id=<?php echo $post_data['id'];?>">
    						<div class="col-md-4 col-md-offset-2 wow zoomIn">
    							<img class="img-responsive" src="<?php echo $post_data['photo'];?>">
                  <br>

                  <?php if($login && $admin)
                  {
                    ?>
                    <div class="constpad30">
                  <a  href="edit_post.php?post_id=<?php echo $post_data['id'];?>&uid=<?php echo $uid?>"><button type="button" class="btn btn-primary">Edit</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a  href="delete_post.php?post_id=<?php echo $post_data['id'];?>&uid=<?php echo $uid?>&type=dept"><button type="button" class="btn btn-danger">Delete</button></a><br>
                </div>
                    <?php
                  }
                  else {?>
                    <a href="view_post.php?post_id=<?php echo $post_data['id'];?>"><button type="button" class="btn btn-primary">view</button>
                  <?php
                }?>
    						</div>

    						<div class="col-md-6 wow zoomIn" style="color:rgb(199, 226, 249);font-weight:10px">
    							<h2><?php echo $post_data['title'];?></h2>
    						</div>
    						</a>



            </div>

    						<?php
    					}
    				?>

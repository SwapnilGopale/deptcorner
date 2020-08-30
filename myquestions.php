<html>
<?php include('include\session.php')?>
<?php include('include\header.php')?>
<?php include('include/header2.php')?>
<div class="col-md-10 constpad30">
    <?php include('include/navbar.php') ?>
</div>
<?php// include('include\slider.php')?>
<?php
if($login)
{

$result = mysqli_query($conn, "select * from questions where uid=$uid ");
$error=0;$anerror="";
}
?>



<div class="row">
<div class="text-center">
  <h1>All Questions</h1>
<hr align="center" class="myhr" size="5px" width="30%"><br>
</div>
<?php
      while($post_data = mysqli_fetch_array($result))
      {
        ?>
        <div class="container ">
          <div class="row">

            <h3>
              <strong>
              <?php echo $post_data['question'];?>
              </strong>
            </h3>
            <h6> posted on&nbsp; <strong> <?php echo $post_data['postedon']?></strong></h6>

          </div>
          <div class="container">

          <a href="reply.php?qid=<?php echo $post_data['id']?>& question=<?php echo $post_data['question']?>"><button type="button" class="btn btn-info">View Replies</button></a>
          </div>
        </div>

        </div>
        </div>

      <?php
    }
    ?>

<?php include('include/footer.php'); ?>

<html>
<?php include('include/session.php');
include('connection.php');
$error=0;
$error_q=$lenque="";
if(isset($_POST['question']))
{
	//var_dump($_POST);
	$que=$_POST['question'];
	$lenque=strlen($que);
	//echo $uid;
	if($lenque<3)
	{
		$error=1;
		$error_q="length is too short...please explain your question little more";
	}
	else
	{


				$posted_on=date('y-m-d H:i:s');

				$r = mysqli_query($conn, "insert into questions (question,uid,postedon) values('$que',$uid,'$posted_on')");
			}

if(isset($r))
{
	//flush();
	header('location:qnry.php?msg=question is posted');
}
else
{
}
}
?>

<?php include('include/header.php')?>
<?php include('include/header2.php')?>
<div class="constpad30">
<?php include('include/navbar.php'); ?>
</div>

<div class="container-fluid gallery_page bg_img">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1 style="color:#fff">
				ASK HERE
			</h1>
		</div>



	</div>
</div>



<div class="container constpad30">
	<div class="row">
		<div class="col-md-8 col-md-offset-3">


			<div class="panel panel-success">


			  <div class="panel-body">

				<form type="" action="" accept-charset="UTF-8"  method="POST" name="ask">
					<div class="form-group">

					  <h3><label for="que">QUESTION</label></h3>
					<textarea class="form-control" rows="5" id="question" name="question"></textarea>
					  <span class="text-danger"><?php echo $error_q;?></span>
					</div>


					<button class="btn btn-success" action="submit">SUBMIT</button>
					<button class="btn btn-danger" action="reset">Cancel</button>
				</form>

			  </div>
			</div>



		</div>
	</div>
</div>



<?php include('include/footer.php')?>

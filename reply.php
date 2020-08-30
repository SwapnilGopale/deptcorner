<html>
<?php include('include\session.php')?>
<?php include('include\header.php')?>
<?php include('include/header2.php');
include('connection.php');?>
<div class="col-md-10 constpad30">
		<?php include('include/navbar.php') ?>
</div>
<?php// include('include\slider.php')?>
<?php

$qid=$_GET['qid'];
$result = mysqli_query($conn, "select p.id,uid,qid,p.answer, p.postedon, u.name from answers p, users u  where p.uid=u.id and p.qid=$qid ORDER BY p.postedon desc LIMIT 10 ");
$error=0;$anerror="";
if(isset($_POST['answer'])  )
{
	if ($login==true)
	 {


	//var_dump($_POST);
	$ans=$_POST['answer'];
	$qid=$_GET['qid'];
	//echo $uid;
	if((strlen($ans))<3)
	{
		$error=1;
		$anerror="answer is too small explain little more";
	}
	$posted_on=date('y-m-d H:i:s');

if($error==0)
{
$r = mysqli_query($conn, "insert into answers (answer,uid,qid,postedon) values('$ans',$uid,$qid,'$posted_on')");

if($r)
{
	$msg="REPLIED SUCCESSFULLY";
}
else
{
	$msg="REPLIED UNSUCCESSFULLY";
}

}
else
{
	$msg="CORRECT THE ERRORS";
}
// 	echo mysqli_error($r);


//var_dump($result);
}
else
{
	header("Location:login.php?msg= Login first and then reply ");
}
}?>


<div class="container-fluid gallery_page bg_img">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1 style="color:#fff">
			ALL	QUESTIONS
			</h1>
		</div>



	</div>
</div>



<div class="container constpad30">
	<div class="row">
		<div class="col-md-8 col-md-offset-3">


			<div class="panel panel-success">

				<div class="panel-body" >
					<div class="container"  style="max-width: 100%;">
					<div class="row">
					<h2 class="myqtext"><strong><?php echo $_GET['question']?></strong></h2><br><br><br>
				</div>
				</div>
					<form type="" action="" accept-charset="UTF-8"  method="POST" name="ans">
						<div class="form-group">
							<?php if(isset($msg))
							{
							?>
							<div class="alert alert-warning">
								<?php echo $msg;

							echo"	</div>";
							}
								 ?>
							<label for="answer" style="font-size:22px;">ENTER YOUR REPLY:</label>
						<textarea class="form-control" rows="5" id="answer" name="answer"></textarea>
							<span class="text-danger"><?php echo $anerror?></span>
						</div>


						<button class="btn btn-success" action="submit" style="float:left">SUBMIT</button>
							 &nbsp;<a href="qnry.php"><button class="btn btn-danger">Cancel</button></a>
					</form>


						<div>
							<h3>other replies:</h3>

									<?php while($ans_data = mysqli_fetch_array($result))
									{?>

									<span><?php echo $ans_data['answer']?></span><br>
									<div>
										<h6>Answered  by&nbsp;<strong style="font-size:15px"><?php echo $ans_data['name']?></strong></h6>
										<hr style="border-top: 2px solid #000;">

									</div>
							<?php	}?>

								</div>

						</div>

						</div>
						</div>
						</div>
						</div>
						</div>

				</div>

<div>

<?php include('include/footer.php'); ?>

</div>

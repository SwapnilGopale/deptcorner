<?php include("include/session.php");
include("include/function.php");
include('include/header.php');
include('include/header2.php');
include('connection.php');
?>
<div class="col-md-10 constpad30">
    <?php include('include/navbar.php') ?>
</div>
<?php

       $result = mysqli_query($conn, "select p.id,uid,p.question, p.postedon, u.name from questions p, users u where p.uid=u.id ORDER BY p.postedon desc");
    	//$result = mysqli_query($conn, "select id,uid, title, picture, postedon from posts ORDER BY postedon desc LIMIT 5");
		//echo mysqli_num_rows($result);




?>






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

                  <?php
                  $num=1;
              					while($post_data = mysqli_fetch_array($result))
              					{
                          ?>
                          <div class="container " style="max-width: 100%;">
                            <div class="row">
                              <h3>
                                <strong><?php echo $num?>
                                <?php echo $post_data['question'];?>
                                </strong>
                              </h3>
                              <h6> ASKED BY&nbsp;<strong><?php echo $post_data['name'];
							  if(isset($post_data['first_name']))
							  {
								  echo $post_data['first_name'];
							  }
							  ?></strong> &nbsp;&nbsp;on&nbsp; <strong> <?php echo $post_data['postedon']?></strong></h6>

                            </div>
                          </div>
                          <div class="container"  style="max-width: 100%;">
                          <a href="reply.php?qid=<?php echo $post_data['id']?>& question=<?php echo $post_data['question']?>"><button type="button" class="btn btn-info">Reply</button></a>
                          <a href="reply.php?qid=<?php echo $post_data['id']?>& question=<?php echo $post_data['question']?>"><button type="button" class="btn btn-info">View Replies</button></a>
                        </div><hr>

                        <?php
                        $num++;
                      }
                      ?>
                    </div>

        			  </div>
        			</div>



        		</div>
        	</div>


<?php include('include/footer.php'); ?>

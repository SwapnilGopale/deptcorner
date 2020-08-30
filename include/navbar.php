<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php
  //var_dump($_SESSION);
    if($login==true)
    {
      ?>
<a href="profile.php?user_id=<?php echo $uid;?>"><img src="<?php
if(isset($user['picture']))
{
  echo $user['picture'];
}
else
{
echo $_SESSION['avtar'];
}
?>" class="img-circle navpic img-responsive">
    <?php
  }
    ?>
  <a href="index.php" style="color:#4699ff"><span class="	glyphicon glyphicon-home">&nbsp;</span>Home</a>

  <a href="<?php
  if($login)
  echo"ask.php";
   else
   echo "login.php?msg=LOG IN FIRST TO ASK QUESTION "?>"><span class="glyphicon glyphicon-pencil">&nbsp;</span>ASK</a>

   <a href="<?php
   if($login)
   echo"news.php";
    else
    echo "login.php?msg=LOG IN FIRST TO ASK QUESTION "?>"><span class="	glyphicon glyphicon-list-alt">&nbsp;</span>News</a>

    <a href="<?php
    if($login)
    echo"users.php";
     else
     echo "login.php?msg=LOG IN as admin to view users "?>"><span class="		glyphicon glyphicon-user">&nbsp;</span>Users</a>

     <a href="qnry.php"><span class="	glyphicon glyphicon-book">&nbsp;</span>All Questions</a>

    <?php
      if($login==true)
      {
        if($admin==1)
        {
      ?>
        <a href="newpost.php"><span class="	glyphicon glyphicon-edit">&nbsp;</span>POST</li></a>
        <?php
      }
      ?>
            <a href="include/logout.php" style="color:#e44f4f"><span class="	glyphicon glyphicon-log-out">&nbsp;</span>Logout</li></a>
      <?php
    }
       ?>

  </div>

<!-- Use any element to open the sidenav -->

<div class="container navcontainer" onclick="openNav()">
  <div class="bar1" style="color:#fff"></div>
  <div class="bar2" style="color:#fff"></div>
  <div class="bar3" style="color:#fff"></div>
</div>
<div id="main" >
<span  ></span>

<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
</div>

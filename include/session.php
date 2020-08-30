<?php 
session_start();
if(isset($_SESSION['login']))
{

$uid=$_SESSION['id'];
}

else if(isset($_SESSION['glogin']))
{
	$uid=$_SESSION['userData']['id'];

}
if(isset($_SESSION['login'])||(isset($_SESSION['glogin'])))
{
	$conn = mysqli_connect("localhost", "root", "root","drem_info");	
	$user_data=mysqli_query($conn,"select * from users where id=$uid");
	$user=mysqli_fetch_array($user_data);
	if(isset($user['first_name']))
	{
	$uname=$user['first_name'];
	}
	else {
		$uname=$user['name'];
	}
	if(isset($_SESSION['login'])){
		if(isset($user['avtar']))
		{
		$_SESSION['avtar']=$user['avtar'];
		}
		else if(isset($user['picture'])) {
				$avtar=$user['picture'];
		}
	}
	//var_dump($user);
 if($user['role']==1)
 {
	 $admin=true;
 }
 else {



	$admin=false;
 }
}
if(isset($_SESSION))
{
	if(isset($_SESSION['login']))
		$_SESSION['login'] == true ? $login = true : $login =false;
	else if(isset($_SESSION['glogin']))
		$_SESSION['glogin'] == true ? $login = true : $login =false;
else if(isset($_SESSION['flogin']))
	$_SESSION['flogin'] == true ? $login = true : $login =false;
else
		$login = false;
}
else
	$login = false;


?>

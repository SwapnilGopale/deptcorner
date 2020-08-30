<?php
require 'dbconfig.php';
function checkuser($fuid,$ffname,$femail){
    	$check = mysql_query("select * from Users where Fuid='$fuid'");
	$check = mysql_num_rows($check);
	if (empty($check)) { // if new user . Insert a new record
    $pic="https://graph.facebook.com/".$pic;
	$query = "INSERT INTO Users (Fuid,Ffname,Femail,avtar) VALUES ('$fuid','$ffname','$femail','$pic')";
	mysql_query($query);
	} else {   // If Returned user . update the user record
	$query = "UPDATE Users SET Ffname='$ffname', Femail='$femail' where Fuid='$fuid'";
	mysql_query($query);
	}
}?>

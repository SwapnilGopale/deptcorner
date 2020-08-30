<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';
require 'dbconfig.php';
//use 'functions.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '132007074279413','7e9cdb74998d62d331c47a311d790cf5' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://localhost/nagar/1353/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
      $pic="https://graph.facebook.com/".$fbid."/picture";

	/* ---- Session Variables -----*/
	    $_SESSION['id'] = $fbid;
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
      $_SESSION['login']=true;
      $_SESSION['avtar']=$pic;
      $check = mysqli_query($connection,"select * from Users where Fuid='$fbid'");
  $check = mysqli_num_rows($check);
  if (empty($check)) { // if new user . Insert a new record
  $query = "INSERT INTO Users (Fuid,name,Ffname,Femail,email,avtar) VALUES ('$fbid','$fbfullname','$fbfullname','$femail','$femail','$pic')";
  mysqli_query($connection,$query);
  } else {   // If Returned user . update the user record
  $query = "UPDATE Users SET name='$fbfullname' ,Ffname='$fbfullname', Femail='$femail',avtar='$pic' where Fuid='$fbid'";
  mysqli_query($connection,$query);
}
//cho mysqli_error($connection);
    header("Location:../index.php");


} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>

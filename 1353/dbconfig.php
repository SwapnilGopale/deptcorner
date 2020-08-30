<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');    // DB username
define('DB_PASSWORD', 'root');    // DB password
define('DB_DATABASE', 'drem_info');      // DB name
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE) or die( "Unable to connect");
//$database = mysqli_select_db() or die( "Unable to select database");
?>

<?php
$username = "admin";
$password = "sysadmin";
$hostname = "hsn-final.cc3ufhmfnitc.us-west-2.rds.amazonaws.com"; 
$database = "hotelsamenight"; 

//connection to the database


/*$username = "root";
$password = "";
$hostname = "localhost"; 
$database = "hotelsamenight"; 
*/
$db = mysqli_connect($hostname, $username, $password,$database)
  or die("Unable to connect to MySQL");

//$sdb=mysqli_select_db($db,"betterthegame");

?>
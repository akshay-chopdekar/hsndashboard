<?php
$username = "helixtech01";
$password = "sysadmin";
$hostname = "166.62.18.107"; 
$database = "hotelsamenight"; 
//connection to the database


$db = mysqli_connect($hostname, $username, $password,$database)
  or die("Unable to connect to MySQL");

//$sdb=mysqli_select_db($db,"betterthegame");

?>
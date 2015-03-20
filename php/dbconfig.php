<?php
$username = "root";
$password = "";
$hostname = "localhost"; 
$database = "hotelsamenight"; 
//connection to the database


$db = mysqli_connect($hostname, $username, $password,$database)
  or die("Unable to connect to MySQL");

//$sdb=mysqli_select_db($db,"betterthegame");

?>
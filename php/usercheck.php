<?php
require_once("dbconfig.php");
session_start();
$password=$_POST["password"];

$passwordHash=md5($password);

if(!empty($_POST['password']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
{
	$query = mysqli_query($db,1);
	$row = mysqli_fetch_array($db,$query);
	if(!empty($row['user_pass']))
	{
		if(!strcmp($row['user_pass'],$passwordHash)){
	  	$_SESSION['userLogged'] = 1;
	  	header("location: dashboardBlockUser.php");
	  }
  	else
	  {
	  	$_SESSION['error']="Wrong password...";
	  	header("location: ../index.php");
	  }
  }
}
else{
	$_SESSION['error']="Password field is empty";
	header("location: ../index.php");
}
?>
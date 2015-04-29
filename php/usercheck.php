<?php
session_start();
$password=$_POST["password"];

$passwordHash=md5($password);

if(!empty($_POST['password']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
{

		if(!strcmp($_POST['password'],'admin')){
	  	$_SESSION['userLogged'] = 1;
	  	header("location: hotelInfon.php");
	  }
  	else
	  {
	  	$_SESSION['error']="Wrong password...";
	  	header("location: ../index.php");
	  }
 }

else{
	$_SESSION['error']="Password field is empty";
	header("location: ../index.php");
}
?>
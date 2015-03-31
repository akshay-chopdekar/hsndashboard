<?php
require("../dbconfig.php");
if(isset($_POST['hotelId']))
{
	$hotelId=$_POST['hotelId'];
	$firstName=$_POST['fname'];
	$lastName=$_POST['lname'];
	$userName=$_POST['username'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);

	// echo "username is".$userName;

	$sql="insert into hotelusers(hotelId,username,password,userType,firstName,lastName,email) values({$hotelId},'{$userName}','{$password}','admin','{$firstName}','{$lastName}','{$email}')";

	if(mysqli_query($db,$sql))
	{
    echo json_encode('success');
	}
	else
	{
		echo json_encode('failure');
	}
}


?>
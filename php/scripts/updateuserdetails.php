<?php
require_once("../dbconfig.php");

// print_r($_POST);
$status=array();
$password=md5($_POST['password']);
$sql="update hotelusers set username='{$_POST['username']}',password='{$password}',firstName='{$_POST['fname']}',lastName='{$_POST['lname']}' where hotelId={$_POST['hotelId']} and userId={$_POST['userId']}";

if(mysqli_query($db,$sql))
{
	$status['status']=true;
}
else
{
	$status['status']=false.mysqli_error($db);
}

echo json_encode($status);

?>
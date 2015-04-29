<?php
require_once("../dbconfig.php");

// print_r($_POST);
$status=array();
$userId=$_POST['userId'];

$sql="delete from hotelusers where userId={$userId}";

if(mysqli_query($db,$sql) && mysqli_affected_rows($db))
{
	$status['status']=true.mysqli_affected_rows($db);
}
else
{
	$status['status']=false.mysqli_error($db);
}

echo json_encode($status);

?>
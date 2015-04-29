<?php
require_once("../dbconfig.php");

$status=array();
$response=array();

$userId=$_GET['userId'];
$hotelId=$_GET['hotelId'];

$sql="select * from hotelusers where hotelId={$hotelId} and userId={$userId}";
$result=mysqli_query($db,$sql);

if($result)
{
	while($row=mysqli_fetch_assoc($result))
	{
		array_push($response,$row);
	}
	$status['users']=$response;
	$status['status']=true;
}
else
{
	$status['status']=false.mysqli_error($db);
}

echo json_encode($status);

?>
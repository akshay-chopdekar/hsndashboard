<?php
require("../dbconfig.php");

if(!isset($_GET['hotelid']))
{
$sql="select max(hotelId) as hotelId from hotelusers";
$response=array();
$hotels=array();
$result=mysqli_query($db,$sql);
if($result){
while($res=mysqli_fetch_assoc($result))
{
	$res['hotelId']=$res['hotelId']+1;
	array_push($response, $res);
}
$hotels['hotels']=$response;
$hotels['status']=true;
}
else
{
	$hotels['status']=false;
}
echo json_encode($hotels);
}
else
{

$hotelId=$_GET['hotelId'];

$sql="select * from hotel where hotelId={$hotelId}";
$response=array();
$hotels=array();
$result=mysqli_query($db,$sql);
if($result){
while($res=mysqli_fetch_assoc($result))
{
	array_push($response, $res);
}
$hotels['hotels']=$response;
$hotels['status']=true;
}
else
{
	$hotels['status']=false;
}
echo json_encode($hotels);
}
?>
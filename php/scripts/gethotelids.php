<?php
require("../dbconfig.php");
$sql="select hotelId,hotelName from hotel";
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

?>
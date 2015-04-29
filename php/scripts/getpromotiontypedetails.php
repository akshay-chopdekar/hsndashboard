<?php
require("../dbconfig.php");

$status=array();
$hotellist=array();
$promotionTypeId=$_GET['promotionTypeId'];

$sql="SELECT pt.`promotionTypeId`,pt.`tagline`,phr.`hotelId`,h.`hotelName`,pt.status FROM promotiontype pt INNER JOIN promotionHotelRelation phr ON pt.`promotionTypeId`=phr.`promotionTypeId` INNER JOIN hotel h ON h.`hotelId`=phr.`hotelId` where pt.promotionTypeId={$promotionTypeId}";

$result=mysqli_query($db,$sql);
if($result)
{
	while($row=mysqli_fetch_assoc($result))
	{
		array_push($hotellist,$row);
	}
	$status['hotels']=$hotellist;
	$status['status']=true;
}
else
{
	$status['status']=false.mysqli_error($db);
}
echo json_encode($status);

?>


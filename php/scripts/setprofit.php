<?php
require("../dbconfig.php");
// var_dump($_GET);
// echo json_encode("enter");
// var_dump($_POST);
$status=array();

if(isset($_GET['hotelId']))
{
	// echo json_encode("1st if condition");
	$hotelId=$_GET['hotelId'];

	$sql="select profit from pricing where hotelId={$hotelId}";
	$result=mysqli_query($db,$sql);
	if($result)
	{
		$status['profit']=mysqli_fetch_assoc($result);
		$status['status']=true;
	}
	else
	{
		$status['status']=false;
	}

	echo json_encode($status);


}
elseif(isset($_POST['hotelId']))
{
		echo json_encode("2nd if condition");
$hotelId=$_POST['hotelId'];
$profit=$_POST['profit'];

$sql="update pricing set profit={$profit} where hotelId={$hotelId}";
if(mysqli_query($db,$sql))
{
	$status['status']=true;
}
else
{
	$status['status']=false;
}
echo json_encode($status);
}
?>
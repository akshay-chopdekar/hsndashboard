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
	// echo $hotelId;
	// $sql="select profitSameDay,profitFollowingDay from pricing where hotelId={$hotelId}";
	
	// $sql="SELECT p.profitSameDay,p.profitFollowingDay,p.taxandfees,h.confirmed FROM hotel h INNER JOIN pricing p ON h.hotelId=p.hotelId  WHERE h.hotelId={$hotelId}";
	// 
	$sql="SELECT h.profitSameDay,h.profitFollowingDay,h.taxandfees,h.confirmed,h.PromotionProfit FROM hotel h WHERE h.hotelId={$hotelId}";
		


	$result=mysqli_query($db,$sql);
	if($result)
	{
		$status['profit']=mysqli_fetch_assoc($result);
		$status['status']=true;
	}
	else
	{
		$status['status']=false.mysqli_error($db);
	}

	echo json_encode($status);


}
elseif(isset($_POST['hotelId']))
{
	// print_r($_POST);
		// echo json_encode("2nd if condition");
$hotelId=$_POST['hotelId'];
$profitSameDay=$_POST['sdprofit'];
$profitFollowingDay=$_POST['fdprofit'];
$taxandfees=$_POST['taxandfees'];
$stat=$_POST['status'];
$PromotionProfit=$_POST['PromotionProfit'];

// echo "taxandfees".$taxandfees."status".$stat;
// $sql="update pricing set profitSameDay={$profitSameDay},profitFollowingDay={$profitFollowingDay},taxandfees={$taxandfees} where hotelId={$hotelId}";

// $sql1="update hotel set confirmed={$stat} where hotelId={$hotelId}";

$sql="update hotel set profitSameDay={$profitSameDay}, profitFollowingDay={$profitFollowingDay}, taxandfees={$taxandfees}, PromotionProfit={$PromotionProfit}, confirmed={$stat} where hotelId={$hotelId}";

if(mysqli_query($db,$sql))
{
	$status['status']=true;
}
else
{
	$status['status']=false.mysqli_error($db);
}
echo json_encode($status);
}
?>
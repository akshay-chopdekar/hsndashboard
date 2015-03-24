<?php
require("../dbconfig.php");
// print_r($_GET);
$response=array();
$hotelId=$_GET['hotelId'];
// echo "hotel id is ".$hotelId."<br/>";
$query="select hotelId,reviewId,review,status from hotelreviews where hotelId=$hotelId";
$row=mysqli_query($db,$query);
if($row)
{
	// echo "success";
  $reviews = array();

while($row1 = mysqli_fetch_assoc($row))
{
	array_push($reviews, $row1);
}
// var_dump($images);
if(!empty($reviews))
{
$response['rev']=$reviews;
$response['status']=true;
}

else
{
	$response['status']=false;
}
}
else
{
	$response['status']=false;
}

echo json_encode($response);
?>
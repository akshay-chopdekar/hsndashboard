<?php
require("../dbconfig.php");
// print_r($_GET);
$response=array();
$hotelId=$_GET['hotelId'];
$query="select hotelId,imageUrl,priority from hotelimages where hotelId=$hotelId";
$row=mysqli_query($db,$query);
if($row)
{
	// echo "success";
}
else
{
	echo "failure";
}
$images = array();
while($row1 = mysqli_fetch_assoc($row))
{
	array_push($images, $row1);
	// print_r($row1);
	// echo json_encode($row1);
	// array_push($response[], $row1['imageUrl']);
	// echo json_encode($row1['imageUrl']);
}
// var_dump($images);
$response['imageUrl']=$images;
$response['status']=true;

// print_r($response);
echo json_encode($response);
?>
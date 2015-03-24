<?php
require("../dbconfig.php");
// print_r($_GET);
$response=array();
$info=array();
$hotelId=$_GET['hotelId'];
$query="select * from hotel where hotelId=$hotelId";
$row=mysqli_query($db,$query);
if($row)
{
	// echo "success";
 while($row1 = mysqli_fetch_assoc($row))
{
	array_push($info, $row1);

}
// var_dump($images);
$response['info']=$info;
$response['status']=true;

}
else
{
	// echo "failure";
	$response['status']=false;
}

// print_r($response);
echo json_encode($response);
?>
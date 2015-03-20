<?php
require_once("dbconfig.php");
session_start();
$category=$_POST['category'];
$hotelName=$_POST['hotelName'];
echo $category."----".$hotelName;
$sqlBets="update hotel set category='$category' where hotelName='$hotelName'";


$resultBets=mysqli_query($db,$sqlBets);
echo "Affected rows: " . mysqli_affected_rows($db);

if($resultBets)
{
	/*$arr = array('response' => 'bet deleted');
	echo json_encode($arr);*/
	echo "success";
}
else
{
	/*$arr = array('response' => 'error');
	echo json_encode($arr);*/
	echo "success";
}
?>
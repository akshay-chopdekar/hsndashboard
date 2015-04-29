<?php
require_once("dbconfig.php");
session_start();
$categoryId=$_POST['categoryId'];
$hotelName=$_POST['hotelName'];
echo $category."----".$hotelName;
$sqlBets="update hotel set categoryId={$categoryId} where hotelId='$hotelName'";


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
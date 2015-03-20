<?php
require_once("../dbconfig.php");
// print_r($_POST);
$url=$_POST['url'];
$hotelId=$_POST['hotelId'];
$result=array();
$sql="delete from hotelimages where imageUrl='{$url}' and hotelId={$hotelId}";

if(mysqli_query($db,$sql) && unlink("../".$url))
{
	$result='success';
	echo json_encode($result);
}
else
{
	$result='failure';
	echo json_encode($result);
}

?>
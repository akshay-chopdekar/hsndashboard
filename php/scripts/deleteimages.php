<?php
require_once("../dbconfig.php");
include('s3_config.php');
include('image_check.php');
// print_r($_POST);
$url=$_POST['url'];
$hotelId=$_POST['hotelId'];
$result=array();
$sql="delete from hotelimages where imageUrl='{$url}' and hotelId={$hotelId}";

/*if ($s3->deleteObject($bucket,$uri) && )  
	echo "File deleted successfully";
else 
	echo "sorry file could not be deleted";
*/
if($s3->deleteObject($bucket,$url) && mysqli_query($db,$sql))
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
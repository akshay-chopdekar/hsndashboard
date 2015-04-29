<?php
require_once("../dbconfig.php");
// print_r($_POST);
$promotionId=$_GET['promotionId'];

$final=array();
$sql="select confirmed from promotion where promotionId={$promotionId}";

$result=mysqli_query($db,$sql);
if($result)
{
	$final['status']="success";
	$res=mysqli_fetch_assoc($result);
	$final['confirmed']=$res['confirmed'];
}
else
{
	$final['status']="failure";
}

echo json_encode($final);
?>
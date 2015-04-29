<?php
require_once("../dbconfig.php");
print_r($_POST);
$status=$_POST['status'];
$profit=$_POST['profit'];
$promotionId=$_POST['promotionId'];

$sql="update promotion set confirmed={$status},profit={$profit} where promotionId={$promotionId}";

if(mysqli_query($db,$sql))
{
	$result='success';
	echo json_encode($result);
}
else
{
	$result='failure'.mysqli_error($db);
	echo json_encode($result);
}

?>
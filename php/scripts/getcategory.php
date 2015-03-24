<?php
require("../dbconfig.php");

$sql="select * from category";
$response=array();
$category=array();
$result=mysqli_query($db,$sql);
if($result)
{
	// echo "success";
	while ($res=mysqli_fetch_assoc($result)) 
	{
			array_push($response,$res);
	}
	$category['category']=$response;
	$category['status']=true;
}
else
{
	$category['status']=false;
}

echo json_encode($category);
?>
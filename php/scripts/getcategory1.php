<?php
require("../dbconfig.php");

if(isset($_GET['category']))
{
$sql="select description from category where categoryName='{$_GET['category']}'";
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
	$category['description']=$response;
	$category['status']=true;
}
else
{
	$category['status']=false.mysqli_error($db);
}
}
echo json_encode($category);
?>
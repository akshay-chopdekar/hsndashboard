<?php
require_once("../dbconfig.php");

$final=array();
$city=array();
$zones=array();

if(!isset($_GET['cityId']))
{
$sql="select * from cities where lang_Id=1";
$result=mysqli_query($db,$sql);
if($result)
{
	while ($res=mysqli_fetch_assoc($result)) {
			/*$final['status']='success';
			$final['city']=$res;*/
			// var_dump($res);
			array_push($city,$res);		
			$final['status1']='success1';
	}
}
else
{
	$final['status1']='failure1';
}
$final['city']=$city;
echo json_encode($final);
}
else
{

$sql1="select zone from zones where cityId={$_GET['cityId']} and lang_Id=1";
$result1=mysqli_query($db,$sql1);
if($result1)
{
	while ($res1=mysqli_fetch_assoc($result1)) {
			$final['status2']='success2 ';
			// $final['zone']=$res1;
			// var_dump($res);
			array_push($zones,$res1);		
			// $final['status2']='success2';
	}
}
else
{
	$final['status2']='failure2';
}
$final['zones']=$zones;
echo json_encode($final);
}
?>
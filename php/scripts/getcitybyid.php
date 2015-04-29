<?php
require("../dbconfig.php");
// print_r($_GET);
$response=array();
$info=array();
// print_r($_GET);
if(isset($_GET['city']))
{
$cityId=$_GET['city'];
$query="select city from cities where cityId={$cityId}";

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
}
else
{
	
}
// print_r($response);
echo json_encode($response);
?>
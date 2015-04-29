<?php
require("../dbconfig.php");
// print_r($_GET);
$response=array();
$hotelId=$_GET['hotelId'];
$query="select imageId,hotelId,imageUrl,priority from hotelimages where hotelId=$hotelId";
$row=mysqli_query($db,$query);
$images = array();
if(isset($row))
{
	// echo "success";
	while($row1 = mysqli_fetch_assoc($row))
	{
		array_push($images, $row1);
		// print_r($row1);
		// echo json_encode($row1);
		// array_push($response[], $row1['imageUrl']);
		// echo json_encode($row1['imageUrl']);
	}
	if(!empty($images))
	{
		$response['status1']=true;
		$response['imageUrl']=$images;
	
	}
	else
	{
		$response['status1']=false;
	}
}
else
{
	// echo "failure";
	$response['statusimagequery']=false;
}

//get priority of image
$query11="select imageId from hotelimages where hotelId=$hotelId and priority=1";
$row11=mysqli_query($db,$query11);
$priority = array();


if(isset($row11))
{
	// echo "success";
	$roww = mysqli_fetch_assoc($row11);
	
	// var_dump($roww);
	if(!empty($images))
	{
		if($roww['imageId'])
			{
				$response['priority']=$roww;
			}
			else
			{
				$roww['imageId']='';
				$response['priority']=$roww;
			}
	$response['status2']=true;
	}
	else
	{

		$response['status2']=false;
	}
}
else
{
	echo "failure";
	$response['statuspriority']=false;
}

// var_dump($images);


// print_r($response);
echo json_encode($response);

?>
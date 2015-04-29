<?php
require("../dbconfig.php");
include('s3_config.php');
include('image_check.php');

print_r($_POST);
// var_dump($_POST['hotels']);
var_dump($_FILES);

if(!isset($_POST['promotionTypeId']))
{
	if(isset($_FILES))
	{
	$promoName=$_POST['promoName'];
	$description=$_POST['description'];
	$hotels=$_POST['hotels'];
	$tagline=$_POST['tagline'];
	$hotels=explode(',',$hotels);
  $promotion =array();
  echo "hi<br/>";
	var_dump($hotels);

	/*if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	    echo "The file ". $_FILES["fileToUpload"]["name"]. " has been uploaded.";
	} else {
	    echo "Sorry, there was an error uploading your file.";
	}*/

		$target_file = $_FILES["fileToUpload"]["name"];
		$tmp=$_FILES["fileToUpload"]["tmp_name"];
		$size=$_FILES["fileToUpload"]["size"];
		$imageUrl=$target_file;
		$ext = getExtension($target_file);
		$date=gmdate("Y-m-d h:i:sa");
		// echo $date;

		//Rename image name.
		 
		$actual_image_name = $target_file;
		if(in_array($ext,$valid_formats))
		{
		 
		if($size<(1024*1024))
		{
		if($s3->putObjectFile($tmp, $bucket , 'campaignimages/'.$actual_image_name, S3::ACL_PUBLIC_READ))
		{
		$msg = "S3 Upload Successful.";	
		$imageUrl='https://'.$bucket.'.s3.amazonaws.com/'.'campaignimages/'.$actual_image_name;

					$sql="insert into promotiontype(promoName,description,bgimage,tagLine) values('{$promoName}','{$description}','{$imageUrl}','{$tagline}')";
				if(mysqli_query($db,$sql))
				{
				$promotionTypeId=mysqli_insert_id($db);
				echo "<br/>promotion type id is:".$promotionTypeId;
				$promotion['status']="image loop success";
			  $promotion['link']=$imageUrl;

				}
				else
				{

					echo "<br/>failure promotion type id ";
					$promotion['status']="image loop failure";
				}


		
		}
		else
		{
			// $msg="upload fail";
			$promotion['upload']=" upload failure";
		}
		}	
	else
		{
			// $msg="max size 1mb";
			$promotion['size']=" size limit of 1mb only";

		}
	}
	else
	{
		// $msg="please upload image file";
			$promotion['ext']=" please upload image file";
	}

	}
	else
	{
		$imageUrl="NULL";

		$sql="insert into promotiontype(promoName,description,bgimage) values('{$promoName}','{$description}','{$imageUrl}')";
		if(mysqli_query($db,$sql))
		{

		$promotionTypeId=mysqli_insert_id($db);
		echo "<br/>promotion type id is:".$promotionTypeId;

	/*	if($res1)
		{
			$proId=mysqli_fetch_assoc($res1);
			$promotionTypeId=$proId['promotionTypeId'];
		}
		else
		{
			echo "fetch empty</br>";
		}*/

		}
		else
		{
			echo "<br/>failure promotion type id ";
		}
	}

for($i=0;$i<sizeof($hotels);$i++)
{
	$hotl=$hotels[$i];
	echo "string length is".sizeof($hotels);
	echo "promotionTypeId".$promotionTypeId."hotel".$hotl."<br/>";
  $sql2="insert into promotionHotelRelation(promotionTypeId,hotelId) values({$promotionTypeId},{$hotl})";
  if(mysqli_query($db,$sql2))
  {
  echo "<br/>success";
  }
  else
  {
  	echo "<br/>failure pormotionHotelRelation ";
  	echo mysqli_error($db);
  }
}
}
else
{
$promotionTypeId=$_POST['promotionTypeId'];
$status=isset($_POST['status']) ? $_POST['status'] : null;
$tagline=$_POST['tagline'];
echo "<br/>promotionTypeId:".$promotionTypeId."  "."status:".$status."tagline ".$tagline;
	$sql3="update promotiontype set status={$status} ,tagline='{$tagline}' where promotionTypeId={$promotionTypeId}";

echo $sql3."<br/>";
	if(mysqli_query($db,$sql3))
	{
		echo "<br/> update success";
	}
	else
	{
		echo "error".mysqli_error($db);
	}
}


?>
<?php
require("../dbconfig.php");
print_r($_POST);
var_dump($_POST['hotels']);


if(!isset($_POST['promotionTypeId']))
{
	if(isset($_FILES))
	{
	$promoName=$_POST['promoName'];
	$description=$_POST['description'];
	$hotels=$_POST['hotels'];
	echo sizeof($hotels);
	var_dump($hotels);

	echo "/*/*/*/*/*/image upload code\*\*\*\*\*\*";
	$target_dir = "../../bgpromouploads/";
	$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
	$imageUrl=$target_file;
	$date=gmdate("Y-m-d h:i:sa");
	echo $date;

	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	    echo "The file ". $_FILES["fileToUpload"]["name"]. " has been uploaded.";
	} else {
	    echo "Sorry, there was an error uploading your file.";
	}
}
$imageUrl="NULL";
	$sql="insert into promotiontype(promoName,description,bgimage) values('{$promoName}','{$description}','{$imageUrl}')";
	if(mysqli_query($db,$sql))
	{

		$promotionTypeId=mysqli_insert_id($db);
		echo "promotion type id is:".$promotionTypeId;



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
		echo "failure</br>";
	}

for($i=0;$i<strlen($hotels);$i++)
{
	$hotl=$hotels[$i];
  $sql2="insert into pormotionhotelrelation(promotionTypeId,hotelId)values({$promotionTypeId},{$hotl})";
  mysqli_query($db,$sql2);
}
}
else
{
$promotionTypeId=$_POST['promotionTypeId'];
$status=$_POST['status'];
echo "promotionTypeId:".$promotionTypeId."  "."status:".$status;
	$sql3="update promotiontype set status={$status} where promotionTypeId={$promotionTypeId}";
	if(mysqli_query($db,$sql3))
	{
		echo " update success";
	}
}


?>
<?php

require("../dbconfig.php");

print_r($_POST);
$hotels=$_POST['hotels'];
$hotels=explode(',',$hotels);

var_dump($hotels);

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

 	$sql4="delete from promotionHotelRelation where promotionTypeId={$promotionTypeId}";
 	if(mysqli_query($db,$sql4))
 	{
 		echo "<br/> delete success";
 	}
 	else
 	{
 		echo "error".mysqli_error($db);
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
 ?>
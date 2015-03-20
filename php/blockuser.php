<?php
require_once("dbconfig.php");
session_start();
$hotelId=$_POST['hotelId'];
$timezone=$_POST['timezone'];
$description=$_POST['description'];
$imageUrl=$_POST['url'];

echo "hotel is is ".$hotelId." time zone ".$timezone." description is ".$description." url is ".$imageUrl;
var_dump($_POST);
var_dump($_FILES);
//**** timezone and description setting
$sql="update hotel set timezone='{$timezone}',description='{$description}' where hotelId={$hotelId}";
$result=mysqli_query($db,$sql) or mysqli_error($db);

if($result)
{
	echo " 1st loop success<br/>";
}
else
{
	echo "failure";
}
//**** priority setting

if($imageUrl=='')
{
	echo "url empty";
	// $sql1="update hotelimages set priority=1 where imageUrl='{$imageUrl}' and hotelId={$hotelId}";
}
else
{
	$sql1="update hotelimages set priority = if(priority=1,0,0),priority = if(imageUrl='{$imageUrl}',1,0) where hotelId={$hotelId} ";

if(mysqli_query($db,$sql1))
{
	echo "2nd loop success<br/>";
}
else
{
	echo "2nd loop fail";
	echo mysqli_error($db);
}

}

if($_FILES["fileToUpload"]["name"]!='')
{
	echo "/*/*/*/*/*/image upload code\*\*\*\*\*\*";
	$target_dir = "../uploads/";
	$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
	$imageUrl=$target_file;
	$date=gmdate("Y-m-d h:i:sa");
	echo $date;

	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	    echo "The file ". $_FILES["fileToUpload"]["name"]. " has been uploaded.";
	} else {
	    echo "Sorry, there was an error uploading your file.";
	}

	$query="insert into hotelimages(hotelId,imageUrl,date)values($hotelId,'$imageUrl','$date')";

	if(mysqli_query($db,$query))
	{
		echo "success";
	}
	else{
		echo "failure";
	}
}
else{
	echo "file is not uploaded";
}

/*$sql="update user set blocked='0' where user_id=".$userId;

$result=mysqli_query($db,$sql);

if($result)
{
	$toNotify      = $userName;
	$subjectNotify = "Bettergame block notification" ; 
	$messageNotify = " 
	Dear {$userName}\n\n
	You have been blocked from BetterTheGame due to inappropriate activity.\n\n
	Regards,\n
	BetterTheGame Team
	";
	// $messageNotify .= "\r\n".'Cover Letter of Resume '."\r\n".$resumeCover;
	$headersNotify = 'From: CampusWings Team'."\r\n";

	mail($toNotify, $subjectNotify, $messageNotify, $headersNotify);


	require_once("iosPushNotification.php");

	$arr = array('response' => 'user blocked');
	echo json_encode($arr);
}
else
{
	$arr = array('response' => 'error');
	echo json_encode($arr);
}*/
?>
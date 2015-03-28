<?php
require_once("dbconfig.php");
session_start();
$hotelId=$_POST['hotelId'];
$timezone=$_POST['timezone'];
$description=$_POST['description'];
$address=$_POST['address'];
$imageUrl=$_POST['url'];
$breakfast=$_POST['breakfast'];
$tradeName=$_POST['tradeName'];
$notes=$_POST['notes'];
$foodBeverage=$_POST['foodBeverage'];
$around=$_POST['around'];

echo "description is".$description." address is ".$address." imageUrl is ".$imageUrl." breakfast ".$breakfast." tradeName ".$tradeName." notes ".$notes." foodBeverage ".$foodBeverage." around ".$around;

echo "hotel is is ".$hotelId." time zone ".$timezone." description is ".$description." url is ".$imageUrl;
var_dump($_POST);
var_dump($_FILES);
//**** timezone and description setting
// $sql="update hotel set timezone='{$timezone}',description='{$description}' where hotelId={$hotelId}";
$sql="update hotel set hotelName='{$_POST['hotelName']}',star='{$_POST['star']}',roomAmount='{$_POST['roomAmount']}',star='{$_POST['star']}',roomAmount='{$_POST['roomAmount']}',checkInTime='{$_POST['checkInTime']}',checkOutTime='{$_POST['checkOutTime']}',breakfast='{$_POST['breakfast']}',tradeName='{$_POST['tradeName']}',address='{$_POST['address']}',postCode='{$_POST['postCode']}',phoneNumber='{$_POST['phoneNumber']}',fax='{$_POST['fax']}',fax='{$_POST['fax']}',emailId='{$_POST['emailId']}',website='{$_POST['website']}',salesPerson='{$_POST['salesPerson']}',salesPersonContact='{$_POST['salesPersonContact']}',accountName='{$_POST['accountName']}',accountContact='{$_POST['accountContact']}',wifi='{$_POST['wifi']}',complementaryWifi='{$_POST['complementaryWifi']}',selfParking='{$_POST['selfParking']}',selfParkingRate='{$_POST['selfParkingRate']}',valeParking='{$_POST['valeParking']}',valeParkingRate='{$_POST['valeParkingRate']}',complementaryParking='{$_POST['complementaryParking']}',conciergeService='{$_POST['conciergeService']}',petFriendly='{$_POST['petFriendly']}',outdoorPool='{$_POST['outdoorPool']}',indoorPool='{$_POST['indoorPool']}',fitnessCenter='{$_POST['fitnessCenter']}',sauna='{$_POST['sauna']}',spaServices='{$_POST['spaServices']}',airportShuttle='{$_POST['airportShuttle']}',rooftop='{$_POST['rooftop']}',dryCleaning='{$_POST['dryCleaning']}',ironing='{$_POST['ironing']}',nonSmoking='{$_POST['nonSmoking']}',notes='{$_POST['notes']}',around='{$_POST['around']}',24hrRoomService='{$_POST['24hrRoomService']}',roomService='{$_POST['roomService']}',restaurantOnsite='{$_POST['restaurantOnsite']}',barOnsite='{$_POST['barOnsite']}',extraGuestPolicy='{$_POST['extraGuestPolicy']}',flatScreenTV='{$_POST['flatScreenTV']}',satelliteTV='{$_POST['satelliteTV']}',miniBar='{$_POST['miniBar']}',hotBeverages='{$_POST['hotBeverages']}',kettle='{$_POST['kettle']}',electronicSafe='{$_POST['electronicSafe']}',airConditioning='{$_POST['airConditioning']}',hairDrier='{$_POST['hairDrier']}',workingDesk='{$_POST['workingDesk']}',childrenPolicy='{$_POST['childrenPolicy']}',timezone='{$_POST['timezone']}',category='{$_POST['category']}',hairDrier='{$_POST['hairDrier']}',latlong='{$_POST['latlong']}' where hotelId={$hotelId} ";
$result=mysqli_query($db,$sql) or mysqli_error($db);

if($result)
{
	echo " 1st loop success<br/>";
}
else
{
	echo "failure".mysqli_error($db);;
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
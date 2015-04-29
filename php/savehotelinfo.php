<?php
require_once("dbconfig.php");
include('scripts/s3_config.php');
include('scripts/image_check.php');
// session_start();
// 
// 
echo "district:".$_POST['district']."city:".$_POST['city']."zone:".$_POST['zones'];

$around=$_POST['around'];

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
$extraGuestPolicy=$_POST['extraGuestPolicy'];
$hotelinfo=array();
$hotelimages=array();

// echo "notes".$notes;
// echo "description is".$description." address is ".$address." imageUrl is ".$imageUrl." breakfast ".$breakfast." tradeName ".$tradeName." notes ".$notes." foodBeverage ".$foodBeverage." around ".$around;

// echo "hotel is is ".$hotelId." time zone ".$timezone." description is ".$description." url is ".$imageUrl;
// 
// var_dump($_POST);
// var_dump($_FILES);
// 
 
//**** timezone and description setting
// $sql="update hotel set timezone='{$timezone}',description='{$description}' where hotelId={$hotelId}";
$sql="update hotel set hotelName='{$_POST['hotelName']}',star='{$_POST['star']}',roomAmount='{$_POST['roomAmount']}',star='{$_POST['star']}',roomAmount='{$_POST['roomAmount']}',checkInTime='{$_POST['checkInTime']}',checkOutTime='{$_POST['checkOutTime']}',breakfast='{$_POST['breakfast']}',tradeName='{$_POST['tradeName']}',address='{$_POST['address']}',postCode='{$_POST['postCode']}',phoneNumber='{$_POST['phoneNumber']}',fax='{$_POST['fax']}',fax='{$_POST['fax']}',emailId='{$_POST['emailId']}',website='{$_POST['website']}',salesPerson='{$_POST['salesPerson']}',salesPersonContact='{$_POST['salesPersonContact']}',accountName='{$_POST['accountName']}',accountContact='{$_POST['accountContact']}',wifi='{$_POST['wifi']}',complementaryWifi='{$_POST['complementaryWifi']}',selfParking='{$_POST['selfParking']}',selfParkingRate='{$_POST['selfParkingRate']}',valeParking='{$_POST['valeParking']}',valeParkingRate='{$_POST['valeParkingRate']}',complementaryParking='{$_POST['complementaryParking']}',conciergeService='{$_POST['conciergeService']}',petFriendly='{$_POST['petFriendly']}',outdoorPool='{$_POST['outdoorPool']}',indoorPool='{$_POST['indoorPool']}',fitnessCenter='{$_POST['fitnessCenter']}',sauna='{$_POST['sauna']}',spaServices='{$_POST['spaServices']}',airportShuttle='{$_POST['airportShuttle']}',rooftop='{$_POST['rooftop']}',dryCleaning='{$_POST['dryCleaning']}',ironing='{$_POST['ironing']}',nonSmoking='{$_POST['nonSmoking']}',flatScreenTV='{$_POST['flatScreenTV']}',satelliteTV='{$_POST['satelliteTV']}',miniBar='{$_POST['miniBar']}',hotBeverages='{$_POST['hotBeverages']}',kettle='{$_POST['kettle']}',electronicSafe='{$_POST['electronicSafe']}',airConditioning='{$_POST['airConditioning']}',hairDrier='{$_POST['hairDrier']}',workingDesk='{$_POST['workingDesk']}',childrenPolicy='{$_POST['childrenPolicy']}',timezone='{$_POST['timezone']}',category='{$_POST['category']}',hairDrier='{$_POST['hairDrier']}',roomService={$_POST['roomService']},restaurantOnsite={$_POST['restaurantOnsite']},barOnsite={$_POST['barOnsite']},around='{$_POST['around']}',extraGuestPolicy='{$_POST['extraGuestPolicy']}',foodBeverage='{$_POST['foodBeverage']}',notes='{$notes}' where hotelId={$hotelId} ";

// $sql="update hotel set notes='{$notes}' where hotelId={$hotelId}";

$result=mysqli_query($db,$sql) or mysqli_error($db);

if($result)
{
	// echo " 1st loop success<br/>";
	$hotelinfo['status1']="1st loop success";
}
else
{
	// echo "failure";
	$hotelinfo['status2']="1st loop failure".mysqli_error($db);
}
//**** priority setting

if($imageUrl=='')
{
	// echo "url empty";
	$hotelinfo['imageUrl']="url empty";
	// $sql1="update hotelimages set priority=1 where imageUrl='{$imageUrl}' and hotelId={$hotelId}";
}
else
{
	$sql1="update hotelimages set priority = if(priority=1,0,0),priority = if(imageUrl='{$imageUrl}',1,0) where hotelId={$hotelId} ";

if(mysqli_query($db,$sql1))
{
	// echo "2nd loop success<br/>";
	$hotelinfo['status1']="2nd loop success";

}
else
{
	// echo "2nd loop fail";
	// echo mysqli_error($db);
	$hotelinfo['status2']="2nd loop failure";
}

}

if($_FILES["fileToUpload"]["name"]!='')
{
	// echo "/*/*/*/*/*/image upload code\*\*\*\*\*\*";
	$target_dir = "https://s3-us-west-2.amazonaws.com/imageshsn/";
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
	if($s3->putObjectFile($tmp, $bucket , 'hotelimages/'.$actual_image_name, S3::ACL_PUBLIC_READ))
	{
	$msg = "S3 Upload Successful.";	
	$imageUrl='https://'.$bucket.'.s3.amazonaws.com/'.'hotelimages/'.$actual_image_name;
	/*echo "<img src='$s3file' style='max-width:400px'/><br/>";
	echo '<b>S3 File URL:</b>'.$s3file;*/

	$query="insert into hotelimages(hotelId,imageUrl,date)values($hotelId,'$imageUrl','$date')";

	if(mysqli_query($db,$query))
	{
		// echo "success";
		$hotelimages['status']="image loop success";
		$hotelimages['link']=$imageUrl;
	}
	else{
		// echo "failure";
		$hotelimages['status']="image loop failure";

	}
	
	}
	else
	{
		// $msg="upload fail";
		$hotelimages['upload']=" upload failure";
	}
	}	
else
	{
		// $msg="max size 1mb";
		$hotelimages['size']=" size limit of 1mb only";

	}
}
else
{
	// $msg="please upload image file";
		$hotelimages['ext']=" please upload image file";

}


/*	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	    echo "The file ". $_FILES["fileToUpload"]["name"]. " has been uploaded.";
	    $query="insert into hotelimages(hotelId,imageUrl,date)values($hotelId,'$imageUrl','$date')";

	    if(mysqli_query($db,$query))
	    {
	    	echo "success";
	    }
	    else{
	    	echo "failure";
	    }
	} 
	else {
	    echo "Sorry, there was an error uploading your file.";
	}*/

	
}
else
{

	// echo "file is not uploaded";
		$hotelimages['error']="file is not uploaded ";
}
$hotel=array();
$hotel['hotelinfo']=$hotelinfo;
$hotel['hotelimages']=$hotelimages;

echo json_encode($hotel);


?>
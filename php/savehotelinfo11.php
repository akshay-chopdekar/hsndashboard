<?php
require_once("dbconfig.php");
include('scripts/s3_config.php');
include('scripts/image_check.php');
// session_start();
// 
// 
// echo "district:".$_POST['district']."city:".$_POST['city']."zone:".$_POST['zone'];

var_dump($_POST);
$imageUrl=addslashes($_POST['url']);

$hotelId=$_POST['hotelId'];
// $timezone=$_POST['timezone'];
$description=addslashes($_POST['description']);

$sql="update hotel set description='{$description}' where hotelId={$hotelId}";

$result=mysqli_query($db,$sql) or mysqli_error($db);

if($result)
{
	echo " 1st loop success<br/>";
	$hotelinfo['status1']="1st loop success";
}
else
{
	echo "failure".mysqli_error($db);
	$hotelinfo['status1']="1st loop failure".mysqli_error($db);
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
	$hotelinfo['status2']="2nd loop success";

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


// echo "<br/>".$sql."<br/>";
// echo "count is".$count;
// echo "post array is <br/>";
// print_r($_POST);
// 
// echo $_POST['breakfast'];
// echo $_POST['roomService'];
// echo $_POST['roomServiceHr24'];


?>
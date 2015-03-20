<?php
require_once("../dbconfig.php");

print_r($_POST);
// 

$promotionId=$_POST['promotionId'];
$text=$_POST['cdes1'];
$stat=$_POST['stat'];
echo "hello";
print_r($_FILES);


	echo "/*/*/*/*/*/image upload code\*\*\*\*\*\*";
	$target_dir = "../../bguploads/";
	$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
	$imageUrl=$target_file;
	

	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	    echo "The file ". $_FILES["fileToUpload"]["name"]. " has been uploaded.";
	} else {
	    echo "Sorry, there was an error uploading your file.";
	}

	$query="update promotion set tagline ='{$text}',bgimage='{$imageUrl}',status={$stat} where promotionId={$promotionId}";

	if(mysqli_query($db,$query))
	{
		echo "success";
	}
	else{
		echo "failure".mysqli_error($db);
	}

?>
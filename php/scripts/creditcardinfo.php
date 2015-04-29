<?php
require("../dbconfig.php");

// var_dump($_POST);
$creditCardNumber=$_POST['ccnumber'];
$cardHolderName=$_POST['ccname'];
$cardType=$_POST['cardtype'];
$expiryDate=$_POST['expdate'];
$securityCode=$_POST['securitycode'];

$creditCardQuery="insert into hsnAdminCreditInfo(creditCardNumber,cardHolderName,cardType,expiryDate,securityCode) values($creditCardNumber,'{$cardHolderName}','{$cardType}','{$expiryDate}',$securityCode)";
$creditCardInsert=mysqli_query($db,$creditCardQuery);

if($creditCardInsert)
{
	echo $messages['status']="success";
}
else
{
	echo $messages['status']="failure".mysqli_error($db);

}
?>
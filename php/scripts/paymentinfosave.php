<?php
	require_once("../dbconfig.php");
// print_r($_POST);
$type=$_POST['val'];
$hotelId=$_POST['hotelId'];
$status=array();
if($type=='banktransfer')
{
	$bankname=$_POST['val1'];
	$bankcode=$_POST['val2'];
	$accno=$_POST['val3'];

	$sql="insert into paymentInfo(paymentType,hotelId,bankName,accountNo,bankCode)values('$type',$hotelId,'$bankname',$accno,$bankcode)";

	$result=mysqli_query($db,$sql);
	if($result)
	{
		$status['statusbank']='true';
	}
	else
	{
		$status['statusbank']='false'.mysqli_error($db);
	}

}
else if($type='electroniccreditcard')
{
	$cardno=$_POST['val1'];
	$cardname=$_POST['val2'];
	$expdate=$_POST['val3'];

	$sql="insert into paymentInfo(paymentType,hotelId,creditCardNumber,expiryDate,cardType)values('$type','$hotelId',$cardno,'$expdate','$cardname')";

	$result=mysqli_query($db,$sql);
	if($result)
	{
		$status['statuscreditcard']='true';
	}
	else
	{
		$status['statuscreditcard']='false'.mysqli_error($db);
	}
	
}
echo json_encode($status);
?>
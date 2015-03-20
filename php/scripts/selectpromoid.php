<?php
require ('../dbconfig.php');

	$sql="select promoId from promocode";
$id= array();
	if($result=mysqli_query($db,$sql))
	{
		while($res=mysqli_fetch_assoc($result))
			array_push($id, $res);
	}
	else
	{
		echo "update failure";
	}
	echo json_encode($id);

?>
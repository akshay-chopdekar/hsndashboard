<?php
require ('../dbconfig.php');
$promoid=$_POST['id'];

	$sql="delete from promocode where promoId={$promoid}";

	if($result=mysqli_query($db,$sql))
	{
		echo "delete success";
	}
	else
	{
		echo "delete failure";
	}

?>
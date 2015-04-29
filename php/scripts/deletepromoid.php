<?php
require ('../dbconfig.php');
$promoid=$_POST['id'];
echo "promo id is".$promoid;
	$sql="delete from promocode where code='{$promoid}'";

	if($result=mysqli_query($db,$sql))
	{
		echo "delete success";
	}
	else
	{
		echo "delete failure";
	}

?>
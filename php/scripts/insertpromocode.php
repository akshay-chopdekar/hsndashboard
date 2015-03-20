<?php
require ('../dbconfig.php');
var_dump($_POST);
$promoid=$_POST['promoid'];
$promocode=$_POST['promocode'];
$associatedcredits=$_POST['associatedcredits'];

if(isset($promoid))
{
	$sql="update promocode set code='{$promocode}',associatedCredits={$associatedcredits} where promoid={$promoid}";

	$result=mysqli_query($db,$sql);
	if($result)
	{
		echo "update success";
	}
	else
	{
		echo "update failure";
	}

}
else
{
$sql="insert into promocode(code,associatedCredits) values('{$promocode}',{$associatedcredits})";

$result=mysqli_query($db,$sql);
if($result)
{
	echo "insert success";
}
else
{
	echo " insert failure";
}
}

?>
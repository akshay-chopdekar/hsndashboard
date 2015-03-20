<?php
require ("../dbconfig.php");

echo "hello";
// print_r($_POST);
// print_r($_GET);
$callrevIdI=$_POST['callrevId'];
$callhotelIdI=$_POST['callhotelId'];
$callstatIdI=$_POST['callstatId'];


for($i=0;$i<sizeof($callrevIdI);$i++)
{
    $callrevId=$callrevIdI[$i];
    $callstatId=$callstatIdI[$i];
    $callhotelId=$callhotelIdI[$i];
    // echo $callrevId."---".$callstatId."<br/>";

    $sql="update hotelreviews set status={$callstatId} where reviewId={$callrevId} and hotelId={$callhotelId}";
    $row=mysqli_query($db,$sql);
    if($row)
    {
        echo "success";
    }
    else
    {
        echo "failure";
    }
}


?>
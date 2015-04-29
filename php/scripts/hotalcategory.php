<?php  
	require_once("../dbconfig.php");
	
$queryReported="SELECT hotelId,hotelName,category FROM hotel WHERE confirmed=1";

	$resultReported = mysqli_query($db,$queryReported);
	$reported = array();
	
	while($row = mysqli_fetch_assoc($resultReported)){
		$reported[] = $row;
		// $totalCount++;

		 // if($searchTerm=="")
		 // 	$searchCount++;
	}
 

	echo json_encode(array('data'=>$reported),JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>
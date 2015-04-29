<?php  
	require_once("../php/dbconfig.php");
	
$totalCount = 0;
	$searchCount = 0;


/*	$queryReported = "SELECT 'photo' photoOrWing,photoId as postId,userName,photoUrl,description,display,shareWith,p.time time,seenReported FROM photo p INNER JOIN user u ON u.userId = p.userId where reportedBy is not null $searchPhoto 
	union 
  	SELECT 'wing' photoOrWing,wingId as postId,userName,bgColour,text,0,display,w.time time,seenReported FROM wings w INNER JOIN user u ON u.userId = w.userId  where reportedBy is not null $searchWing ORDER BY seenReported $dir";	
 */

$queryReported="SELECT p.`promotionId`,p.`hotelId`,h.`hotelName`,p.`refNo`,p.`profit` FROM promotion p INNER JOIN hotel h ON p.`hotelId`= h.`hotelId`;";

$resultReported = mysqli_query($db,$queryReported);
if($resultReported)
{
	// echo json_encode("success");
}
else
{
	// echo json_encode("failure".mysqli_error($db));
}
$reported = array();

	
	while($row = mysqli_fetch_assoc($resultReported)){
		$reported[] = $row;
		$totalCount++;

		 // if($searchTerm=="")
		 	$searchCount++;
	}

// json_encode($reported);

	// echo json_encode(array('data'=>$reported),JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>
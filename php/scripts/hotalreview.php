<?php  
	require_once("../dbconfig.php");
	


/*	$queryReported = "SELECT 'photo' photoOrWing,photoId as postId,userName,photoUrl,description,display,shareWith,p.time time,seenReported FROM photo p INNER JOIN user u ON u.userId = p.userId where reportedBy is not null $searchPhoto 
	union 
  	SELECT 'wing' photoOrWing,wingId as postId,userName,bgColour,text,0,display,w.time time,seenReported FROM wings w INNER JOIN user u ON u.userId = w.userId  where reportedBy is not null $searchWing ORDER BY seenReported $dir";	
 */

$queryReported="SELECT hotelId,hotelName FROM hotel WHERE confirmed=1";

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
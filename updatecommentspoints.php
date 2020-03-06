<?php

	include('connectSQL.php');
	$str_json = file_get_contents('php://input');
	$json_decode = json_decode($str_json, true);
	
	
	$examID = $json_decode('exID');
	//$comments = $json_decode('comment');
	$points = $json_decode('SCOREs');
	$qIDarray = $json_decode('QIDs');
	$conDed = $json_decode('conover');
	$colonDed = $json_decode('colover');
	$funcNameDed = $json_decode('fnover');
	$compileDed = $json_decode('compover');
	$testcaseDed = $json_decode('tcover');
	$conFB = $json_decode('concom');
	$colonFB = $json_decode('colcom');
	$funcNameFB = $json_decode('fncom');
	$compileFB = $json_decode('compcom');
	$testcaseFB = $json_decode('tccom');

	$updatescore = array_combine($points, $qIDarray);
	foreach($updatescore as $updateScores=>$qID1){
		$sql = "UPDATE student SET deductions='$updateScores' WHERE
		examID='$examID' AND qID='$qID1'";

		$query = mysqli_query($conn, $sql);

		if(!$query){
			echo mysqli_error($conn);
		}
		else{
			echo "UPDATED SCORES";
		}
	}

	$updateCon = array_combine($conDed, $qIDarray);
	foreach($updateCon as $updateCON=>$qID2) {
		$sql2 = "UPDATE testcasefinal SET conDed='$updateCON' WHERE
		examID='$examID' AND qID='$qID2'";

		$query2 = mysqli_query($conn, $sql2);

		if(!$query2){
			echo mysqli_error($conn);
		}
		else {
			echo "UPDATED CONSTRAINT DEDUCT";
		}
	}

	$updateColon = array_combine($colonDed, $qIDarray);
	foreach($updateColon as $updateCOLON=>$qID3) {
		$sql3 = "UPDATE testcasefinal SET colonDed='$updateCOLON' WHERE 
		examID='$examID' AND qID='$qID3'";
		$query3 = mysqli_query($conn, $sql3);

		if(!$query3){
			echo mysqli_error($conn);
		}
		else {
			echo "UPDATED COLON DEDUCT"
		}
												                }
	
	$updatefun = array_combine($funcNameDed, $qIDarray);
	foreach($updatefun as $updateFUN=>$qID4) {
		$sql4 = "UPDATE testcasefinal SET funcNameDed='$updateFUN' WHERE
		examID='$examID' AND qID='$qID4'";
		$query4 = mysqli_query($conn, $sql4);

		if(!$query4){
			echo mysqli_error($conn);
		}
		else {
			echo "UPDATED FUNC NAME DEDUCT";
		}
	}

	$updatecomp = array_combine($colonDed, $qIDarray);
	foreach($updatecomp as $updateCOMP=>$qID5) {
		$sql5 = "UPDATE testcasefinal SET compileDed='$updateCOMP' WHERE
		examID='$examID' AND qID='$qID5'";
		$query5 = mysqli_query($conn, $sql5);

		if(!$query5){
			echo mysqli_error($conn, $sql5);
		}
		else {
			echo "UPDATED COMPILE DEDUCT";
		}
		}

	$updateTC = array_combine($testcaseDed, $qIDarray);
	foreach($updateTC as $updatetc=>$qID6){
		$sql6 = "UPDATE testcasefinal SET testcaseDed='$updatetc' WHERE
		examID='$examID' AND qID='$qID6'";
		$query6 = mysqli_query($conn, $sql6);

		if(!$query6){
			echo mysqli_error($conn);
		}
		else {
			echo "UPDATED TESTCASE DEDUCT";
		}
		}

	$updateconfb = array_combine($conFB, $qIDarray);
	foreach($updateconfb as $updateCONFB=>$qID7) {
		$sql7 = "UPDATE testcasefinal SET conFB='$updateCONFB' WHERE
		examID='$examID' AND qID='$qID7'";
		$query7 = mysqli_query($conn, $sql7);

		if(!$query7){
			echo mysqli_error($conn);
		}
		else { 
			echo "UPDATED CONSTRAINT FEEDBACK";
		}
		}

	$updatecolonfb = array_combine($colonFB, $qIDarray);
	foreach($updatecolonfb as $updateCOLONFB=>$qID8){
		$sql8 = "UPDATE testcasefinal SET colonFB='$updateCOLONFB' WHERE
		examID='$examID' AND qID='$qID8'";
		$query8 = mysqli_query($conn, $sql8);

		if(!$query8){
			echo mysqli_error($conn);
		}
		else {
			echo "UPDATED COLON FEEDBACK";
		}
		}

	$updatefunfb = array_combine($funcNameFB, $qIDarray);
	foreach($updatefunfb as $updateFUNFB=>$qID9) {
		$sql9 = "UPDATE testcasefinal SET funcNameFB='$updateFUNFB' WHERE
		examID='$examID' AND qID='$qID9'";
		$query9 = mysqli_query($conn, $sql9);

		if(!$query9){
			echo mysqli_error($conn);
		}
		else {
			echo "UPDATED FUNCTION NAME FEEDBACK";
		}
		}

	$updatecompfb = array_combine($compileFB, $qIDarray);
	foreach($updatecompfb as $updateCOMPFB=>$qID10){
		$sql10 = "UPDATE testcasefinal SET compileFB='$updateCOMPFB' WHERE
		examID='$examID' AND qID='$qID10'";
		$query10 = mysqli_query($conn, $sql10);

		if(!$query10){
			echo mysqli_error($conn);
		}
		else {
			echo "UPDATED COMPILE FEEDBACK";
		}
		}

	$updatetcfb = array_combine($testcaseFB, $qIDarray);
	foreach($updatetcfb as $updateTCFB=>$qID11) {
		$sql11 = "UPDATE testcasefinal SET testcaseFB='$updateTCFB' WHERE 
		examID='$examID' AND qID='$qID11'";
		$query11 = mysqli_query($conn, $sql11);

		if(!$query11){
			echo mysqli_error($conn);
		}
		else{
			echo "UPDATED TESTCASE FEEDBACK";
		}
		}

	
 	mysqli_close($conn);
?>


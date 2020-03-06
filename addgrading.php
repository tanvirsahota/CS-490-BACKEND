<?php
  include('connectSQL.php');

  /* $loopcheck = $_POST['loopDed'];
   $print = $_POST[''];
   $whilecheck = $_POST[''];
   $colon = $_POST['colonDed'];
   $qconstraint = $_POST['constraintDed'];
   $funcName = $_POST['funcNameDed'];
   $extra = $_POST['extra'];
   $feedback = $_POST[''];*/


  $grade = $_POST['studentgrade'];
  $totalReductions = $_POST['QR'];
  $examID = $_POST['examID'];
  $answer = $_POST['answer'];
  $totalPoints = $_POST['points'];

  //$questiondeduction = $_POST['QD'];
  //$feedback = $_POST['QF'];
   echo '<br><br>';
   echo "TANVIRS DATABASE INSERTION $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$";
   echo var_dump($grade);
   echo '<br>';
   echo var_dump($totalReductions);
   echo '<br>';
   echo var_dump($examID);
   echo '<br>';*/
   echo var_dump($questiondeduction);
   echo '<br>';
   echo var_dump($feedback);


  echo '<br><br>';
  echo "@@@@@@@@@@@@@@@@@@@";
   $qD = array();
   $qd = $_POST['QD'];
   echo var_dump($og);
   $tempqd = $qd[0];
   $constraintDed = $tempqd['constraintDed'];
   echo var_dump($constraintDed);
   echo '<br>';
   $colonDed = $tempqd['colonDed'];
   $funcNameDed = $tempqd['funcNameDed'];
   $compileDed = $tempqd['compileDed'];
   $testcaseDed = $tempqd['testCaseDed'];

   $colon = implode(',',$colonDed);
   $con = implode(',',$constraintDed);
   $func = implode(',', $funcNameDed);
   $comp = implode(',', $compileDed);
   $tcd = implode(',' , $testcaseDed);

   $qF = array();
   $qf = $_POST['QF'];
   $tempqf = $qf[0];
   echo "@@@@@@@@@@@@@@@@@@@";
   echo var_dump($tempqf);
   $constraintFeed = $tempqf['feedConstraint'];
   $colonFeed = $tempqf['feedColon'];
   $funcNameFeed = $tempqf['feedFuncName'];
   $compileFeed = $tempqf['feedCompile'];
   $testcaseFeed = $tempqf['feedTestCase'];
   echo '<br>';
   echo var_dump($testcaseFeed);
   echo var_dump($colonFeed);
   $colonF = implode(',',$colonFeed);
   $conF = implode(',',$constraintFeed);
   $funcF = implode(',', $funcNameFeed);
   $compF = implode(',', $compileFeed);
   $tcdF = implode(',' , $testcaseFeed);
   echo '<br><br>';
   echo var_dump($tcdF);
   /*foreach($testcaseFeed as $value){
   	$insert = implode(",",$value);
	echo $insert;
	echo '<br>';
	$sqltcfeed = "UPDATE testcases SET testcaseFB = '$insert' WHERE
	examID='$examID'";
	$querytcfeed = mysqli_query($conn, $sqltcfeed);
	if(!$querytcfeed){
		echo mysqli_error($conn);
	} else {
		echo "TESTCASE FEEDBACK HAS BEEN INSERTED";
	}
   }*/
   $tcFEED = array();
   foreach($testcaseFeed as $value){
   	$insert = implode(",",$value);
	array_push($tcFEED, $insert);
   }
   $tcFEEDmid = array();
   foreach($tcFEED as $value){
   	$insert = implode(",", $value);
	echo $insert;
	array_push($tcFEEDmid, $value);
   }
   echo "*********************";
   echo var_dump($tcFEED);
   $tcFEEDfinal = implode(',', $tcFEEDmid);
   echo var_dump($tcFEEDfinal);
   $sqltest = "INSERT INTO testcases(examID, conDed, colonDed, funcNameDed,
   compileDed, testcaseDed, conFB, colonFB, funcNameFB, compileFB, testcaseFB)
   VALUES('$examID', '$con', '$colon', '$func', '$comp', '$tcd', '$conF',
   '$colonF', '$funcF', '$compF', '$tcFEEDfinal')";
    $querytest = mysqli_query($conn, $sqltest);
    if(!$querytest){
    	echo mysqli_error($conn);
	}
	else {
		echo "INSERTED INTO TESTCASE TABLE";
	}
$studentTableDeductions = array_combine($totalReductions, $answer);

   foreach($studentTableDeductions as $reduction=>$answers){
	$sql = "UPDATE student SET deductions='$reduction'
	WHERE examID='$examID' AND Sanswer='$answers' ";
	$query = mysqli_query($conn, $sql);

	if(!$query) {
		echo mysqli_error($conn);
	}
	else {
		echo "INSERTED";
	}
}

  $studentTableGrades = array_combine($grade, $answer);

   foreach($studentTableGrades as $g=>$answers2) {
	$sql2 = "UPDATE student SET studentGrade='$g'
	WHERE examID='$examID' AND Sanswer='$answers2'";
	$query2 = mysqli_query($conn, $sql2);

	if(!$query2) {
		echo mysqli_error($conn);
	}
	else {
		echo "GRADES INSERTED";
	}
   }

  mysqli_close($conn);
?>

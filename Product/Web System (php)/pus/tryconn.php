<?php require_once('DatabaseConnection.php'); ?>
<?php
session_start();
$Student_Id = $_POST['Student_Id'];
$exam_Id = $_POST['exam_Id'];
$Subject=$_POST["Subject"];
$SubjectId=$_POST["SubjectId"];
$Subject2=$_POST["Subject2"];
$SubjectId2=$_POST["SubjectId2"];
$Subject3=$_POST["Subject3"];
$SubjectId3=$_POST["SubjectId3"];
$Subject4=$_POST["Subject4"];
$SubjectId4=$_POST["SubjectId4"];
$Subject5=$_POST["Subject5"];
$SubjectId5=$_POST["SubjectId5"];
$Subject6=$_POST["Subject6"];
$SubjectId6=$_POST["SubjectId6"];
$Subject7=$_POST["Subject7"];
$SubjectId7=$_POST["SubjectId7"];
$Subject8=$_POST["Subject8"];
$SubjectId8=$_POST["SubjectId8"];
$Subject9=$_POST["Subject9"];
$SubjectId9=$_POST["SubjectId9"];
$Subject10=$_POST["Subject10"];
$SubjectId10=$_POST["SubjectId10"];
$Subject11=$_POST["Subject11"];
$SubjectId11=$_POST["SubjectId11"];
$Subject12=$_POST["Subject12"];
$SubjectId12=$_POST["SubjectId12"];
$Subject13=$_POST["Subject13"];
$SubjectId13=$_POST["SubjectId13"];
$Subject14=$_POST["Subject14"];
$SubjectId14=$_POST["SubjectId14"];
$Subject15=$_POST["Subject15"];
$SubjectId15=$_POST["SubjectId15"];

$marks=$_POST["marks"];
$marks2=$_POST["marks2"];
$marks3=$_POST["marks3"];
$marks4=$_POST["marks4"];
$marks5=$_POST["marks5"];
$marks6=$_POST["marks6"];
$marks7=$_POST["marks7"];
$marks8=$_POST["marks8"];
$marks9=$_POST["marks9"];
$marks10=$_POST["marks10"];
$marks11=$_POST["marks11"];
$marks12=$_POST["marks12"];
$marks13=$_POST["marks13"];
$marks14=$_POST["marks14"];
$marks15=$_POST["marks15"];

$grade=$_POST["grade"];
$grade2=$_POST["grade2"];
$grade3=$_POST["grade3"];
$grade4=$_POST["grade4"];
$grade5=$_POST["grade5"];
$grade6=$_POST["grade6"];
$grade7=$_POST["grade7"];
$grade8=$_POST["grade8"];
$grade9=$_POST["grade9"];
$grade10=$_POST["grade10"];
$grade11=$_POST["grade11"];
$grade12=$_POST["grade12"];
$grade13=$_POST["grade13"];
$grade14=$_POST["grade14"];
$grade15=$_POST["grade15"];

$checkQuery = "SELECT * FROM student WHERE Student_Id = '$Student_Id'";
$checkResult = mysql_query($checkQuery);
$studentExistBool = mysql_num_rows($checkResult);

if($studentExistBool > 0) {
	$qry = "INSERT INTO result(exam_Id,Student_Id,result_mark,result_grade,subject_id) VALUES ($exam_Id,$Student_Id,'$marks','$grade','$SubjectId')" ;
	if ($result1 = mysql_query($qry)){
		header("Location: result1.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}
}

$checkExam = "SELECT * FROM exam WHERE exam_Id = '$exam_Id'";
$examResult = mysql_query($checkExam);
$examExistBool = mysql_num_rows($examResult);

if($examExistBool > 0) {
	$qry1 = "INSERT INTO result(exam_Id,Student_Id,result_mark,result_grade,subject_id) VALUES ($exam_Id,$Student_Id,'$marks','$grade','$SubjectId')" ;
	if ($result1 = mysql_query($qry1)){
		header("Location: result1.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}
}

/*$sql="INSERT INTO result(exam_Id,Student_Id,result_mark,result_grade,subject_id) VALUES ('$marks','$grade','$SubjectId')" ;
if ($result = mysql_query($sql)){
		header("Location: disciplinerecord.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}
$sql2="INSERT INTO result(result_mark,result_grade,subject_id) VALUES ('$marks2','$grade2','$SubjectId2')";
if ($result2 = mysql_query($sql2)){
		header("Location: disciplinerecord.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}
	
$sql3="INSERT INTO result(exam_Id,Student_Idresult_mark,result_grade,subject_id) VALUES ('$marks3','$grade3,'$SubjectId3')";
if ($result3 = mysql_query($sql3)){
		header("Location: disciplinerecord.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}

$sql4="INSERT INTO result(result_mark,result_grade,subject_id) VALUES ('$marks4','$grade4','$SubjectId4')";
if ($result4 = mysql_query($sql4)){
		header("Location: disciplinerecord.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}

$sql5="INSERT INTO result(result_mark,result_grade,subject_id) VALUES ('$marks5','$grade5','$SubjectId5')";
if ($result5 = mysql_query($sql5)){
		header("Location: disciplinerecord.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}
	
$sql6="INSERT INTO result(result_mark,result_grade,subject_id) VALUES ('$marks6','$grade6','$SubjectId6')";
if ($result6 = mysql_query($sql6)){
		header("Location: disciplinerecord.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}
	
$sql7="INSERT INTO result(result_mark,result_grade,subject_id) VALUES ('$marks7','$grade7','$SubjectId7')";
if ($result7 = mysql_query($sql7)){
		header("Location: disciplinerecord.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}

$sql8="INSERT INTO result(result_mark,result_grade,subject_id) VALUES ('$marks8','$grade8','$SubjectId8')";
if ($result8 = mysql_query($sql8)){
		header("Location: disciplinerecord.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}

    
$sql9="INSERT INTO result(result_mark,result_grade,subject_id) VALUES ('$marks9','$grade9','$SubjectId9')";
if ($result9 = mysql_query($sql9)){
		header("Location: disciplinerecord.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}

$sql10="INSERT INTO result(result_mark,result_grade,subject_id) VALUES ('$marks10','$grade10','$SubjectId10')";
if ($result10 = mysql_query($sql10)){
		header("Location: disciplinerecord.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}

    
$sql11="INSERT INTO result(result_mark,result_grade,subject_id) VALUES ('$marks11','$grade11','$SubjectId11')";
if ($result11 = mysql_query($sql11)){
		header("Location: disciplinerecord.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}
	
$sql12="INSERT INTO result(result_mark,result_grade,subject_id) VALUES ('$marks12','$grade12','$SubjectId12')";
if ($result8 = mysql_query($sql12)){
		header("Location: disciplinerecord.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}

    
$sql13="INSERT INTO result(result_mark,result_grade,subject_id) VALUES ('$marks13','$grade13','$SubjectId13')";
if ($result13 = mysql_query($sql13)){
		header("Location: disciplinerecord.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}
	
$sql14="INSERT INTO result(result_mark,result_grade,subject_id) VALUES ('$marks14','$grade14','$SubjectId14')";
if ($result14 = mysql_query($sql14)){
		header("Location: disciplinerecord.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}

    
$sql15="INSERT INTO result(result_mark,result_grade,subject_id) VALUES ('$marks15','$grade15','$SubjectId15')";
if ($result9 = mysql_query($sql15)){
		header("Location: disciplinerecord.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}	
	
	?>*/
 mysql_close($conn); ?>   

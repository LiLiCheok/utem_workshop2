<?php require_once('DatabaseConnection.php');?>
<?php
$exam_type = $_POST["exam_type"];
$exam_category = $_POST["exam_category"];
$exam_date = $_POST["exam_date"];
$sql = "INSERT INTO exam(exam_type,exam_category,exam_date) VALUES ('$exam_type','$exam_category','$exam_date')";
	if ($result1 = mysql_query($sql)){
		header("Location: result1.php");
		echo "New student information has been addded";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}
	
?>
<?php  mysql_close($conn);?>
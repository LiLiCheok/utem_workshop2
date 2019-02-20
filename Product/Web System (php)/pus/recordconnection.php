<?php
	require_once('DatabaseConnection.php');
	session_start();
 ?>
<?php


//$Student_Id = $_POST['Student_Id'];
$Student_Name = $_POST['Student_Name'];
$Student_Ic_No = $_POST['Student_Ic_No'];
$parent_name = $_POST['parent_name'];
$parent_id = $_POST['parent_id'];
$parent_contactNo = $_POST['parent_contactNo'];
$Student_Class = $_POST['Student_Class'];
$HT_Id = $_SESSION['HT_Id'];
//$schoolName = $_POST['schoolName'];

$parentQuery = "SELECT * FROM parent WHERE parent_id = '$parent_id'";

$parentCheckResult = mysql_query($parentQuery);
$parentExistBool = mysql_num_rows($parentCheckResult);

if($parentExistBool > 0) {
	$sql1 = "INSERT INTO student(Student_Name,Student_Ic_No,parent_id,Student_Class,HT_Id) VALUES ('$Student_Name', '$Student_Ic_No','$parent_id','$Student_Class','$HT_Id')";
	if ($result1 = mysql_query($sql1)){
		header("Location: examinfo.php");
		echo "New student information has been addded";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}
}else{
		$sql2 = "INSERT INTO parent(parent_id, parent_name,parent_contactNo) VALUES ('$parent_id','$parent_name','$parent_contactNo')";
	if ($result2 = mysql_query($sql2)){
		"<script>alert('New student information has been addded');window.location.assign('examinfo.php');</script>";
		//echo "<br>" . " success";
	 }
	 
	 $sql1 = "INSERT INTO student(Student_Name,Student_Ic_No,parent_id,Student_Class,HT_Id) VALUES ('$Student_Name', '$Student_Ic_No','$parent_id','$Student_Class','$HT_Id')";
	if ($result1 = mysql_query($sql1)){
		header("Location: examinfo.php");
		echo "New student information has been addded";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}
	 
	 
}
/*	  
 $sql3 = "INSERT INTO school(School_Name,School_Type) VALUES ('$schoolName','$schooltype')";
	if ($result3 = mysql_query($sql3 )){
		 echo "<br>" . "success";
	 }
	 else{
		 echo "<br>" . "Data already exist " . mysql_error($conn);
	 }
*/

/*
$sql1 = "INSERT INTO student(Student_Id,Student_Name,Student_IcNo,Student_Class) VALUES ('$studentID','$studentName', '$studentIC', '$class')";
$result1 = mysqli_query($conn, $sql1)  or die(mysqli_error($conn));
 if ($result1 = mysql_query($sql1)){
	  
 $sql2 = "INSERT INTO parent(Parent_Name,Parent_ContactNo) VALUES ('$parentName','$parentNo')";
	 $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
	  if ($result2 = mysql_query($sql2)){
		  $sql3 = "INSERT INTO school(School_Name,School_Type) VALUES ('$schoolName','$schooltype')";
          $result3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
		  if($result2 = mysql_query($sql2)){
			  echo "<script>alert('Register Success!'); window.location.assign('academicresult.php');</script>";
		  }
		  else{
		  	echo "Failed";
	 	 }
	  }
	  else{
		  echo "Failed";
	  }


*/

//if (!$result1)
	// echo("Error description: " . mysqli_error($conn));
//if (!$result2)
	// echo("Error description: " . mysqli_error($conn));
//if (!$result3)
	// echo("Error description: " . mysqli_error($conn));

	//header ('Location:register.php');
	
?>
<?php mysql_close($conn);?>
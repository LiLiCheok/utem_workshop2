<?php require_once('DatabaseConnection.php'); ?>

<?php
$Student_Id = $_POST["Student_Id"];
$dr_type = $_POST["dr_type"];
$dr_description = $_POST["dr_description"];


$sql = "INSERT INTO disciplinary_record(Student_Id,dr_type,dr_description) VALUES ('$Student_Id','$dr_type', '$dr_description')";

	 
//$sql = "INSERT INTO disciplinary_record VALUES 'Student_Id'='$Student_Id', 'dr_type'='$dr_type','dr_description'='$dr_description'";
//$result = mysql_query($conn, $sql);

if ($result = mysql_query($sql)){
		header("Location: logout.php");
		echo "Success";
 	}
 	else{
		echo "Failed" . mysql_error($conn);
	}
?>
<?php mysql_close($conn);?>
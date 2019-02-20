<?php

	//Include database.php to allow database connection.
	include('database.php');
	
	//if submit button is pressed.
	if(isset($_POST['submitApprover'])){
		//Assign specified attributes value.
		$approverName = $_POST['approverName'];
		$approverPosition = $_POST['approverPosition'];
		$approverStatus = $_POST['approverStatus'];
		
		//Insert query
		$insertVariable  = "INSERT INTO approver (";
		$insertVariable .= " Approver_Name, Approver_Position, Approver_Status";
		$insertVariable .= ") VALUES (";
		$insertVariable .= " '$approverName', '$approverPosition', '$approverStatus'";
		$insertVariable .= ")";
		
		//Execute Insert query
		if (mysql_query($insertVariable)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $insertVariable . "<brs>" . mysql_error($db);
		}
		
		//Close connection
		mysql_close($db);
		
		//Redirect to ???Homepage???
		header('Location: http://localhost/bengkel2/pus/index.php');
	}

?>

<form method="post">
	<p>
		Name:
		<input type="text" name="approverName">
	</p>
	<p>
		Position: 
		<input type="text" name="approverPosition">
	</p>
	<p>Status:</br>
		<input type="radio" name="approverStatus" value="a">Active</br>
		<input type="radio" name="approverStatus" value="b">Inactive</br>
		<input type="radio" name="approverStatus" value="c">Retired</br>	
	</p>
	<input type="submit" name="submitApprover" value="Submit">
</form>
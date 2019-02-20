<?php

	//Include database.php to allow database connection.
	include('database.php');
	
	//Catch Approver ID
	$approverID = $_GET['approver'];
	
//	if($submitApprover){
	if(isset($_POST['submitApprover'])){
		//Assign specified attributes value.
		$approverID = $_POST['approver'];
		$approverName = $_POST['approverName'];
		$approverPosition = $_POST['approverPosition'];
		$approverStatus = $_POST['approverStatus'];
		
		//Build the SQL Statement
		$sqlUpdate	 = "UPDATE approver SET Approver_Name=\"$approverName\", ";
		$sqlUpdate	.= "Approver_Position = \"$approverPosition\", ";
		$sqlUpdate	.= "Approver_Status = '$approverStatus' ";
		$sqlUpdate	.= "WHERE Approver_Id = '$approverID'";
				
		//Update database
		if (mysql_query($sqlUpdate)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sqlUpdate . "<brs>" . mysql_error($db);
		}
		
		//Close connection
		mysql_close($db);
		
		//Redirect to ???Homepage???
		header('Location: http://localhost/bengkel2/pus/index.php');
	}
	
	//SQL Statement to get the approver.
	$sql = "SELECT * FROM approver WHERE Approver_Id = \"". $approverID . "\"";
	$result = mysql_query($sql);
	
	//Hold the data into an associative array.
	$row = mysql_fetch_assoc($result);
	
	

?>

<form method="post">
	<p>
		Name:
		<input type="text" name="approverName" 
		value="<?php echo $row["Approver_Name"] ?>">
	</p>
	<p>
		Position: 
		<input type="text" name="approverPosition" 
		value="<?php echo $row["Approver_Position"] ?>">
	</p>
	<p>Status:</br>
		<input type="radio" name="approverStatus" value="a"
		<?php
			if($row["Approver_Status"] == 'a')
				{echo "checked = \"checked\"";}
		?>
		>Active</br>
		<input type="radio" name="approverStatus" value="b"
		<?php
			if($row["Approver_Status"] == 'b')
				{echo "checked = \"checked\"";}
		?>
		>Inactive</br>
		<input type="radio" name="approverStatus" value="c"
		<?php
			if($row["Approver_Status"] == 'c')
				{echo "checked = \"checked\"";}
		?>
		>Retired</br>	
	</p>
	<input type="hidden" name="approver" value=<?php echo $approverID ?>>
	<input type="submit" name="submitApprover" value="Submit">
</form>
<?php
	//Include database.php to allow database connection.
	include('database.php');

	//Catch School Id
	$schoolId = $_GET['school'];
	
	if(isset($_POST['editSchool'])){
		//Assign specified attributes value.
		$schoolId = $_POST['school'];
		$schoolName = $_POST['schoolName'];
		$schoolArea = $_POST['schoolArea'];
		
		//Build the SQL Statement
		$sqlUpdate	 = "UPDATE school SET School_Name=\"$schoolName\", ";
		$sqlUpdate	.= "School_Location = \"$schoolArea\" ";
		$sqlUpdate	.= "WHERE School_Id = '$schoolId'";
		
		if (mysql_query($sqlUpdate)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sqlUpdate . "<brs>" . mysql_error($db);
		}
		mysql_close($db);
		
		header("Location: http://localhost/bengkel2/pus/index.php");
	}
	
	//SQL Statement to get school object in School Table.
	$sql = "SELECT * FROM school WHERE School_Id = \"" . $schoolId . "\"";
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
?>

<form method="post">
	<p>
		School Name:
		<input type="text" name="schoolName" value="<?php echo $row["School_Name"]; ?>">
	</p>
	<p>School Area Location:</br>
		<input type="radio" name="schoolArea" value="a"
		<?php
			if($row["School_Location"] == 'a')
				echo "checked>";
			else
				echo ">";
		?>
		Melaka Tengah</br>
		<input type="radio" name="schoolArea" value="b"
		<?php
			if($row["School_Location"] == 'b')
				echo "checked>";
			else
				echo ">";
		?>
		Alor Gajah</br>
		<input type="radio" name="schoolArea" value="c"
		<?php
			if($row["School_Location"] == 'c')
				echo "checked>";
			else
				echo ">";
		?>
		Jasin</br>	
	</p>
	<input type="hidden" name="school" value="<?php echo $schoolId; ?>">
	<input type="submit" name="editSchool" value="Submit">
</form>
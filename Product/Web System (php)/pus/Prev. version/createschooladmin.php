<?php

	//Include database.php to allow database connection.
	include('database.php');
	
	//Catch when submit button is clicked.
//	$submit = @$_POST['submitCreateSchoolAdmin'];
	
	/*
	 * If sumbit variable has value (submit button has been clicked),
	 * check all field has value or not.
	 * If has value, insert the variables above into the table school_admin
	 * in the database.
	 */
//	if($submit){
	if(isset($_POST['submitCreateSchoolAdmin']))
		$school = $_POST["school"]
		$SA_Name = $_POST["adminName"];
		$defaultPassword = "1234";
		$workingZone = $_POST['workingZone'];
		
		//Check if Admin Name field is not empty.
		if($SA_Name != null){
			
			//Check if Working Zone is not selected.
			if($workingZone != null){
			
			//Create connection to database.
			include('database.php');
			
			//Insert data into database.
			$insertVariable  = "INSERT INTO school_admin (";
			$insertVariable .= " Publisher_Id, School_Id, SA_Name, SA_Password, SA_WorkingZone";
			$insertVariable .= ") VALUES (";
			//the value 1 for Publisher_Id will be hold in Session update when needed.
			$insertVariable .= " 1, '$school', '$SA_Name', '$defaultPassword', '$workingZone'";
			$insertVariable .= ")";
			
			if (mysql_query($insertVariable)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $insertVariable . "<brs>" . mysql_error($db);
			}
			
			mysql_close($db);
		
			header("Location: http://localhost/bengkel2/pus/index.php");
			

			
			}else
				//If Admin Name field is empty.
				echo "<p>Your Admin Name field is empty.</p>";
		}
		
	}

?>

<form method="post">
	<p>Admin Name:<input type="text" name="adminName"></p>
	<p>
		Working Zone:</br>
		<input type="radio" name="workingZone" value="a">Melaka Tengah</br>
		<input type="radio" name="workingZone" value="b">Alor Gajah</br>
		<input type="radio" name="workingZone" value="c">Jasin</br>
	</p>
	<p>
		School:</br>
		<?php
			//Get School
			$query = "SELECT * FROM school ORDER BY School_Location";
			$result = mysql_query($query);
			
			while($row = mysql_fetch_assoc($result)){
				//Echo out input school radio button.
				echo "<input type=\"radio\" ";
				echo "name=\"school\" ";
				echo "value=\"" . $row["School_Id"] . "\" >";
				echo $row["School_Name"] . "</br>";
			}
		?>
	</p>
	<p><input type="submit" name="submitCreateSchoolAdmin" value="Submit"></p>
	

</form>
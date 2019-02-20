<?php
	//Include database.php to allow database connection.
	include('database.php');

	//If button is submitted.
	$createSchool = @$_POST['createSchool'];
	
	if($createSchool){
		//Assign specified attributes value.
		$schoolName = $_POST['schoolName'];
		$schoolArea = $_POST['schoolArea'];
		
		$insertVariable  = "INSERT INTO school (";
		$insertVariable .= " School_Name, School_Location";
		$insertVariable .= ") VALUES (";
		$insertVariable .= " '$schoolName', '$schoolArea'";
		$insertVariable .= ")";
		
		if (mysql_query($insertVariable)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $insertVariable . "<brs>" . mysql_error($db);
		}
		mysql_close($db);
		
		header("Location: http://localhost/bengkel2/pus/index.php");
	}	

?>

<form method="post">
	<p>
		School Name:
		<input type="text" name="schoolName">
	</p>
	<p>School Area Location:</br>
		<input type="radio" name="schoolArea" value="a">Melaka Tengah</br>
		<input type="radio" name="schoolArea" value="b">Alor Gajah</br>
		<input type="radio" name="schoolArea" value="c">Jasin</br>	
	</p>
	<input type="submit" name="createSchool" value="Submit">
</form>
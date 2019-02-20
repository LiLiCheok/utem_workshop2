<?php
	
	//Include database.php to allow database connection.
	include('database.php');
	
	//Hold submitted values of form into variable
	$announcementTitle = @$_POST['announcementTitle'];
	$announcementDescription = @$_POST['announcementDescription'];
	$verifiedBy = @$_POST['verifiedBy'];
	
	//Hold value if submission is done
	$submitAnnouncement = @$_POST['submitAnnouncement'];
	
	if(isset($_POST['submitAnnouncement'])){
		$insertVariable  = "INSERT INTO area_announcement (";
		$insertVariable .= " Publisher_Id, Approver_Id, AA_Title, AA_DateTime, AA_Type, AA_Description";
		$insertVariable .= ") VALUES (";
		//the value 1 for Publisher_Id will be hold in Session update when needed.
		$insertVariable .= " 1, '$verifiedBy', '$announcementTitle', NOW(), 'a', '$announcementDescription'";
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
		Title: <input type="text" name="announcementTitle">
	</p>
	<p>
		Description:</br>
		<textarea rows=20 cols=70 name="announcementDescription"></textarea>
	</p>
	<p>Verified by:</br>
		<?php
			$sql = "SELECT * FROM approver WHERE Approver_Status='a'";
			$result = mysql_query($sql);
			while($row = mysql_fetch_assoc($result)){
				echo "<input type=\"radio\" name=\"verifiedBy\" value=\"";
				echo $row['Approver_Id'];
				echo "\">";
				echo $row["Approver_Name"];
				echo "\t|\t";
				echo $row["Approver_Position"];
				echo "</br>";
			}
		?>
	</p>
	<input type="submit" name="submitAnnouncement" value="Submit">
</form>
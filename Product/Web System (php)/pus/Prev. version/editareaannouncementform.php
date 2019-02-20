<?php

	//Include database.php to allow database connection.
	include('database.php');
	
	//Catch Approver ID
	$areaannouncementID = @$_GET['areaannouncement'];
	
	//If button is submitted.
	$submitAnnouncement = @$_POST['submitAnnouncement'];
	
	if($submitAnnouncement){
		//Assign specified attributes value. 
		$areaAnnouncementID = $_POST['areaAnnouncement'];
		$announcementTitle = $_POST['announcementTitle'];
		$announcementDescription = $_POST['announcementDescription'];
		$verifiedBy = $_POST['verifiedBy'];
		
		//Build the SQL Statement
		$sqlUpdate	= "UPDATE area_announcement SET AA_Title=\"" . $announcementTitle
					. "\", AA_Description = \"" . $announcementDescription
					. "\", Approver_Id = \"" . $verifiedBy 
					. "\" WHERE AA_Id = \"" . $areaannouncementID . "\"";
				
		//Update database
		mysql_query($sqlUpdate);
		
		//Close connection
		mysql_close($db);
		
		//Redirect to ???Homepage???
		header('Location: http://localhost/bengkel2/pus/index.php');
	}
	
	//SQL Statement to get the area announcement.
	$sql = "SELECT * FROM area_announcement WHERE AA_Id = \"". $areaannouncementID . "\"";
	$result = mysql_query($sql);
	
	//Hold the data into an associative array.
	$row = mysql_fetch_assoc($result);
	
	

?>

<form method="post">
	<p>
		Title: <input type="text" name="announcementTitle"
		value="<?php echo $row["AA_Title"]; ?>">
	</p>
	<p>
		Description:</br>
		<textarea rows=20 cols=70 name="announcementDescription">
		<?php echo htmlspecialchars($row["AA_Description"]); ?>
		</textarea>
	</p>
	<p>Verified by:</br>
		<?php
			$sql2 = "SELECT * FROM approver WHERE Approver_Status='a'";
			$result2 = mysql_query($sql2);
			while($row2 = mysql_fetch_assoc($result2)){
				echo "<input type=\"radio\" name=\"verifiedBy\" value=\"";
				echo $row2['Approver_Id'];
				echo "\" ";
				if($row["Approver_Id"] == $row2["Approver_Id"])
					echo "checked>";
				else
					echo ">";
				echo $row2["Approver_Name"];
				echo "\t|\t";
				echo $row2["Approver_Position"];
				echo "</br>";
			}
		?>
	</p>
	<input type="hidden" name="areaAnnouncement" value=<?php echo $areaannouncementID ?>>
	<input type="submit" name="submitAnnouncement" value="Submit">
</form>

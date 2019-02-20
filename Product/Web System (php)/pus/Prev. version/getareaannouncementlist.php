<?php

	//Include database.php to allow database connection.
	include('database.php');
	
	//SQL Statement to get all object in Area Announcement Table.
	$sql = "SELECT * FROM area_announcement ORDER BY AA_Id";
	$result = mysql_query($sql);
	
	//Assign number index for listing display.
	$numberIndex = 0;
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
<?php	
	/**
	 * Assign the result of query into associative array.
	 * While the result still have more result,
	 * Do what is in the curly brackets.
	 */
	while ($row = mysql_fetch_assoc($result)) {
			echo ++$numberIndex;
			echo " \t";
			echo $row["AA_Title"];
			echo " \t";
			echo $row["AA_DateTime"];
			echo " \t";
			
			//Get Approver details.
			$sql2 = "SELECT * FROM approver WHERE Approver_Id = \"" . $row["Approver_Id"] . "\"";
			$result2 = mysql_query($sql2);
			$row2 = mysql_fetch_assoc($result2);
			echo $row2["Approver_Name"];
			echo " \t";

			echo '<a href="displayareaannouncement.php?areaannouncement='.$row["AA_Id"].'"><img src="images\Icon\open-iconic-master\png\check-2x.png"></a>'; 	
			echo nl2br("\n");
	}

?>
	</body>
</html>

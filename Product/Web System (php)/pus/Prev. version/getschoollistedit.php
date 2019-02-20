<?php
	//Include database.php to allow database connection.
	include('database.php');
	
	//SQL Statement to get all object in School Table.
	$sql = "SELECT * FROM school ORDER BY School_Id";
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
		echo $row["School_Name"];
		echo " \t";
		if($row["School_Location"] == 'a')
			echo "Melaka Tengah";
		else if($row["School_Location"] == 'b')
			echo "Alor Gajah";
		else
			echo "Jasin";
		echo " \t";
		echo '<a href="editschool.php?school='.$row["School_Id"].'"><img src="images\Icon\open-iconic-master\png\check-2x.png"></a>'; 	
		echo nl2br("\n");
	}

?>
	</body>
</html>
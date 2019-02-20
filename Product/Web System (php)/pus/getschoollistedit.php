<?php
	//Include database.php to allow database connection.
	include('database.php');
	
	//Start session
	session_start();
	
	//SQL Statement to get all object in School Table.
	$sql = "SELECT * FROM school ORDER BY School_Type";
	$result = mysql_query($sql);
	
	//Assign number index for listing display.
	$numberIndex = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="CSS/Layout.css" rel="stylesheet" type="text/css" />
	<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="CSS/image/EventUTeMOK.png">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Parent Updater System - Edit School List</title>
	<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<!-- Holder holds (UTeM) logo -->
	<div id="Holder"> 
		<div id="Header"><img src="CSS/image/LogoJawi.png" width="200" height="100" longdesc="image/EventUTeMOK.jpg" />	</div>
		<div id="NavBar">
			<nav>
				<ul>
					<li><a href="indexpublisheradmin.php">Home</a></li>
					<li><a>Announcement</a>
						<ul>
							<li><a href="getareaannouncementlist.php">View Announcements</a></li>
                            <li><a href="createareaannouncement.php">Create Area Announcement</a></li>
                            <li><a href="getareaannouncementlistedit.php">Edit Area Announcement</a></li>
						</ul><!--end inner UL-->
					</li>
                   	<li><a>School</a>
                    	<ul>
                        	<li><a href="createschool.php">Create School</a></li>
                            <li><a href="getschoollistedit.php">Edit School</a></li>
                            <li><a href="createschooladmin.php">Create School Admin</a></li>
<!--                        <li><a href="#">Edit School Admin</a></li>			-->
                        </ul>
                    </li>
					<li><a href="#">Logout</a></li> <!--end login LI-->      
				</ul>
			</nav>
		</div>
		<p>&nbsp;</p>    
		<div id="Content">
				<h2>Edit Area Announcements</h2>
				<br />
				<br />
				<table width="973" witdh="100%">
					<tr id="announcement-table-header" height="25px"  bgcolor="#CCCCCC">
						<td>No.</td><td>Title</td><td>School Type</td><td>Edit</td>
					</tr>
                    <?php	
						/**
						 * Assign the result of query into associative array.
						 * While the result still have more result,
						 * Do what is in the curly brackets.
						 */
						while ($row = mysql_fetch_assoc($result)) {
							echo "<tr><td>";
							echo ++$numberIndex;
							echo "</td><td>";
							echo $row["School_Name"];
							echo "</td><td>";
							echo $row["School_Type"];
							echo "</td><td>";
							echo '<a href="editschool.php?school='.$row["School_Id"].'"><img src="images\Icon\open-iconic-master\png\check-2x.png"></a>';
							echo "</td></tr>";
							echo nl2br("\n");
						}

					
					?>
				</table>
				<br />

	  </div>
			<div id="ContentRight" align="right">
            </div>
		</div>
		<div id="Footer"></div>
	</div>
</body>
</html>
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
		echo $row["School_Type"];
		echo " \t";
		echo '<a href="editschool.php?school='.$row["School_Id"].'"><img src="images\Icon\open-iconic-master\png\check-2x.png"></a>'; 	
		echo nl2br("\n");
	}

?>
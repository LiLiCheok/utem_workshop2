<?php

	//Include database.php to allow database connection.
	include('database.php');
	
	//Start Session.
	session_start();
	
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
	<title>Parent Updater System - Edit School Announcement List</title>
	<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<!-- Holder holds (UTeM) logo -->
	<div id="Holder"> 
		<div id="Header"><img src="CSS/image/LogoJawi.png" width="200" height="100" longdesc="image/EventUTeMOK.jpg" />	</div>
		<div id="NavBar">
			<nav>
				<ul>
					<li><a href="indexschooladmin.php">Home</a></li>
					<li><a href="getareaannouncementlistschool.php">Area Announcements</a></li>
                   	<li><a>School Announcement</a>
                    	<ul>
                        	<li><a href="getschoolannouncementlistschool.php">View Announcement</a></li>
                        	<li><a href="createschoolannouncement.php">Create Announcement</a></li>
                            <li><a href="getschoolannouncementlistedit.php">Edit Announcement</a></li>
                        </ul>
                    </li>
					<li><a href="logout.php">Logout</a></li>   
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
						<td>No.</td><td>Title</td><td>Date</td><td>Publisher</td><td>Author</td><td>Edit</td>
					</tr>
                    <?php	
						/**
						 * Assign the result of query into associative array.
						 * While the result still have more result,
						 * Do what is in the curly brackets.
						 */
						 $SA_Id = $_SESSION["SA_Id"];
					 	$sqlQuery = "SELECT * FROM school_announcement WHERE SA_Id = '$SA_Id' ORDER BY a_id DESC";
						$SAResult = mysql_query($sqlQuery);
						while ($SARow = mysql_fetch_assoc($SAResult)) {
							//echo $AARow["a_Id"];
							echo "<tr bgcolor=\"#FFFFFF\">";
							echo "<td>" . ++$numberIndex;
							echo "</td><td>";
							
							$sqlQueryAnnouncement = "SELECT * FROM announcement WHERE a_id = \"" . $SARow["a_id"] . "\"";
							$announcementResults = mysql_query($sqlQueryAnnouncement);
							
							$announcementDetails = mysql_fetch_assoc($announcementResults);
							echo $announcementDetails["a_title"];
							echo "</td><td>";
							echo $announcementDetails["a_created"];
							echo "</td><td>";
								
							//Get Approver details.
							$sqlQueryApprover = "SELECT * FROM approver WHERE Approver_Id = \"" . $announcementDetails["Approver_Id"] . "\"";
							$resultApprover = mysql_query($sqlQueryApprover);
							$approverRow = mysql_fetch_assoc($resultApprover);
							echo $approverRow["Approver_Name"];
							echo "</td><td>";
							
							//Get Publisher Name
							$sqlQueryAuthor = "SELECT SA_Id, SA_Name FROM school_admin WHERE SA_Id = \"" . $SARow["SA_Id"] . "\"";
							$resultAuthor = mysql_query($sqlQueryAuthor);
							$SARow = mysql_fetch_assoc($resultAuthor);
							echo $SARow["SA_Name"];
							echo "</td><td>";
							
							
							echo '<a href="editschoolannouncementform.php?schoolannouncement='.$SARow["SA_Id"] .'&announcement='.$announcementDetails["a_id"] .'&approver='. $approverRow["Approver_Id"] .'&publisher='. $SARow["SA_Id"] .'"><img src="images\Icon\open-iconic-master\png\check-2x.png"></a></td>';
										
									
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
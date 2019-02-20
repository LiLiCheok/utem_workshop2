<?php
	
	//Include database.php to allow database connection
	include('database.php');
	
	//Start Session.
	session_start();
	
	//Test to see all in session variables
	print_r($_SESSION);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="CSS/Layout.css" rel="stylesheet" type="text/css" />
	<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="CSS/image/EventUTeMOK.png">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Parent Updater System - Publisher Admin Homepage</title>
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
					<li><a href="logout.php">Logout</a></li> <!--end login LI-->      
				</ul>
			</nav>
		</div>
		<p>&nbsp;</p>    
		<div id="Content">
			<div id="ContentLeft">
				<h2>Welcome School Admin: <?php echo $_SESSION["Publisher_Name"]; ?></h2>
				<br />
				<br />
				<table width="958">
					<tr id="announcement-table-header" height="25px" bgcolor="#CCCCCC">
						<td width="47">No.</td><td width="353">Title</td><td width="167">Date</td><td width="371">Publisher</td>
					</tr>
                     <?php
						
						$index = 0;
						
						//Get announcement details
						$sqlQueryAnnouncement = "SELECT * FROM announcement ORDER BY a_id DESC LIMIT 5";
						$announcementResult = mysql_query($sqlQueryAnnouncement);
						;
						
						while($latestAnnouncement = mysql_fetch_assoc($announcementResult)){
						echo "<tr class=\"announcement-rows\" bgcolor=\"#FFFFFF\">";
							echo "<td>". ++$index ."</td><td>";
							echo $latestAnnouncement["a_title"];
							echo "</td><td>";
							echo $latestAnnouncement["a_created"];
							echo "</td><td>";
							
							//Get Approver Details
							$sqlQueryApprover = "SELECT * FROM approver WHERE Approver_Id = '" . $latestAnnouncement["Approver_Id"] . "'";
							$approverResult = mysql_query($sqlQueryApprover);
							$approverRow = mysql_fetch_assoc($approverResult);
							
							echo $approverRow["Approver_Name"];
							echo "</td>";
						echo "</tr>";
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
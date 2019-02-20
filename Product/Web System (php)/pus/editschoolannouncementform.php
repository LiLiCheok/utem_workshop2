<?php

	//Include database.php to allow database connection.
	include('database.php');
	
	//Start session
	session_start();
	
	//If button is submitted.
	$submitAnnouncement = @$_POST['submitAnnouncement'];
	
	if($submitAnnouncement){
		//Assign specified attributes value. 
		$schoolAnnouncementID = $_POST['schoolannouncement'];
		$announcementID = $_POST['announcement'];
		$announcementTitle = $_POST['announcementTitle'];
		$announcementDescription = $_POST['announcementDescription'];
		$verifiedBy = $_POST['verifiedBy'];
		
		echo $schoolAnnouncementID;
		echo $announcementID;
		echo $announcementTitle;
		echo $announcementDescription;
		echo $verifiedBy;
		echo $_SESSION["SA_Id"];
		
		//Build the SQL Statement for update in announcement table	
		$sqlUpdate 	= "UPDATE announcement SET a_title=\"" . $announcementTitle 
					. "\", a_description = \"" . $announcementDescription
					. "\", a_created = NOW()"
					. ", Approver_Id = \"" . $verifiedBy 
					. "\" WHERE a_id = \"" . $announcementID . "\"";
				
		//Update database
		mysql_query($sqlUpdate);
		
		//Build the SQL Statement for update in area_announcement table	
		$sqlUpdate2	= "UPDATE area_announcement SET SA_Id = \"" . $_SESSION["SA_Id"] 
					. "\" WHERE a_Id = \"" . $schoolAnnouncementID . "\"";
		
		mysql_query($sqlUpdate2);
		
		//Close connection
		mysql_close($db);
		
		//Redirect to ???Homepage???
		header("Location: http://localhost/bengkel2/pus/indexschooladmin.php");
	}
	
	//Catch School Announcement ID
	$schoolannouncementID = @$_GET['schoolannouncement'];
	
	//Catch Announcement ID
	$announcementID = @$_GET['announcement'];
	
	//Catch Approver ID
	$approverID = @$_GET['approver'];
	
	//Catch Publisher ID
	$publisherID = @$_GET['publisher'];
	
	//SQL Statement to get the announcement details.
	$sql = "SELECT * FROM announcement WHERE a_id = \"". $announcementID . "\"";
	$result = mysql_query($sql);
	
	//Hold the data into an associative array.
	$announcementRow = mysql_fetch_assoc($result);
	
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="CSS/Layout.css" rel="stylesheet" type="text/css" />
	<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="CSS/image/EventUTeMOK.png">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Parent Updater System - Create Area Announcement</title>
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
                        	<li><a href="createschoolannouncement.php">Create Announcement</a></li>
                            <li><a href="getschoolannouncementlistedit.php">Edit Announcement</a></li>
<!--                        <li><a href="#">Edit School Admin</a></li>			-->
                        </ul>
                    </li>
					<li><a href="logout.php">Logout</a></li> <!--end login LI-->      
				</ul>
			</nav>
		</div>
        
		<p>&nbsp;</p>    
		<div id="Content">
        	<div id="announcementFormWrapper">
                <h2>Edit School Announcement</h2>
                    <br />
                    <br />
                <form method="post">
                	<p>
						Title: <input type="text" name="announcementTitle" value="<?php echo $announcementRow["a_title"]; ?>">
					</p>
                    <p>
						Description:</br><textarea rows=20 cols=70 name="announcementDescription"><?php echo $announcementRow["a_description"]; ?></textarea>
					</p>
                    <p>Verified by:</br>
						<?php
 							$sql = "SELECT * FROM approver";
                            $result = mysql_query($sql);
                            while($row = mysql_fetch_assoc($result)){
                                echo "<input type=\"radio\" name=\"verifiedBy\" value=\"";
                                echo $row['Approver_Id'];
                                echo "\" ";
								if($announcementRow["Approver_Id"] == $row["Approver_Id"])
									echo "checked>";
								else
									echo ">";
                                echo $row["Approver_Name"];
                                echo "\t|\t";
                                echo $row["Approver_Position"];
                                echo "</br>";
                            }
                        ?>
                    <br />
                    <input type="hidden" name="areaAnnouncement" value=<?php echo $schoolannouncementID ?>>
                    <input type="hidden" name="announcement" value=<?php echo $announcementID ?>>
                    <input type="submit" name="submitAnnouncement" value="Submit">
                </form>
       		</div>
		</div>
		<div id="Footer"></div>
	</div>
</body>
</html>
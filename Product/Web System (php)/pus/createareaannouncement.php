<?php
	
	//Include database.php to allow database connection.
	include('database.php');
	
	//Start Session.
	session_start();
//	print_r($_SESSION);
	
	//Hold submitted values of form into variable
	$announcementTitle = @$_POST['announcementTitle'];
	$announcementDescription = @$_POST['announcementDescription'];
	$verifiedBy = @$_POST['verifiedBy'];
	
	//Hold value if submission is done
	$submitAnnouncement = @$_POST['submitAnnouncement'];
	
	if(isset($_POST['submitAnnouncement'])){
		$insertVariable  = "INSERT INTO announcement (";
		$insertVariable .= " a_title, a_description, a_created, Approver_Id";
		$insertVariable .= ") VALUES (";
		$insertVariable .= " '$announcementTitle', '$announcementDescription', NOW(), '$verifiedBy'";
		$insertVariable .= ")";
		
		mysql_query($insertVariable);
		
		
		$queryID = "SELECT a_id FROM announcement ORDER BY a_id DESC";
		$a_id = mysql_query($queryID);
		$a_idRow = mysql_fetch_assoc($a_id);
		echo "New record created successfully";
		echo "Announcement ID = " . $a_idRow["a_id"];
		
		$insertVariable2  = "INSERT INTO area_announcement (";
		$insertVariable2 .= " Publisher_Id, a_id";
		$insertVariable2 .= ") VALUES ('". $_SESSION["Publisher_Id"] ."', '" . $a_idRow["a_id"] . "'";
		$insertVariable2 .= ")";
		
		mysql_query($insertVariable2);
		
		include('send_message.php');
		
		header("Location: http://localhost/bengkel2/pus/getareaannouncementlist.php");
	}

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
        	<div id="announcementFormWrapper">
                <h2>Create Area Announcement</h2>
                    <br />
                    <br />
                <form method="post">
                	<p>
						Title: <input type="text" name="announcementTitle">
					</p>
                    <p>
						Description:</br><textarea rows=20 cols=70 name="announcementDescription"></textarea>
					</p>
                    <p>Verified by:</br>
						<?php
 //                         $sql = "SELECT * FROM approver WHERE Approver_Status='a'";
 							$sql = "SELECT * FROM approver";
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
                    <br />
                    <input type="submit" name="submitAnnouncement" value="Submit">
                </form>
       		</div>
		</div>
		<div id="Footer"></div>
	</div>
</body>
</html>
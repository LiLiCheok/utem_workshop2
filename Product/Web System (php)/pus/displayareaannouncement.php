<?php
	
	//Include database.php to allow database connection.
	include('database.php');
	
	//Start Session.
	session_start();
	
	//Catch Area Announcement Id
	$areaannouncementID = $_GET['areaannouncement'];
	$announcementID = $_GET['announcement'];
	$approverID = $_GET['approver'];
	$publisherID = $_GET['publisher'];
	
	//SQL Statement to get object in Area Announcement Table.
	$sql = "SELECT * FROM area_announcement WHERE AA_Id = '$areaannouncementID'";
	$result = mysql_query($sql);
	
	$rowAA = mysql_fetch_assoc($result);
	
	//SQL Statement to get object in Area Table.
	$sql2 = "SELECT * FROM announcement WHERE a_Id = '$announcementID'";
	$result2 = mysql_query($sql2);
	
	$rowAnnouncement = mysql_fetch_assoc($result2);
	
	//SQL Statement to get approver object
	$sql3 = "SELECT * FROM approver WHERE Approver_Id = '$approverID'";
	$result3 = mysql_query($sql3);
	
	$rowApprover = mysql_fetch_assoc($result3);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="CSS/Layout.css" rel="stylesheet" type="text/css" />
	<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="CSS/image/EventUTeMOK.png">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Parent Updater System - <?php echo $rowAnnouncement["a_title"]; ?></title>
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
        	<div id="displayAnnouncementWrapper">
                <h2>Area Announcement: <?php echo $rowAnnouncement["a_title"]; ?>	</h2>
                    <br />
                    <br />
                <div id="whitePaper">
                    <p>
                        <?php echo $rowApprover["Approver_Name"]; ?></br>
                        Jabatan Pendidik Negeri Melaka,</br>
                        Jalan Istana,</br>
                        Bukit Beruang,</br>
                        75450 Melaka Tengah,</br>
                        Melaka.</br>
                    </p>
                    <p>
                -------------------------------------------------------------------------------------------------------------------------------------</br>
                
                    </p>
                    <p>
                        TO THOSE WHOM THIS MAY CONCERN
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;
                        <?php echo $rowAnnouncement["a_created"] ?>
                    </p>
                    <p>
                        Dato', Datuk, Datin, Encik, Puan,</br>
                        <?php echo $rowAnnouncement["a_title"]; ?>
                    </p>
                    <p>
                        <?php echo htmlspecialchars($rowAnnouncement["a_description"]); ?>
                    </p>
                    </br>
                    </br>
                    </br>
                    <p>
                        Yang benar,</br>
                        <?php echo $rowApprover["Approver_Name"]; ?></br>
                        <?php echo $rowApprover["Approver_Position"]; ?></br>
                    </p>
                </div>
                </div>
       		</div>
		</div>
		<div id="Footer"></div>
	</div>
</body>
</html>
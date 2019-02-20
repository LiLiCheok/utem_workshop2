<?php
	//Include database.php to allow database connection.
	include('database.php');
	
	//Start Session
	session_start();

	//If button is submitted.
	$createSchool = @$_POST['createSchool'];
	
	if($createSchool){
		//Assign specified attributes value.
		$schoolName = $_POST['schoolName'];
		$schoolType = $_POST['schoolType'];
		
		$insertVariable  = "INSERT INTO school (";
		$insertVariable .= " School_Name, School_Type";
		$insertVariable .= ") VALUES (";
		$insertVariable .= " '$schoolName', '$schoolType'";
		$insertVariable .= ")";
		
		if (mysql_query($insertVariable)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $insertVariable . "<brs>" . mysql_error($db);
		}
		mysql_close($db);
		
		header("Location: http://localhost/bengkel2/pus/indexpublisheradmin.php");
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
                <h2>Create School</h2>
                    <br />
                    <br />
                <form method="post">
                	<p>
						School Name: <input type="text" name="schoolName">
					</p>
                    <p>School Type:</br>
						<input type="radio" name="schoolType" value="Primary School" />Primary School</br>
                        <input type="radio" name="schoolType" value="Secondary School" />Secondary School</br>
                    </p>
                    <br />
                    <input type="submit" name="createSchool" value="Submit">
                </form>
       		</div>
		</div>
		<div id="Footer"></div>
	</div>
</body>
</html>
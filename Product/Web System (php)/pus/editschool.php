<?php
	//Include database.php to allow database connection.
	include('database.php');

	//Catch School Id
	$schoolId = $_GET['school'];
	
	if(isset($_POST['editSchool'])){
		//Assign specified attributes value.
		$schoolId = $_POST['school'];
		$schoolName = $_POST['schoolName'];
		$schoolType = $_POST['schoolType'];
		
		//Build the SQL Statement
		$sqlUpdate	 = "UPDATE school SET School_Name=\"$schoolName\", ";
		$sqlUpdate	.= "School_Type = '$schoolType' ";
		$sqlUpdate	.= "WHERE School_Id = '$schoolId'";
		
		if (mysql_query($sqlUpdate)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sqlUpdate . "<brs>" . mysql_error($db);
		}
		mysql_close($db);
		
		header("Location: http://localhost/bengkel2/pus/indexpublisheradmin.php");
	}
	
	//SQL Statement to get school object in School Table.
	$sql = "SELECT * FROM school WHERE School_Id = \"" . $schoolId . "\"";
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
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
                <h2>Edit School</h2>
                    <br />
                    <br />
                <form method="post">
                	<p>
						School Name:<input type="text" name="schoolName" value="<?php echo $row["School_Name"]; ?>">
					</p>
                    <p>School Type:</br>
						<input type="radio" name="schoolType" value="Primary School" 
						<?php if($row["School_Type"] == "Primary School")
								echo "checked" ?>/>Primary School</br>
                        <input type="radio" name="schoolType" value="Secondary School" 
                        <?php if($row["School_Type"] == "Secondary School")
								echo "checked" ?>/>Secondary School</br>
                    </p>
                    <br />
                    <input type="hidden" name="school" value="<?php echo $schoolId; ?>" />
                    <input type="submit" name="editSchool" value="Submit">
                </form>
       		</div>
		</div>
		<div id="Footer"></div>
	</div>
</body>
</html>
<?php

	//Include database.php to allow database connection.
	include('database.php');
	
	//Start Session
	session_start();
	
	//Catch when submit button is clicked.
	$submit = @$_POST['submitCreateSchoolAdmin'];
	
	/*
	 * If sumbit variable has value (submit button has been clicked),
	 * check all field has value or not.
	 * If has value, insert the variables above into the table school_admin
	 * in the database.
	 */
//	if($submit){
	if(isset($submit))
		$publisherID = $_SESSION["Publisher_Id"];
		$school = @$_POST["school"];
		$SA_Name = @$_POST["adminName"];
		$defaultPassword = "1234";
		$workingZone = @$_POST['workingZone'];
		
		//Check if Admin Name field is not empty.
		if($SA_Name != null){
			
			//Check if Working Zone is not selected.
			if($workingZone != null){
			
			//Create connection to database.
			include('database.php');
			
			//Insert data into database.
			$insertVariable  = "INSERT INTO school_admin (";
			$insertVariable .= " Publisher_Id, School_Id, SA_Name, SA_Password, SA_WorkingZone";
			$insertVariable .= ") VALUES (";
			$insertVariable .= " '$publisherID', '$school', '$SA_Name', '$defaultPassword', '$workingZone'";
			$insertVariable .= ")";
			
			if (mysql_query($insertVariable)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $insertVariable . "<brs>" . mysql_error($db);
			}
			
			mysql_close($db);
		
			header("Location: http://localhost/bengkel2/pus/indexpublisheradmin.php");
			

			
		}else{
			//If Admin Name field is empty.
			echo "<p>Your Admin Name field is empty.</p>";
		}
		
	}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="CSS/Layout.css" rel="stylesheet" type="text/css" />
	<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="CSS/image/EventUTeMOK.png">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Parent Updater System - Create School Admin</title>
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
                <h2>Create School Admin</h2>
                    <br />
                    <br />
                <form method="post">
                    <p>School Admin Name:<input type="text" name="adminName"></p>
                    <p>
                        Working Zone:</br>
                        <input type="radio" name="workingZone" value="Melaka Tengah">Melaka Tengah</br>
                        <input type="radio" name="workingZone" value="Alor Gajah">Alor Gajah</br>
                        <input type="radio" name="workingZone" value="Jasin">Jasin</br>
                    </p>
                    <p>
                        School:</br>
                        <?php
                            //Get School
                            $query = "SELECT * FROM school ORDER BY School_Type";
                            $result = mysql_query($query);
                            
                            while($row = mysql_fetch_assoc($result)){
                                //Echo out input school radio button.
                                echo "<input type=\"radio\" ";
                                echo "name=\"school\" ";
                                echo "value=\"" . $row["School_Id"] . "\" >";
                                echo $row["School_Name"] . "</br>";
                            }
                        ?>
                    </p>
                    <p><input type="submit" name="submitCreateSchoolAdmin" value="Submit"></p>
                </form>
       		</div>
		</div>
		<div id="Footer"></div>
	</div>
</body>
</html>


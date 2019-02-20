<?php
	
	//Include database.php to allow database connection.
	include('database.php');
	
	//If Login in as publisher admin is clicked.
	if(isset($_POST["publisherLogin"])){
		
		//Hold prompted username and password into a variable.
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		//Get the publisher admin from database.
		$sqlQuery = "SELECT * FROM publisher_admin WHERE Publisher_Id='$username' AND Publisher_Password='$password'";
		$queryResult = mysql_query($sqlQuery);
		
		//See if result actually has value.
		$queryBoolean = mysql_num_rows($queryResult);
		
		if($queryBoolean > 0){
			
			//Store result in associative array.
			$publisherAdmin = mysql_fetch_assoc($queryResult);
			
			//Start Session.
			session_start();
			
			//Hold session value.
			$_SESSION["Publisher_Id"] = $publisherAdmin["Publisher_Id"];
			$_SESSION["Publisher_Name"] = $publisherAdmin["Publisher_Name"];
			
			echo $_SESSION["Publisher_Id"];
			echo $publisherAdmin["Publisher_Id"];
			echo $publisherAdmin["Publisher_Name"];
				
			//Redirect to publisher admin page.
			header("Location: indexpublisheradmin.php");	
			
		}else{
			//Redirect to publisher admin page.
			echo "Your Username, or Password is not found in the Publisher Admin Table.";
		}
			
	}
	
	//If Login in as school admin is clicked.
	if(isset($_POST["schoolLogin"])){
		
		//Hold prompted username and password into a variable.
		$username = @$_POST["username"];
		$password = @$_POST["password"];
		
		//Get the school admin from database.
		$sqlquery = "SELECT * FROM school_admin WHERE SA_Id = '$username' AND SA_Password = '$password'";
		$queryResult = mysql_query($sqlquery);
		
		//See if result actually has value.
		$queryBoolean = mysql_num_rows($queryResult);
		
		if($queryBoolean > 0){
			
			//Store result in associative array.
			$schoolAdmin = mysql_fetch_assoc($queryResult);
			
			//Start Session.
			session_start();
			
			
			
			//Hold session value.
			$_SESSION["SA_Id"] = $schoolAdmin["SA_Id"];
			$_SESSION["SA_Name"] = $schoolAdmin["SA_Name"];	
			
			//Redirect to publisher admin page.
			header("Location: indexschooladmin.php");
		}else{
			//Redirect to publisher admin page.
			echo "Your Username, or Password is not found in the School Admin Table.";
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
	<title>Parent Updater System - Homepage</title>
	<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<!-- Holder holds (UTeM) logo -->
	<div id="Holder"> 
		<div id="Header"><img src="CSS/image/LogoJawi.png" width="200" height="100" longdesc="image/EventUTeMOK.jpg" />	</div>
		<div id="NavBar">
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
						<!--<ul>
						<li><a href="#">Item</a></li>
						</ul> <!--end inner UL--><!--end home LI-->
					<li><a>Announcements</a>
                    	<ul>
                        	<li><a href="getareaannouncementlistpublic.php">Area Announcements</a></li>
                          	<li><a href="getschoolannouncementlistpublic.php">School Announcements</a></li>
                        </ul>
					</li>
                    <li>
                    	<a href="index-nadia.php">Teacher Section</a>
                    </li>
				</ul>
			</nav>
		</div>
		<p>&nbsp;</p>    
		<div id="Content">
			<div id="ContentLeft">
				<h2>Recent Announcements</h2>
				<br />
				<br />
				<table width="472">
					<tr id="announcement-table-header" height="25px" bgcolor="#CCCCCC">
						<td>No.</td><td>Title</td><td>Date</td><td>Publisher</td>
					</tr>
                    <?php
						
						$index = 0;
						
						//Get announcement details
						$sqlQueryAnnouncement = "SELECT * FROM announcement ORDER BY a_id DESC LIMIT 5";
						$announcementResult = mysql_query($sqlQueryAnnouncement);
						;
						
						while($latestAnnouncement = mysql_fetch_assoc($announcementResult)){
						echo "<tr class=\"announcement-rows\" bgcolor=\"#FFFFFF\">";
							echo "<td>". ++$index ."</td><td width=\"500px\">";
							echo $latestAnnouncement["a_title"];
							echo "</td><td width=\"250px\">";
							echo $latestAnnouncement["a_created"];
							echo "</td><td width=\"250px\">";
							
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
				<div id="LoginBox">
					<form method="post">
						<p>Username: <input type="text" name="username" required="required"/><br /></p>
						<p>Password: <input type="password" name="password" required="required"/><br /></p>
						<input type="submit" name="publisherLogin" value="Publisher Admin"/>
						<input type="submit" name="schoolLogin" value="School Admin"/>
					</form>
				</div>
			</div>
		</div>
		<div id="Footer"></div>
	</div>
</body>
</html>
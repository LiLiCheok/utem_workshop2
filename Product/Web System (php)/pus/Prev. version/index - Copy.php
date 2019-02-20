<?php
	//Include database.php to allow database connection
	include('database.php');
	
	//Start session
	session_start();
	
	//Hold submitted Username and Password into variable
	$admin_ID = @$_POST['Username'];
	$password = @$_POST['Password'];
	
	//Hold login into variable when submitted button is clicked.
	$login = @$_POST['Login'];
	
	/**
	 * Once login is clicked, login variable has value,
	 * if login has value, do this method.
	 * 
	 * Echo out value in variable admin_ID.
	 * Echo out value in variable password.
	 */
	if($login){
		echo $admin_ID;
		echo $password;
	}
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Parent Updater System Homepage</title>
        <style>
			body{
				background: #F1F0D1; /* Give colour to background */	
				font-family: Verdan, Tahoma, Arial, Sans-Serif;
				font-size: 18px;
				overflow: auto;
			}
			#header-overflow{
				width: 100.1%;
				height: auto;
				background: #878E63;
				padding: 4% 0 0 0; 
				overflow: hidden;	/* So that any overflow will not be visible. */	
			}
			img{
				text-align: center;
				max-width: 100%; /* So won't overflow if resize screen */
				height: auto;
				width: auto;	
			}
			#wrapper{
				margin: 0 auto; /* Makes wrapper stays in middle of the page rather than sliding around */		
				max-width: 1020px;
				width: 98%;
				background: #FEFBE8;
				border: 1px solid #878E63;
				border-radius: 2px;
				box-shadow: 0 0 10px 0px rgba(12, 3, 25, 0.8);
			}
			header{
				width: 96%;
				min-height: 125px;
				padding: 5px;
				text-align: center;	
			}
			nav ul{	
				list-style: none;
				margin: 0;
				padding-left: 150px;
			}
			nav ul li{
				float: left;
				border: 1px solid #878E63;
				width: 20%;
			}
			nav ul li a{
				background: #F1F0D1;
				display: block;
				padding: 5% 12%; /* 5px top and bottom, 12 px left right */
				font-weight: bold;
				font-size: 18px;
				color: #878E63;
				text-decoration: none;
				text-align: center;
			}
			nav ul li a:hover, nav ul li.active a{
				background-color: #878E63;
				color: #F1F0D1;	
			}
			.clearfix{
				clear: both;	
			}
			.left-col{
				width: 55%;
				float: left;
				margin: 5% 5% 5% 5%;
			}
			
			#announcement-table-header{
				background-color: #CCCCCC;
				text-align: center;
			}
			.announcement-rows{
				background-color:#FFFFFF;
				height: 60px;
				text-align: center;
				border: 3px solid #878E63;
			}
			.first-cell{
				width: 35px;	
			}
			.sidebar{
				width: 25%;
				float: right;
				margin: 1%;
				text-align: center;
				margin-top: 5%;
				margin-right: 8%;
				border: 3px solid #878E63;
				overflow:hidden;
			}
			#loginbox{
				background-color: #FFF;
				float: left;
				margin: 0 auto;
				width: 100%;
				height: auto;
				padding: 1%;
			}
		</style>
	</head>
	<body>
    	<div id="wrapper"> <!-- Background tray for UI -->
        	<div id="header-overflow">
            </div>
        	<div id="header"> <!-- For Top Header Image -->
				<a href="#"><img src="images/Lazy Relaxation Cyan Blue.jpg" /></a>
			</div>
            <nav> <!-- For top menu -->
            	<ul>
                	<li class='active'><a href="#">Home</a></li>
                    <li><a href="#">Announcement</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">About</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
            <section class="left-col"> <!-- For recent announcements column -->
                <table cellspacing="0" cellpadding="0">
                	<tr id="announcement-table-header" height="25px">
                    	<td>No.</td><td>Title</td><td>Date</td><td>Author</td>
                    </tr>
               		<tr class="announcement-rows">
                      	<td class="first-cell">1.</td><td width="500px">School Around Ayer Keroh Closed due to Haze</td><td width="250px">18/10/2015</td><td width="250px">Admin Ayer Keroh</td>
                    </tr>
                    <tr class="announcement-rows">
                        <td>2.</td><td>School Open Day On 27/10/2015</td><td>18/10/2015</td><td>Admin SMKTU</td>
                    </tr>
                    <tr class="announcement-rows">
                        <td>3.</td><td>School Re-Open After Haze Close</td><td>10/10/2015</td><td>Admin Ayer Keroh</td>
                    </tr>
                    <tr class="announcement-rows">
                        <td>4.</td><td>School Teacher Awarded National Best Teacher</td><td>07/10/2015</td><td>Admin SKM</td>
                    </tr>
                    <tr class="announcement-rows">
                        <td>5.</td><td>School Listed For Dengue Emergency</td><td>18/09/2015</td><td>Admin Masjid Tanah</td>
                    </tr>
                </table>
            </section>
            <aside class="sidebar"> <!-- Sidebar for left side, beside recent announcement column -->
            	<div id="loginbox"> <!-- Login box division -->
                	<br />Login As Admin<br />
                    <form method="post" > <!-- action="index.php" --> <!-- Login form -->
						<p>
							Username: <input type="text" name="Username" /><br /> <!-- Username label and field -->
						</p>
						<p>
							Password: <input type="password" name="Password" /><br /> <!-- Password label and field -->
						</p>
                        <input type="submit" name="Login" value="Login" /><br /><br /> <!-- Submit Login field -->
                    </form>
                </div>
            </aside>
            <div class="clearfix"></div>
            <footer>
            	WHOLE FOOTER HERE 

            </footer>
        </div>
        <p style="text-allign: center"; padding: 0px;>&#169;Copyright - Parent Updater System, 2015.</p>
	</body>
</html>
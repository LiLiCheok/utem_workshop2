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
<!DOCTYPE html>
<html>
	<head>
		<title>Pengumuman: <?php echo $rowAA["AA_Title"]; ?></title>
	</head>
	<body>
		<h1>PENGUMUMAN</h1>
		</br>
		</br>
		<p>
			<?php echo $rowApprover["Approver_Name"]; ?></br>
			Jalan Istana,</br>
			Bukit Beruang,</br>
			75450 Melaka Tengah,</br>
			Melaka.</br>
		</p>
		<p>
			---------------------------------------------------------------------------------------------------------------------------</br>
		</p>
		<p>
			KEPADA SESIAPA YANG BERKENAAN
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
			<?php echo $rowAnnouncement["a_creatAt"] ?>
		</p>
		<p>
			Dato', Datuk, Datin, Encik, Puan,</br>
			<?php echo $rowAnnouncement["a_title"]; ?>
		</p>
		<p>
			<?php echo htmlspecialchars($rowAnnouncement["a_description"]); ?>
		</p>
		<p>
			Yang benar,</br>
			<?php echo $rowApprover["Approver_Name"]; ?></br>
			<?php echo $rowApprover["Approver_Position"]; ?></br>
		</p>
	</body>
</html> 
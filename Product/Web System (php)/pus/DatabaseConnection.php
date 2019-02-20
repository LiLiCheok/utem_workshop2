<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "pus";

$conn = mysql_connect($servername, $username, $password);
mysql_select_db("pus", $conn);

/* if (!$conn) {
	die ("Connection failed: ".
	 mysqli_connect_error());
} */
?>


<?php 
session_start();
ob_start();

require_once('DatabaseConnection.php');

$HT_Id= $_POST["HT_Id"];
$HT_Password = $_POST["HT_Password"];

$sql = "SELECT HT_Id,HT_Password from head_teacher where HT_Id = '$HT_Id' AND HT_Password ='$HT_Password'";
$result = mysql_query($sql);
$row = mysql_num_rows($result);


if($row > 0)
{

	$data = mysql_fetch_assoc($result);
	
	session_start();
	
	$_SESSION["HT_Id"] = $data["HT_Id"];
	
	header('Location: studentrecord.php');
}
else 
{
echo "<script>alert('Invalid ID or Password'); window.location.assign('login.php');</script>";
}

	?>
	<?php  mysql_close($conn);?>


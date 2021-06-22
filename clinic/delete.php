<?php
session_start();
$app_id=$_GET['id'];
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="project";

							//connection
$conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);
if (mysqli_connect_error()) {
	die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}

$sql = "DELETE FROM appointment WHERE app_id='$app_id' ";

if($conn->query($sql)){
	echo "<script>alert('your appointment has been cancelled successfully :)');window.location='active_app.php'</script>";
}else{
	echo "<script>alert('Try again :(');window.location='active_app.php'</script>";
}

?>
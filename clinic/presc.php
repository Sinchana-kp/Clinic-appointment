<?php
session_start();
$problem=$_POST['Problem'];
$med = array($_POST['med1'],$_POST['med2'],$_POST['med3']);
$timing = array($_POST['timing1'],$_POST['timing2'],$_POST['timing3']);
$qnty = array($_POST['qnty1'],$_POST['qnty2'],$_POST['qnty3']);
$dose = array($_POST['dose1'],$_POST['dose2'],$_POST['dose3']);
$advice=$_POST['advice'];
$n_date=$_POST['n_date'];
$app_id=$_SESSION['app_id'];


$doctor=$_SESSION['d_username'];
$p_username=$_SESSION['pat_username'];

$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="project";

//connection
$conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql2="SELECT app_date FROM appointment WHERE app_id='$app_id' ";
$result2=$conn->query($sql2);
$nums=mysqli_num_rows($result2);
        if ($result2->num_rows > 0) {
        while ($res=mysqli_fetch_assoc($result2)) {
$a_date=$res['app_date'];
}}

$sql = "INSERT INTO prescription (appointment_id,patientusername,doctorusername,a_date,problem,advice,next_visit) VALUES ('$app_id','$p_username','$doctor','$a_date','$problem','$advice','$n_date')";
if($conn->query($sql)){
	echo "<script>alert('prescription is given :)');window.location='active_appd.php'</script>";
}else{
	echo "<script>alert('try again :(')</script>";
}

$sql1="SELECT presc_id FROM prescription WHERE appointment_id='$app_id' ";
$result1=$conn->query($sql1);
$nums=mysqli_num_rows($result1);
        if ($result1->num_rows > 0) {
        while ($res1=mysqli_fetch_assoc($result1)) {
$pre_id=$res1['presc_id'];
}}


for ($i=0;$i<3;$i++){
	if (!empty($med[$i])&&!empty($timing[$i])) {
		$sql3="INSERT INTO medications (pre_id,medicine,qnty,timing,dosage) VALUES ('$pre_id','$med[$i]','$qnty[$i]','$timing[$i]','$dose[$i]')";
		if ($conn->query($sql3)) {
		}else{
				echo "<script>alert('try again :(')</script>";
		}
	}
}
?>
	

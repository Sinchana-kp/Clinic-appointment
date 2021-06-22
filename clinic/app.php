<?php
session_start();
$date=$_POST['date'];
$slot=$_POST['slot'];
$age=$_POST['age'];
$name=$_POST['name'];
$doctor=$_SESSION['dr_username'];
$P_username=$_SESSION['P_username'];


$week=$arrayName = array( 'Monday' => '1','Tuesday' => '2','Wednesday' => '3','Thursday' => '4','Friday' => '5','Saturday' => '6','Sunday' => '7');


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

$sql = "SELECT dr_name,dr_dept,day_from,day_to FROM doctor WHERE dr_username='$doctor' ";
$result = $conn->query($sql);

 $nums=mysqli_num_rows($result);
        if ($result->num_rows > 0) {
        while ($res=mysqli_fetch_assoc($result)) {
        	$doc_dept=$res['dr_dept'];
          $doc_name=$res['dr_name'];
          $_SESSION['day_from']=$day_from=$res['day_from'];
          $_SESSION['day_to']=$day_to=$res['day_to'];
       
        }
      }
$day_f=$week[$day_from];
$day_t=$week[$day_to];
$dayname = date('N', strtotime($date));
if ($day_f<=$dayname && $day_t>=$dayname) {
	$stm="SELECT * FROM appointment WHERE doc_username='$doctor' AND slot='$slot' AND app_date='$date' ";
	$result2=$conn->query($stm);
	$nums=mysqli_num_rows($result2);
	if ($result2->num_rows>0) {
		echo "<script>alert('Sorry :( Selected slot has been reserved , Try other slot');window.location='patient.php'</script>";
		
	}else{
		$stm2="INSERT INTO appointment (pat_name,pat_username,doc_username,doc_name,doc_dept,app_date,age,slot,status) VALUES ('$name','$P_username','$doctor','$doc_name','$doc_dept','$date','$age','$slot','Active')";
		if ($conn->query($stm2)) {
			echo "<script>alert('Your appointment has been booked !!');window.location='pat.php'</script>";
		}else{
			echo "Try again :(";
			echo "error".$sql."<br>".$conn->error;
		}

	
    }

}else{
	echo "<script>alert('Doctor will not be available on selected date!!');window.location='patient.php'</script>";
}
	
	
?>
	

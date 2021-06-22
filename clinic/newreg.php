<?php

$username=filter_input(INPUT_POST,'username');
$name=filter_input(INPUT_POST,'name');
$mobile=filter_input(INPUT_POST,'mobile');
$email=filter_input(INPUT_POST,'email');
$city=filter_input(INPUT_POST,'city');
$gender=filter_input(INPUT_POST,'gender');
$password=filter_input(INPUT_POST,'password');
$confirmation=filter_input(INPUT_POST, 'confirmation');

if (!empty($username)) {
	if(!empty($name)){
		if (!empty($mobile)) {
			if (!empty($email)) {
				if(!empty($city)){
					if($gender!='select'){
						if(!empty($password)){
							if($password==$confirmation){
							$host="localhost";
							$dbusername="root";
							$dbpassword="";
							$dbname="project";

							//connection
							$conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);
							if (mysqli_connect_error()) {
								die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
							} else{
								$sql="INSERT INTO patient (P_username,Name,Mobile,Email,City,Gender,Password) values ('$username','$name','$mobile','$email','$city', '$gender','$password')";
								$sql2="INSERT INTO login_p (username,password) values('$username','$password')";
								if ($conn->query($sql) && $conn->query($sql2)) {
									echo "<script>alert('registration successfull!! Now login to your profile');window.location='index.html'</script>";

								}else{
									echo "error".$sql."<br>".$conn->error;
								}
								$conn->close();
							}
						    }else{
						    	echo "<script>alert('Passwords doesnot match!!');window.location='newreg.html'</script>";
						    	die();
						    }
						}else{
							echo "<script>alert('Password cannot be blank');window.location='newreg.html'</script>";
							die();
						}
					}else{
						echo "<script>alert('gender cannot be blank');window.location='newreg.html'</script>";
						die();
					}
				}else{
					echo "<script>alert('city cannot be blank');window.location='newreg.html'</script>";
					die();
				}
			}else{
					echo "<script>alert('email cannot be blank');window.location='newreg.html'</script>";
					die();
				}
		}else{
					echo "<script>alert('mobile cannot be blank');window.location='newreg.html'</script>";
					die();
				}
	}else{
					echo "<script>alert('name cannot be blank');window.location='newreg.html'</script>";
					die();
				}
}else{
					echo "<script>alert('username cannot be blank');window.location='newreg.html'</script>";
					die();
				}
?>

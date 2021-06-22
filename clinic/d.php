<?php
session_start();
$d_username=filter_input(INPUT_POST, 'username');
$d_password=filter_input(INPUT_POST, 'password');

if(!empty($d_username)){
	if (!empty($d_password)) {
							$host="localhost";
							$dbusername="root";
							$dbpassword="";
							$dbname="project";

							//connection
							$conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);
							if (mysqli_connect_error()) {
								die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
							} else{
								$stmt=$conn->prepare("SELECT * FROM login_d WHERE username= ?");
								$stmt->bind_param("s",$d_username);
								$stmt->execute();
								$stmt_result=$stmt->get_result();
								if($stmt_result->num_rows>0){
									$_SESSION['conn']=$conn;
									$_SESSION['d_username']=$d_username;
									header("location:doctor.php");
								

								} else{
									echo "<script>alert('Invalid username or password');window.location='d.html'</script>";
								}
								$conn->close();
							}
						    }else{
						    	echo "<script>alert('Passwords cannot be empty');window.location='d.html'</script>";
						    	die();
						    }
						}else{
						    	echo "<script>alert('Username cannot be empty');window.location='d.html'</script>";
						    	die();
						    }
?>
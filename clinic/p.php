<?php
session_start();
$username=filter_input(INPUT_POST, 'username');
$password=filter_input(INPUT_POST, 'password');

if(!empty($username)){
	if (!empty($password)) {
							$host="localhost";
							$dbusername="root";
							$dbpassword="";
							$dbname="project";

							//connection
							$conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);
							if (mysqli_connect_error()) {
								die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
							} else{
								$stmt=$conn->prepare("SELECT * FROM login_p WHERE username= ?");
								$stmt->bind_param("s",$username);
								$stmt->execute();
								$stmt_result=$stmt->get_result();
								if($stmt_result->num_rows>0){
									$_SESSION['conn']=$conn;
									$_SESSION['username']=$username;
									header("location:pat.php");
								

								} else{
									echo "<script>alert('Invalid username or password');window.location='p.html'</script>";
								}
								$conn->close();
							}
						    }else{
						    	echo "<script>alert('Passwords cannot be empty');window.location='p.html'</script>";
						    	die();
						    }
						}else{
						    	echo "<script>alert('Username cannot be empty');window.location='p.html'</script>";
						    	die();
						    }
?>
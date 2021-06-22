<?php
session_start();
$username=$_SESSION['d_username'];

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

$sql = "SELECT * FROM doctor WHERE dr_username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $_SESSION['userid']=$userid=$row["drid"];
    $_SESSION['username']=$user_name=$row["dr_username"];
    $_SESSION['name']=$name=$row["dr_name"];
    $_SESSION['Dept']=$dept=$row["dr_dept"];
    $_SESSION['qual']=$qual=$row["dr_qualification"];
    $_SESSION['day_from']=$day_from=$row["day_from"];
    $_SESSION['day_to']= $day_to=$row["day_to"];
    $_SESSION['time']=$time=$row["a_time"];
    $_SESSION['password']=$password=$row["dr_password"];

  }
} else {
  echo "0 results";
}
$conn->close();
?>
                


<!DOCTYPE html>
<html>
<head>
  <title>pat</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

<link rel="stylesheet" type="text/css" href="pat.css">
</head>
<body>
  <!--nav-->
<nav class="navbar navbar-expand-lg navbar-light  " style="background-color:#eaeae1" >
  <a class="navbar-brand" href="index.html"><img src="46196.png" width="20px" height="20px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          PROFILE
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="d.html">Doctor</a>
          <a class="dropdown-item" href="#">Patient</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="newreg.html">Register for new account</a>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#contacts">Contacts</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!--patient profile-->
<div >
  <section style="height: 100vh;">
   <div class="card-deck " style="padding: 100px;">
    
   <div class="col-sm-6">
  <div class="card" style="width: 18rem;">
  <img src="imag4.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title" style="font-size: 25px;">Your appointments</h5>
    <p class="card-text" style="font-size: 18px;">To see your active appoinments</p>
    <a href="active_appd.php" class="btn btn-primary">Click here</a>
  </div>
</div>
  </div>
</div>
  </section>
<aside class="right" style="height: 100vh;">
  <i class="fas fa-user-circle fa-9x " ></i>
  <p class="profile">Profile</p>
  <p class="profile"><?php echo $name;?></p>
   <p class="profile" style="font-size: 20px;">Doctor ID : <?php echo $userid;?></p>
  <p class="profile" style="font-size: 20px;">Username : <?php echo $user_name;?></p>
  <p class="profile" style="font-size: 20px;">Department : <?php echo $dept;?></p>
  <p class="profile" style="font-size: 20px;">Qualification : <?php echo $qual;?></p>
  <p class="profile" style="font-size: 20px;">Available Days : <?php echo $day_from;?> to <?php echo $day_to;?></p>
  <p class="profile" style="font-size: 20px;">Available Time : <?php echo $time;?></p>
  <p class="profile" style="font-size: 20px;">Password : <?php echo $password;?></p>

</aside>
</div>


</body>
</html>
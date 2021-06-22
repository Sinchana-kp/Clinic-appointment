<?php
session_start();
$username=$_SESSION['username'];

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

$sql = "SELECT * FROM patient WHERE P_username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $_SESSION['P_username']=$user_name=$row["P_username"];
    $_SESSION['Name']=$name=$row["Name"];
    $_SESSION['Mobile']=$mobile=$row["Mobile"];
    $_SESSION['Email']=$email=$row["Email"];
    $_SESSION['City']=$city=$row["City"];
    $_SESSION['Gender']=$gender=$row["Gender"];
    $_SESSION['Password']=$password=$row["Password"];

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
          <a class="dropdown-item" href="doctor.html">Doctor</a>
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
  <section>
   <div class="card-deck " style="padding-left: 60px;">
    <div class="col-sm-6" style="padding-right:  0px;">
  <div class="card" style="width: 18rem;">
  <img src="imag1.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title" style="font-size: 25px;">Appointment</h5>
    <p class="card-text" style="font-size: 20px;" >To book your doctor</p>
    <a href="patient.php" class="btn btn-primary">Click here</a>
  </div>
</div>
</div>
   <div class="col-sm-6">
  <div class="card" style="width: 18rem;">
  <img src="imag4.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title" style="font-size: 25px;">Your appointments</h5>
    <p class="card-text" style="font-size: 18px;">To see your active appoinments</p>
    <a href="active_app.php" class="btn btn-primary">Click here</a>
  </div>
</div>
  </div>


<div class="col-sm-6" style="padding-top: 60px;padding-bottom: 80px;">
  <div class="card" style="width: 18rem;">
  <img src="p.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title" style="font-size: 25px;">Prescriptions</h5>
    <p class="card-text" style="font-size: 18px;">To view prescriptions</p>
    <a href="prescription.php" class="btn btn-primary">Click here</a>
  </div>
</div>
  </div>
</div>

  </section>

<!--profile details-->  
<aside class="right">
  <i class="fas fa-user-circle fa-9x " ></i>
  <p><span class="profile">Profile </span></p>
  <p class="profile"><?php echo $name;?></p>
  <p class="profile" style="font-size: 20px;">Username : <?php echo $user_name;?></p>
  <p class="profile" style="font-size: 20px;">Mobile : <?php echo $mobile;?></p>
  <p class="profile" style="font-size: 20px;">Email : <?php echo $email;?></p>
  <p class="profile" style="font-size: 20px;">City : <?php echo $city;?></p>
  <p class="profile" style="font-size: 20px;">Password : <?php echo $password;?></p>

</aside>
</div>


</body>
</html>
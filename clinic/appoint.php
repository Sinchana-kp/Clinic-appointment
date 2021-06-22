<?php
session_start();

              $host="localhost";
              $dbusername="root";
              $dbpassword="";
              $dbname="project";

              //connection
              $conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);
              if (mysqli_connect_error()) {
                die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
              }

$_SESSION['dr_username']=$id=$_GET['id'];
$P_username=$_SESSION['P_username'];
$P_name=$_SESSION['Name'];

$sql = "SELECT dr_name,dr_dept,dr_qualification,day_from,day_to,a_time FROM doctor WHERE dr_username='$id' ";
$result = $conn->query($sql);

        
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title></title>

  <link rel="stylesheet" type="text/css" href="was.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

<link rel="stylesheet" type="text/css" href="pat.css">
<link rel="stylesheet" type="text/css" href="patient.css">
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
          <a class="dropdown-item" href="p.html">Patient</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="newreg.html">Register for new account</a>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="index.html">Contacts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="patient.php">Doctors List</a>
      </li>
      
    </ul>
  </div>
</nav>
<!--patient profile-->
<div >
  <section style="padding: 150px;height: 100vh">
    <div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="97443972.jpg" class="card-img" alt="...">
    </div>

    <div class="col-md-8" style="color: black;font-weight: bold;">
      <div class="card-body">
        <?php
        
        if ($result->num_rows > 0) {
        while ($res=mysqli_fetch_assoc($result)) {
          ?>
        <h5 class="card-title" style="font-size: 30px;"><?php echo $res['dr_name'];?></h5>
        <p class="card-text" style="font-size: 20px;"><?php echo $res['day_from'];?> to <?php echo $res['day_to'];?></p>
        <p class="card-text" style="font-size: 20px;"><?php echo $res['a_time'];?></p>
         <p class="card-text" style="font-size: 20px;font-weight: normal;">No. of slots - 6</p>
         
         <?php
          $sql2 = "SELECT * FROM appointment WHERE doc_username='$id' AND pat_username='$P_username' ";
          $result2 = $conn->query($sql2);

          if($result2->num_rows > 0){
         ?>
         <p class="card-text" style="font-size: 20px;font-weight: normal; color: red;">You already have an appointment with this doctor</p>
         <?php
      }else{
     ?>
  
       <button class="btn btn-success" data-target="#mymodal" data-toggle="modal">Your appointment info</button>
        <?php
        }
}
}
        ?>
      </div>
    </div>
  </div>
</div>
  

    
  </section>
<aside class="right" style="height: 100vh">
  <i class="fas fa-user-circle fa-9x " ></i>
  <p class="profile">Profile</p>
  <p class="profile"><?php echo ($_SESSION['Name']);?></p>
  <p class="profile" style="font-size: 20px;">Username : <?php echo($_SESSION['P_username']);?></p>
  <p class="profile" style="font-size: 20px;">Mobile : <?php echo ($_SESSION['Mobile']);?></p>
  <p class="profile" style="font-size: 20px;">Email : <?php echo ($_SESSION['Email']);?></p>
  <p class="profile" style="font-size: 20px;">City : <?php echo ($_SESSION['City']);?></p>
  <p class="profile" style="font-size: 20px;">Password : <?php echo ($_SESSION['Password']);?></p>

</aside>
</div>
<div class="modal" id="mymodal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-primary">Appointment Info</h3>
            <button type="button" class="close" data-dismiss="modal"> &times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="app.php">
              <div class="form-group">
              <label>Date</label>
              <input type="date" id="today" min="2020-11-01-+" max="2021-12-31" name="date">
                </div>

                <div class="form-group">
              <label>Name</label>
              <input type="text" id="today"  name="name" placeholder="Name">
                </div>

                <div class="form-group">
                  <label>Slots</label>
              <select class="selection" name="slot">
                <option value="1">Slot-1</option>
                <option value="2">Slot-2</option>
                <option value="3">Slot-3</option>
                <option value="4">Slot-4</option>
                <option value="5">Slot-5</option>
                <option value="6">Slot-6</option>

              </select>
                  </div>

                <div class="form-group">
              <label>Age</label>
              <input type="number" id="today" min=0 name="age" placeholder="Age">
                </div>
                <div class="form-group">
              <button class="btn btn-success">Submit</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>

</body>
</html>
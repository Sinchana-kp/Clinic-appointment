<?php
session_start();
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
$P_username=$_SESSION['P_username'];

$sql = "SELECT app_id,doc_name,doc_dept,app_date,age,slot,status FROM appointment  WHERE pat_username='$P_username' AND status='Active' ORDER BY(app_date) ";
$result = $conn->query($sql);

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

<link rel="stylesheet" type="text/css" href="active_app.css">
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
      
    </ul>

  </div>
</nav>
<!--patient profile-->
<div >
  <section style="height: 100vh;">
 <div class="main-div">
    <h1>Your Upcoming appointments</h1>  
    <div class="center-div" style="padding: 25px;">
      <div class="table-responsive">
      <table >
        <thread>
          <tr>
            <th>ID</th>
            <th>Doctor name</th>
            <th>Department</th>
            <th>Appointment date</th>
            <th>Booked slot</th>
            <th>Doctor available time</th>
            <th>Cancel appointment</th>
          </tr>
        </thread>

        <?php
        $nums=mysqli_num_rows($result);
        if ($result->num_rows > 0) {
        while ($res=mysqli_fetch_assoc($result)) {
          ?>
          <tbody>
          <td><?php echo $res['app_id']?></td>
          <td><?php echo $res['doc_name']?></td>
          <td><?php echo $res['doc_dept']?></td>
          <td><?php echo $res['app_date']?></td>
          <td><?php echo $res['slot']?></td>
          <td><?php $dr_name=$res['doc_name'];
          $sql2="SELECT * FROM doctor WHERE dr_name='$dr_name'" ;
          $result2=$conn->query($sql2);
          if($result2->num_rows > 0){
            $a=mysqli_fetch_assoc($result2);

          }
          echo $a['a_time'];
          ?></td>
           <td><a href="delete.php?id=<?php echo $res['app_id']; ?>"><button class="btn btn-outline-danger my-2 my-sm-0" >Delete</button></a></td>
         
         
        </tbody>
        <?php
        }
      }else{
        ?><p style="color: red;text-align: center;">No appointments found!!</p>
        <?php
      }
        ?>

        
      </table> 

        
      </div>
      
    </div>
     
     <div>
  <a href="pat.php"><button class="btn btn-outline-success my-2 my-sm-0" style="font-size: 25px;font-weight: bold;"><i class="fas fa-hand-point-left fa-1.5x" style="padding-top: 0px; padding-right: 5px;"></i>Back</button></a>
</div>
   </div>
  </section>
<aside class="right">
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

</body>

</html>

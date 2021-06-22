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
$d_username=$_SESSION['d_username'];

$sql = "SELECT app_id,pat_name,pat_username,app_date,age,slot,status FROM appointment WHERE doc_username='$d_username' AND status='Active' ORDER BY(app_date) ";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Doc</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

<link rel="stylesheet" type="text/css" href="active_appd.css">
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
<!--doc profile-->
<div >
  <section>
   <div class="main-div">
    <h1>Your appointments</h1>
    <div class="center-div">
      <div class="table-responsive">
      <table>
        <thread>
          <tr>
            <th>App ID</th>
            <th>Patient Name</th>
            <th>App Date</th>
            <th>Age</th>
            <th>Slot</th>
            <th>Delete</th>
            <th>Prescriptions</th>
          </tr>
        </thread>

        <?php
        $nums=mysqli_num_rows($result);
        if ($result->num_rows > 0) {
        while ($res=mysqli_fetch_assoc($result)) {
          ?>
          <tbody>
          <td><?php echo $res['app_id']?></td>
          <td ><?php echo $res['pat_name']?></td>
          <td><?php echo $res['app_date']?></td>
          <td><?php echo $res['age']?></td>
          <td><?php echo $res['slot']?></td>
          <td><a href="delete_d.php?id=<?php echo $res['app_id']; ?>"><button class="btn btn-outline-danger my-2 my-sm-0" >Delete</button></a></td>
    

          <td><button class="btn btn-outline-primary my-2 my-sm-0" data-target="#mymodal2" data-toggle="modal">Write</button></a></td>
          <div class="modal" id="mymodal2" style="text-align: center;">
      <div class="modal-dialog" style="max-width: 990px;">
        <div class="modal-content">
          <div class="modal-header" style="color: black;font-weight: bold;">
            <h3>Write your presciptions here </h3>
            <button type="button" class="close" data-dismiss="modal"> &times;</button>
          </div>
            <div class="modal-body" >
            <form method="POST" action="presc.php" id="<?php $_SESSION['pat_username']=$res['pat_username'];$_SESSION['app_id']=$res['app_id']; echo $res['app_id'];?>">
              <div class="form-group">
              <label>Daignoised problem : </label>
              <input type="text" id="problem"  name="Problem">
                </div>

                <div class="form-group">
              <label>Medicine 1</label>
              <input type="text" id="M1" name="med1">
              <input type="radio" name="timing1" value ="AF">  After food</input >
              <input type="radio" name="timing1" value ="BF">  Before food</input >
              <input type="number" name="qnty1" min="0"style="width: 50px;">  Qnty
              <input type="text" placeholder="1-1-1" name="dose1" style="width: 50px;">Dosage
              </div>
              
                
                <div class="form-group">
              <label>Medicine 2</label>
              <input type="text" id="M2" name="med2">
              <input type="radio" name="timing2" value="AF">  After food</input >
              <input type="radio" name="timing2" value="BF">  Before food</input >
              <input type="number" name="qnty2" min="0"style="width: 50px;">  Qnty
              <input type="text" placeholder="1-1-1" name="dose2" style="width: 50px;">Dosage
              </div>

                
                <div class="form-group">
              <label>Medicine 3</label>
              <input type="text" id="M3" name="med3">
              <input type="radio" name="timing3" value="AF">  After food</input >
              <input type="radio" name="timing3" value="BF">  Before food</input >
              <input type="number" name="qnty3" min="0"style="width: 50px;">  Qnty
              <input type="text" placeholder="1-1-1" name="dose3" style="width: 50px;">Dosage
              </div>


              <div class="form-group" style="text-align: left;">
              <label >ADVICE : </label>
              <input type="text" id="problem"  name="advice" style="width: 80%;">
                </div>

                <div class="form-group" style="text-align: left;">
              <label  style="color: black;font-style: italic;">Next visit on :</label>
              <input type="date" id="today" min="2020-11-01-+" max="2021-12-31" name="n_date">
                </div>


                <div >
              <a ><button class="btn btn-outline-primary my-2 my-sm-0" style="margin-right: 15px;">Done</button></a>
                </div>
            </form>
            </div>
    </div>
    
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
    <div style="margin-top: 20px;">
     <a href="doctor.php"><button class="btn btn-outline-success my-2 my-sm-0" style="font-size: 25px;font-weight: bold;color: white;"><i class="fas fa-hand-point-left fa-1.5x" style="padding-top: 0px; padding-right: 5px;"></i>Back</button></a>
   </div>
 </div>
  </section>
<aside class="right">
  <i class="fas fa-user-circle fa-9x " ></i>
  <p class="profile">Profile</p>
  <p class="profile"><?php echo $_SESSION['name']?></p>
   <p class="profile" style="font-size: 20px;">Doctor ID : <?php echo $_SESSION['userid']?></p>
  <p class="profile" style="font-size: 20px;">Username : <?php echo $_SESSION['d_username']?></p>
  <p class="profile" style="font-size: 20px;">Department : <?php echo $_SESSION['Dept']?></p>
  <p class="profile" style="font-size: 20px;">Qualification : <?php echo $_SESSION['qual']?></p>
  <p class="profile" style="font-size: 20px;">Available Days : <?php echo $_SESSION['day_from']?> to <?php echo $_SESSION['day_to']?></p>
  <p class="profile" style="font-size: 20px;">Available Time : <?php echo $_SESSION['time']?></p>
  <p class="profile" style="font-size: 20px;">Password : <?php echo $_SESSION['password']?></p>

</aside>
</div>


</body>
</html>
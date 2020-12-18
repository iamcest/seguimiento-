<?php

session_start();
$usrname = $_SESSION['username'];
$host = "localhost";
$user = "root";
$password = "";
$db = "demo";

$con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");

$user_check_query1 = "SELECT fname FROM doctor_reg where username='" . $usrname . "'";
$user_check_query2 = "SELECT username FROM doctor_acc where username='" . $usrname . "'";
$user_check_query3 = "SELECT mobileno FROM doctor_reg where username='" . $usrname . "'";
$user_check_query4 = "SELECT dob FROM doctor_reg where username='" . $usrname . "'";
$user_check_query5 = "SELECT speciality FROM doctor_reg where username='" . $usrname . "'";
$user_check_query6 = "SELECT place FROM doctor_reg where username='" . $usrname . "'";
$user_check_query7 = "SELECT mailid FROM doctor_acc where username='" . $usrname . "'";
$user_check_query8 = "SELECT gender FROM doctor_reg where username='" . $usrname . "'";

$results1 = mysqli_query($con, $user_check_query1);
$results2 = mysqli_query($con, $user_check_query2);
$results3 = mysqli_query($con, $user_check_query3);
$results4 = mysqli_query($con, $user_check_query4);
$results5 = mysqli_query($con, $user_check_query5);
$results6 = mysqli_query($con, $user_check_query6);
$results7 = mysqli_query($con, $user_check_query7);
$results8 = mysqli_query($con, $user_check_query8);

$user1 = mysqli_fetch_array($results1);
$user2 = mysqli_fetch_array($results2);
$user3 = mysqli_fetch_array($results3);
$user4 = mysqli_fetch_array($results4);
$user5 = mysqli_fetch_array($results5);
$user6 = mysqli_fetch_array($results6);
$user7 = mysqli_fetch_array($results7);
$user8 = mysqli_fetch_array($results8);

if ($user1) {
  $fname = $user1['fname'];
}
if ($user2) {
  $username = $user2['username'];
}
if ($user3) {
  $mobileno = $user3['mobileno'];
}
if ($user4) {
  $dob = $user4['dob'];
}
if ($user5) {
  $speciality = $user5['speciality'];
}
if ($user6) {
  $place = $user6['place'];
}
if ($user7) {
  $mailid = $user7['mailid'];
}
if ($user8) {
  $gender = $user8['gender'];
}
$mail="muthubrindha15@gmail.com";
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="pendingpatients.css">


  <link rel="icon" type="image/png" href="doctorprofile1/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Doctor Profile</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="doctorprofile.css" rel="stylesheet" />

</head>

<body>
  <form action="doctorprofile.php" method="POST">
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">

        <div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
          <div class="user-logo">
            <div class="img" style="background-image: url(images/img1.jpg);"></div>
            <h3>WELCOME</h3>
          </div>
        </div>
        <ul class="list-unstyled components mb-3">
          <li class='active'>
            <a href="doctorprofile.php"><span class="fa fa-user-md "></span> My Profile</a>
          </li>
          <li>
            <a href="mypatients.php"><span class="fa fa-group "></span> My Patients</a>
          </li>
          <li>
            <a href="pendingpatients.php"><span class="fa fa-comments-o "></span> Pending Patients</a>
          </li>
          <li>
            <a href="mailto:<?php '.$mailid.' ?>"><span class="fa fa-phone "></span> Contact</a>
          </li>
          <li>
            <a href="doctorlogin.php"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
        </ul>

      </nav>


      <script src="doctorprofile/js/jquery.min.js"></script>
      <script src="doctorprofile/js/popper.js"></script>
      <script src="doctorprofile/js/bootstrap.min.js"></script>
      <script src="doctorprofile/js/main.js"></script>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-5">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">My Profile</h4>
                  <!--<p class="card-category">Complete your profile</p>-->
                </div>
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <strong style="font-size:20px;" class="bmd-label-floating">Name</strong>
                        <input type="text" value="<?php echo $fname; ?>" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <strong style="font-size:20px;" class="bmd-label-floating">Username</strong>
                        <input type="text" value="<?php echo $username; ?>" class="form-control" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <strong style="font-size:20px;" class="bmd-label-floating">Email address</strong>
                        <input type="email" value="<?php echo $mailid; ?>" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <strong style="font-size:20px;" class="bmd-label-floating">Mobile Number</strong>
                        <input type="text" value="<?php echo $mobileno; ?>" class="form-control" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <strong style="font-size:20px;" class="bmd-label-floating">Date Of Birth</strong>
                        <input type="text" value="<?php echo $dob; ?>" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <strong style="font-size:20px" class="bmd-label-floating">Gender</strong>
                        <input type="text" value="<?php echo $gender; ?>" class="form-control" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <strong style="font-size:20px" class="bmd-label-floating">Speciality</strong>
                        <input type="text" value="<?php echo $speciality; ?>" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <strong style="font-size:20px" class="bmd-label-floating">Country</strong>
                        <input type="text" value="India" class="form-control" disabled>
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <strong style="font-size:20px;" class="bmd-label-floating">Address</strong>
                        <input type="text" value="<?php echo $place; ?>" class="form-control" disabled>
                      </div>
                    </div>
                  </div>
                  <!--<button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                  <div class="clearfix"></div>-->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
    </form>  
  </body>
</html>














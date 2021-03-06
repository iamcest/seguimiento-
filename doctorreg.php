<?php

$errors = array();

$host = "localhost";
$user = "root";
$password = "";
$db = "demo";

$con = mysqli_connect($host, $user, $password, $db) or die("could not connect to database");
if (isset($_POST['username'])) {
    $name = $_POST['fname'];
    $username = $_POST['username'];
    $mobile = $_POST['mobno'];
    $dob = $_POST['dob'];
    $gend = $_POST['gender'];
    $specialisation = $_POST['speciality'];
    $location = $_POST['location'];
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($mobile)) {
        array_push($errors, "Mobile is required");
    }
    if (empty($dob)) {
        array_push($errors, "Date of Birth is required");
    }
    if (empty($gend)) {
        array_push($errors, "Gender is required");
    }
    if (empty($specialisation)) {
        array_push($errors, "Specialisation is required");
    }
    if (empty($location)) {
        array_push($errors, "Location is required");
    }
    $user_check_query1 = "SELECT * FROM doctor_acc WHERE username ='" . $username . "' LIMIT 1";

    $result1 = mysqli_query($con, $user_check_query1);

    $user_check_query2 = "SELECT * FROM doctor_reg WHERE username = '".$username."' OR mobileno = '".$mobile."' LIMIT 1";

    $result2 = mysqli_query($con, $user_check_query2);
    
    $user = mysqli_fetch_assoc($result2);

    if ($user) {

        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if($user['mobileno'] === $mobile){
            array_push($errors, "Phone number already exists");
        }
    }

    if (mysqli_num_rows($result1) == 0) {
        array_push($errors, "Enter a valid username");
    }
    if (count($errors) == 0) {

        $query = "INSERT INTO doctor_reg (fname, username, mobileno, dob, gender, speciality, place)  values ('$name', '$username', '$mobile', '$dob', '$gend', '$specialisation', '$location')";
        mysqli_query($con, $query);
        header('location: doctorlogin.php');
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>COVID-19</title>

    <!-- Icons font CSS-->
    <link href="doctormodule2/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="doctormodule2/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="doctormodule2/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="doctormodule2/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="doctorreg.css" rel="stylesheet" media="all">
</head>

<body>

    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                
                    <h2 class="title">Doctor Registration Form</h2>
                    <form method="POST">

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Name</label>
                                    <input class="input--style-4" type="text" name="fname" required>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">User name</label>
                                    <input class="input--style-4" type="text" name="username" required>
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Mobile number</label>
                                    <input class="input--style-4" type="text" name="mobno" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number" required>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Date Of Birth</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="dob" required>
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" name="gender" value="Male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="Female">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Others
                                            <input type="radio" name="gender" value="Others">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Specialization</label>
                                    <input class="input--style-4" type="text" name="speciality" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <label class="label">Hospital Name & Address</label>
                                <input class="input--style-4" type="text" name="location" required>
                            </div>
                        </div>
                        
                        <?php include('errors.php') ?>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="doctormodule2/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="doctormodule2/vendor/select2/select2.min.js"></script>
    <script src="doctormodule2/vendor/datepicker/moment.min.js"></script>
    <script src="doctormodule2/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="doctormodule2/js/global.js"></script>

</body>

</html>
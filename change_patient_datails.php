<?php
require_once 'dashboard/connection.php'; //insert connection to page
require_once 'user.php'; //insert connection to page
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amaya Channeling Center</title>
  <link rel="icon" type="image/png" href="img/logo/AMAYA.jpg" sizes="300x300" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="dashboard/css/boot.css">
  <link rel="stylesheet" type="text/css" href="dashboard/css/form_css/form.css">
  <link rel="stylesheet" type="text/css" href="dashboard/css/student/main.css">
  <link rel="stylesheet" type="text/css" href="dashboard/fontawesome-free-5.7.2-web/css/all.css">
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
    }

    .navbar {
      background-color: #0f3460;
    }

    .carousel-inner img {
      width: 100%;
      height: 250px;
    }

    footer {
      background-color: #0f3460;
      padding: 0.5%;
      color: white;
    }
  </style>
</head>

<body>
  <div class="flex-center flex-column" style="height: 100vh;">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <a class="navbar-brand" href="index.php"><b>Amaya Channeling Center</b></a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><i class="fas fa-home mr-2"></i>Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-calendar-check mr-2"></i>Appointments
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="my_appinments.php">Channeling Appointment History</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-users-cog mr-2"></i>Settings
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php if (!isset($_SESSION['email'])) { ?>
                <a class="dropdown-item" href="dashboard/login.php">Login</a>
                <a class="dropdown-item" href="register_patients.php">Register</a>
              <?php } else { ?>
                <a class="dropdown-item" href="patients_pass.php">Change Password</a>
                <a class="dropdown-item" href="myaccount.php">View Account</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Log Out</a>
              <?php } ?>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <section class="container-fluid" style="padding : 0px">
      <div class="row" style="width: 100%; margin: 0;">

        <!-- Slideshow container -->
        <div id="myCarousel" class="carousel slide" style="width : 100%; margin : 0px;" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <?php
            $slider_query = "SELECT * FROM slider_banner";
            $slider_query_result = mysqli_query($con, $slider_query);
            $active = "active"; // Add this variable to track active slide
            while ($row = mysqli_fetch_assoc($slider_query_result)) {
              $slider_image = $row['slider_banner_01']; // Adjust this column name
              $image_src = "img/upload/slider/" . $slider_image;
              ?>
              <div class="carousel-item <?php echo $active; ?>">
                <img src="<?php echo $image_src; ?>" alt="Banner" class="d-block w-100">
              </div>
              <?php
              $active = ""; // Remove "active" class after the first slide
            }
            ?>
          </div>

          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <!-- ... Rest of the content ... -->
      </div>
    </section>

    <section class="container-fluid mt-5">

      <div class="row p-3">
        <div class="col-md-6">
          <?php
          $user = $_SESSION['email'];

          $count = 1;
          $viewquery = "SELECT * FROM patients WHERE email='" . $user . "'";
          $viewresult = mysqli_query($con, $viewquery);
          $row = mysqli_fetch_assoc($viewresult);
          if (mysqli_num_rows($viewresult) > 0) {
            ?>
            <div class="row">
              <form class="reg_form" action="change_patient_datails.php" method="POST"
                style="border: 2px solid black; padding: 3%; background-color: #0f3460; border-radius: 3em;">
                <h1 class="text-center" style="color: yellow;">Change Patients Details</h1>
                <div class="form-group">
                  <label for="name" class="text-white"><b>Full Name</b></label>
                  <input type="text" class="form-control" name="name" placeholder="Full Name">
                </div>

                <div class="form-group">
                  <label for="address" class="text-white"><b>Address</b></label>
                  <input type="text" class="form-control" name="address" placeholder="Address">
                </div>

                <div class="form-group">
                  <label for="phone" class="text-white"><b>Phone Number</b></label>
                  <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                </div>

                <div class="form-group">
                  <label for="bday" class="text-white"><b>Date of Birth</b></label>
                  <input type="text" class="form-control" name="bday" placeholder="Date of Birth">
                </div>

                <div class="form-group">
                  <label for="inputState" class="text-white"><b>Gender</b></label>
                  <select id="inputState" name="gender" class="form-control">
                    <option selected></option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>

                <div class="dropdown-divider"></div>

                <button type="submit" name="submit" class="btn btn-info btn-block" style="border-radius: 20px;">Save
                  Detail</button>
                <p class="text-white text-center" style="font-size: 11px; margin-top: 2%;">Go Back to My Account.. <a
                    href="myaccount.php">Back</a></p>
              </form>
              <?php

              if (isset($_POST['submit'])) {
                $fname = $_REQUEST['name'];
                $address = $_REQUEST['address'];
                $phone = $_REQUEST['phone'];
                $gender = $_REQUEST['gender'];
                $bday = $_REQUEST['bday'];
                $cdate = date("Y/m/d");

                $email = $_SESSION['email'];

                if (!empty($fname)) {
                  $query3 = "UPDATE patients SET full_name='$fname' WHERE email='" . $email . "'";
                  $sql3 = mysqli_query($con, $query3);
                  echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";
                }

                if (!empty($bday)) {
                  $query3 = "UPDATE patients SET dob='$bday' WHERE email='" . $email . "'";
                  $sql3 = mysqli_query($con, $query3);
                  echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";
                }
                if (!empty($phone)) {
                  if (preg_match("/^([0]([7189])([071628])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)) {
                    $query3 = "UPDATE patients SET phone_number='$phone' WHERE email='" . $email . "'";
                    $sql3 = mysqli_query($con, $query3);
                    echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";

                  } else {
                    echo "Enter Valid Phone Number";
                  }
                }

                if (!empty($address)) {
                  $query3 = "UPDATE patients SET address='$address' WHERE email='" . $email . "'";
                  $sql3 = mysqli_query($con, $query3);
                  echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";
                }

                if (!empty($gender)) {
                  $query3 = "UPDATE patients SET gender='$gender' WHERE email='" . $email . "'";
                  $sql3 = mysqli_query($con, $query3);
                  echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";
                }

              }
              ?>

            </div>
          <?php } ?>
        </div>
        <div class="col-md-6">
          <img
            src="img/banner/doctor-whit-assistant-treating-teeth-patient-preventing-caries-stomatology-concept-professional-dentist-assistant-wearing-147282095.jpg"
            width="100%">
        </div>
      </div>


      <div class="row mt-2">
        <?php
        $slider_query = "SELECT * FROM banner";
        $slider_query_result = mysqli_query($con, $slider_query);
        if (mysqli_num_rows($slider_query_result) > 0) {

          $row = mysqli_fetch_assoc($slider_query_result);
          $banner = $row['image'];

          $image_src_banner = "img/upload/banner/" . $banner;

          ?>
          <img src="<?php echo $image_src_banner; ?>" style="width: 100%;">
        <?php } ?>
      </div>
    </section>

    <footer>
      <div class="row mt-2" style="padding: 0.5%;">
        <p style="margin-left: 3%;">Copyright &copy; AmayaChannelingCenter. <br> Created By : M.A.N.J.ASLAM
        </p>
      </div>
    </footer>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
</body>

</html>
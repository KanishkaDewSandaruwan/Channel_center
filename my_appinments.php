<?php
require_once 'dashboard/connection.php'; // Insert connection to page
require_once 'user.php'; // Check login 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <script src="dashboard/jq/jq.js" type="text/javascript"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>

  <!-- Load Icon -->
  <link rel="icon" type="image/png" href="img/logo/logo.jpg" sizes="300x300" />
  <!-- Load external stylesheets -->
  <link rel="stylesheet" type="text/css" href="dashboard/css/boot.css">
  <link rel="stylesheet" type="text/css" href="dashboard/css/form_css/form.css">
  <link rel="stylesheet" type="text/css" href="dashboard/css/student/main.css">
  <link rel="stylesheet" type="text/css" href="dashboard/fontawesome-free-5.7.2-web/css/all.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Amaya Channeling Center</title>
</head>

<body style="font-family: 'Times New Roman', Times, serif;">

  <div style="min-height: 100vh; display: flex; flex-direction: column;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0f3460;">
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

    <!-- Appointment History Section -->
    <section class="container mt-4 flex-grow-1">
      <div class="row">
        <div class="col-12">
          <h1 class="text-center">Your Appointment History</h1>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-12">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Doctor</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Appointed Date</th>
                  <th>Price</th>
                  <th>Accept</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $count = 1;
                $email = $_SESSION['email'];
                $viewquery = "SELECT * FROM appinment
                                              JOIN schedule ON schedule.sch_id = appinment.sch_id
                                              JOIN doctor ON doctor.did = schedule.docid
                                              WHERE patient_email = '$email'";
                $viewresult = mysqli_query($con, $viewquery);

                while ($row = mysqli_fetch_assoc($viewresult)) {
                  echo '<tr>';
                  echo '<td>' . $row['full_name'] . '</td>';
                  echo '<td>' . $row['description'] . '</td>';
                  echo '<td>' . $row['sc_date'] . '</td>';
                  echo '<td>' . $row['sc_time'] . '</td>';
                  echo '<td>' . $row['trndate'] . '</td>';
                  echo '<td>' . $row['price'] . '</td>';
                  echo '<td>' . $row['accept'] . '</td>';
                  echo '</tr>';
                  $count++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- End of Appointment History Section -->

    <!-- Footer -->
    <footer style="background-color: #0f3460; padding: 0.5%;">
      <p style="color: white; text-align: center; margin: 0;">
        Copyright &copy; AmayaChannelingCenter. <br> Created By : M.A.N.J.ASLAM
      </p>
    </footer>
  </div>

  <!-- Scripts -->
  <script type="text/javascript" src="dashboard/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="dashboard/js/popper.min.js"></script>
  <script type="text/javascript" src="dashboard/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="dashboard/js/mdb.min.js"></script>
</body>

</html>

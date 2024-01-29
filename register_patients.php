<!DOCTYPE html>
<html>

<head>
  <title> Amaya Channeling Center</title>

  <?php
  require_once 'dashboard/connection.php'; //insert connection to page
  
  ?>
  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <script src="jq/jq.js" type="text/javascript"></script>
    <link rel="icon" type="image/png" href="img/logo/logo.jpg" sizes="300x300" />

    <!-- load external things -->
    <link rel="stylesheet" type="text/css" href="dashboard/css/boot.css">
    <link rel="stylesheet" type="text/css" href="dashboard/css/d.css">
    <link rel="stylesheet" type="text/css" href="dashboard/fontawesome-free-5.7.2-web/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="dashboard/js/a.js"></script>
    <script src="dashboard/js/b.js"></script>
    <script src="dashboard/js/c.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
      integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
      integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
      crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="dashboard/bootstrap/css/bootstrap.min.css"
      integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script type="text/javascript" src="dashboard/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dashboard/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="dashboard/bootstrap/js/npm.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <style type="text/css">
      .reg_form {
        margin: 3%;
      }
    </style>

  </head>

<body>
  <div class="row">
    <div class="col-md-6">
      <form style="border: 2px solid black; padding: 3%; color: yellow; background-color: #0f3460; border-radius: 3em;"
        class="reg_form" action="register_patients.php" method="POST">
        <h1 style="text-align: center;">Patients Registration</h1>
        <div class="form-row">
          <div class="form-group col-md-11 ml-4">
            <label class="" for="name" class="a"><b>Full Name*</b></label>
            <input type="text" class="form-control" name="name" placeholder="Full Name" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-11 ml-4">
            <label class="" for="address"><b>Address*</b></label>
            <input type="text" class="form-control" name="address" placeholder="Address" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-11 ml-4">
            <label class="" for="email"><b>Email Address*</b></label>
            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-11 ml-4">
            <label class="" for="phone"><b>Phone Number*</b></label>
            <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-11 ml-4">
            <label class="" for="bday"><b>Date of Birth*</b></label>
            <input type="date" class="form-control" name="bday" placeholder="Date of Birth" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-11 ml-4">
            <label class="" for="inputState"><b>Gender*</b></label>
            <select id="inputState" name="gender" class="form-control" required>
              <option value="" selected disabled>Select Gender</option>
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-11 ml-4">
            <label class="" for="bday"><b>Password*</b></label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-11 ml-4">
            <label class="" for="bday"><b>Confirm Password*</b></label>
            <input type="password" class="form-control" name="con_password" placeholder="Confirm Password" required>
          </div>
        </div>

        <div class="dropdown-divider"></div>
        <button type="submit" name="submit" class="btn col-md-6 btn-info"
          style="border-radius:20px; padding-top: 1%; padding-bottom: 1%; margin-left: 25%">Register</button><br>
        <p style="color: white; font-size: 11px; margin-top: 2%; margin-left: 30%;">Do you have account.. to login
          click here.. <a style="margin-left: 1%;" href="login.php">Login</a></p>
      </form>
    </div>
    <div class="col-md-6">
      <img src="img/banner/71508807-indian-female-doctor-treating-young-girl-patient.jpg" width="100%">
      <img
        src="img/banner/doctor-whit-assistant-treating-teeth-patient-preventing-caries-stomatology-concept-professional-dentist-assistant-wearing-147282095.jpg"
        width="100%">
    </div>
    <br><br>
    <?php

    if (isset($_POST['submit'])) {
      $fname = $_REQUEST['name'];
      $emails = $_REQUEST['email'];
      $address = $_REQUEST['address'];
      $phone = $_REQUEST['phone'];
      $gender = $_REQUEST['gender'];
      $bday = $_REQUEST['bday'];
      $password = $_REQUEST['password'];
      $con_password = $_REQUEST['con_password'];
      $cdate = date("Y/m/d");

      if (!empty($fname)) {
        if (!empty($emails)) {
          if (filter_var($emails, FILTER_VALIDATE_EMAIL)) {
            if (!empty($address)) {
              if (!empty($phone)) {
                if (!empty($gender)) {

                  if (preg_match("/^([0]([7189])([071628])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)) {
                    if (!empty($bday)) {
                      if (!empty($password)) {
                        if (!empty($con_password)) {
                          if (strlen($password) >= 8) { // Minimum password length check
                            if (preg_match('/[A-Za-z]/', $password) && preg_match('/[0-9]/', $password)) {
                              if ($password == $con_password) {
                                $query2 = "SELECT * FROM patients WHERE email='$emails'";

                                $sql2 = mysqli_query($con, $query2);

                                if (mysqli_num_rows($sql2) > 0) {
                                  echo "<script>alert(\"Email is Alrady Exists\");</script>";
                                } else {

                                  $query3 = "SELECT * FROM patients WHERE  phone_number='$phone'";
                                  $sql3 = mysqli_query($con, $query3);

                                  if (mysqli_num_rows($sql3) > 0) {
                                    echo "<script>alert(\"Phone Number Alrady Exists\");</script>";

                                  } else {

                                    $passave = md5($password);

                                    $q1 = "INSERT INTO patients(full_name,phone_number,dob,gender,email,address,trndate,password) values('$fname','$phone','$bday','$gender','$emails','$address','$cdate','$passave')";

                                    $res1 = mysqli_query($con, $q1);

                                    if ($res1) {


                                      echo '<script>alert("Registration Scussessfully. You can login now");
                                                                window.location.href="login.php";
                                                                </script>';

                                    } else {
                                      echo "<script>alert(\"Data Save is Not Scussess\");</script>";
                                    }
                                  }
                                }
                              } else {
                                echo "<script>alert(\"Password is Not Match\");</script>";
                              }
                            } else {
                              echo "<script>alert(\"Password must contain both letters and numbers\");</script>";
                            }
                          } else {
                            echo "<script>alert(\"Password must be at least 8 characters long\");</script>";
                          }
                        } else {
                          echo "<script>alert(\"Please Enter Re-Password\");</script>";
                        }
                      } else {
                        echo "<script>alert(\"Please Enter Password\");</script>";
                      }
                    } else {
                      echo "<script>alert(\"Enter Enter Date of Birth\");</script>";
                    }
                  } else {
                    echo "<script>alert(\"Enter Valid Phone Number\");</script>";
                  }

                } else {
                  echo "<script>alert(\"Select Your Gender\");</script>";
                }
              } else {
                echo "<script>alert(\"Enter Phone Number\");</script>";
              }
            } else {
              echo "<script>alert(\"Enter Address\");</script>";
            }

          } else {
            echo "<script>alert(\"Enter Valid Email Address\");</script>";
          }
        } else {
          echo "<script>alert(\"Enter Email Address\");</script>";
        }
      } else {
        echo "<script>alert(\"Enter Full Name\");</script>";
      }

    }
    ?>
  </div>
</body>

</html>
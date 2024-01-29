<?php
require_once 'dashboard/connection.php'; //insert connection to page
session_start();
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-calendar-check mr-2"></i>Appointments
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="my_appinments.php">Channeling Appointment History</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

        <section class="container-fluid">

            <div class="row justify-content-center p-5">
                <div class="col-md-12">
                    <div class="row">
                        <h1 style="margin-left: 2%;">Channel Booking</h1>
                    </div>
                    <div class="row mt-5">

                        <form class="reg_form" action="" method="POST"
                            style="width : 60%; border: 2px solid black; padding: 3%; background-color: #0f3460; border-radius: 3em;">
                            <h1 class="text-center" style="color: yellow;">Booking Application</h1>
                            <?php
                            if (isset($_REQUEST['sch_id'])) {
                                $existingScheduleQuery = "SELECT DISTINCT s.sch_id, s.sc_date, s.sc_time, d.full_name
                               FROM schedule s
                               INNER JOIN doctor d ON d.did = s.docid
                               WHERE s.sch_id = '" . $_REQUEST['sch_id'] . "'
                               AND CONCAT(s.sc_date, ' ', s.sc_time) > NOW()
                               ORDER BY CONCAT(s.sc_date, ' ', s.sc_time) ASC
                               LIMIT 1";
                            } else {
                                $existingScheduleQuery = "SELECT DISTINCT s.sch_id, s.sc_date, s.sc_time, d.full_name
                               FROM schedule s
                               INNER JOIN doctor d ON d.did = s.docid
                               WHERE CONCAT(s.sc_date, ' ', s.sc_time) > NOW()
                               ORDER BY CONCAT(s.sc_date, ' ', s.sc_time) ASC
                               LIMIT 1";
                            }

                            $existingScheduleResult = mysqli_query($con, $existingScheduleQuery);

                            // Check if the query was successful and data is available
                            if ($existingScheduleResult && mysqli_num_rows($existingScheduleResult) > 0) {
                                ?>
                                <div class="form-group">
                                    <label for="schedule" class="text-white"><b>Schedule</b></label>
                                    <select id="schedule" name="schedule" class="form-control">
                                        <option value="">Select a Schedule</option>
                                        <?php while ($row = mysqli_fetch_assoc($existingScheduleResult)) {
                                            ?>
                                            <option <?php if (isset($_REQUEST['sch_id']) && $_REQUEST['sch_id'] == $row['sch_id']) {
                                                echo 'selected';
                                            } ?> value="<?php echo $row['sch_id']; ?>">
                                                <?php echo $row['full_name']; ?>
                                            </option>
                                            <?php
                                        } ?>
                                    </select>
                                </div>
                                <?php
                            }
                            ?>
                            <?php if (isset($_SESSION['email'])) {
                                $viewquery = "SELECT * FROM patients WHERE email = '" . $_SESSION['email'] . "'";
                                $viewresult = mysqli_query($con, $viewquery);
                                $row = mysqli_fetch_assoc($viewresult); ?>
                                <div class="form-group">
                                    <label for="patient_name" class="text-white"><b>Full Name</b></label>
                                    <input type="text" value="<?php echo $row['full_name']; ?>" class="form-control"
                                        name="patient_name" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <label for="patient_email" class="text-white"><b>Patient Email</b></label>
                                    <input type="text" readonly value="<?php echo $row['email']; ?>" class="form-control"
                                        name="patient_email" placeholder="Patient Email">
                                </div>

                                <div class="form-group">
                                    <label for="patient_address" class="text-white"><b>Address</b></label>
                                    <input type="text" value="<?php echo $row['address']; ?>" class="form-control"
                                        name="patient_address" placeholder="Address">
                                </div>

                                <div class="form-group">
                                    <label for="patient_phone" class="text-white"><b>Phone Number</b></label>
                                    <input type="text" value="<?php echo $row['phone_number']; ?>" class="form-control"
                                        name="patient_phone" placeholder="Phone Number">
                                </div>
                            <?php } else { ?>
                                <div class="form-group">
                                    <label for="patient_name" class="text-white"><b>Full Name</b></label>
                                    <input type="text" class="form-control" name="patient_name" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <label for="patient_email" class="text-white"><b>Patient Email</b></label>
                                    <input type="text" class="form-control" name="patient_email"
                                        placeholder="Patient Email">
                                </div>
                                <div class="form-group">
                                    <label for="patient_address" class="text-white"><b>Address</b></label>
                                    <input type="text" class="form-control" name="patient_address" placeholder="Address">
                                </div>

                                <div class="form-group">
                                    <label for="patient_phone" class="text-white"><b>Phone Number</b></label>
                                    <input type="text" class="form-control" name="patient_phone" placeholder="Phone Number">
                                </div>
                            <?php } ?>
                            <button type="submit" name="submit" class="btn btn-info btn-block"
                                style="border-radius: 20px;">Save Detail</button>
                            <p class="text-white text-center" style="font-size: 11px; margin-top: 2%;">Go Back to My
                                Account.. <a href="channel.php">Back</a></p>
                        </form>

                    </div>
                </div>
            </div>

            <?php
            // Check if the form is submitted
            if (isset($_POST['submit'])) {
                // Retrieve form data
                $sch_id = $_POST['schedule'];
                $patient_email = $_POST['patient_email'];
                $patient_phone = $_POST['patient_phone'];
                $patient_address = $_POST['patient_address'];
                $patient_name = $_POST['patient_name'];

                $existingScheduleQuery2 = "SELECT * FROM schedule WHERE sch_id = '" . $sch_id . "'";
                $stmexistingScheduleResult2 = mysqli_query($con, $existingScheduleQuery2);

                if ($stmexistingScheduleResult2 && mysqli_num_rows($stmexistingScheduleResult2) > 0) {
                    $row = mysqli_fetch_assoc($stmexistingScheduleResult2);
                    $amount = $row['price'];

                    // Insert data into the database
                    $insert_query = "INSERT INTO appinment (sch_id, patient_email, trn_date, amount, accept, patient_name, patient_address, patient_phone) 
                     VALUES ('$sch_id', '$patient_email', NOW(), $amount, 'Pending', '$patient_name', '$patient_address', '$patient_phone')";

                    // Execute the query
                    if (mysqli_query($con, $insert_query)) {
                        echo "<script> alert('Schedule added successfully!'); </script>";
                    } else {
                        echo "<script> alert('Failed to add schedule'); </script>";
                    }

                    // Close the database connection
                    mysqli_close($con);
                }
            }
            ?>
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
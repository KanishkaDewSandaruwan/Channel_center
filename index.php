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

        <section class="container-fluid mt-5">

            <?php
            $slider_query = "SELECT * FROM menu";
            $slider_query_result = mysqli_query($con, $slider_query);
            if (mysqli_num_rows($slider_query_result) > 0) {

                $row = mysqli_fetch_assoc($slider_query_result);
                $menu_img = $row['image1'];

                $image_src1 = "img/upload/menu/" . $menu_img;

                ?>
                <div class="row mt-2">
                    <div class="col-md-6 col-sm-5 col-lg-12 text-center">
                        <h2>Channel Your Doctor</h2>
                        <a href="channel.php">
                            <img src="<?php echo $image_src1; ?>" class="img-fluid" alt="Channel Your Doctor">
                        </a>
                    </div>
                </div>
            <?php } ?>

            <div class="row justify-content-center p-5 mt-5">
                <h3 class="text-center"><b>Welcome to Amaya Channeling Center in Kandy!</b></h3><br><br>
                <h4 style="text-align: justify; opacity: 0.6; font-weight:bold;">
                    We are dedicated to providing exceptional healthcare services through our doctor
                    channeling appointments. Our hospital is committed to the well-being and satisfaction of
                    our patients.
                    <br><br>
                    At Amaya Channeling Center, we understand the importance of timely access to healthcare
                    professionals. Through our efficient appointment system, we strive to connect you with
                    experienced doctors who can address your medical needs effectively. With a focus on
                    personalized care, our team of skilled doctors and staff members are dedicated to
                    providing comprehensive healthcare services. Whether you require a routine check-up or
                    specialized treatment, we are here to cater to your medical needs with compassion and
                    professionalism.
                    <br><br>
                    At Amaya Channeling Center, we prioritize patient comfort and convenience. Our goal is
                    to create a welcoming and comfortable environment where you can feel at ease during your
                    visit. We value your time and strive to minimize waiting periods, ensuring that your
                    appointments are conducted smoothly and efficiently. We are proud to serve the community
                    of Kandy and surrounding areas, and we look forward to being your trusted healthcare
                    partner. Experience the difference of personalized care and exceptional service at Amaya
                    Channeling Center.
                </h4>
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
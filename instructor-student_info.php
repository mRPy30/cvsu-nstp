<?php

include 'db_connect.php';

// Active Sidebar Page

$directoryURI = $_SERVER['REQUEST_URI'];

$path = parse_url($directoryURI, PHP_URL_PATH);

$components = explode('/', $path);

$page = $components[2];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----------TITLE------------>
    <link rel="shortcut icon" href="logo.png" type="">
    <title>
        <?php echo "Instructor Page"; ?>
    </title>

    <!----------CSS------------>
    <link rel="stylesheet" href="style_instructor.css">

    <!----------BOOTSTRAP------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!----------FONTS------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abel&family=Inter:wght@400;800&family=Poppins:wght@400;500&display=swap"
        rel="stylesheet">

    <!----------ICONS------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>

    <!----------ALERTS-------------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




    <!---Inner topbar--->
    <?php include('topbar.php'); ?>

</head>

<!----Body----->

<body>
    <section class="bg-section">
        <!---------Sidebar------------>
        <?php include('sidebar-instructor.php'); ?>

        <!----Main Content Instructor Student Info------>
        <div class="pcoded-main-content">
            <div class="container pt-4">
                <div class="col-lg-12">
                    <div class="col-lg-8">
                        <div class="active-box">
                            <h5>STUDENT INFO.</h5>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <a href="instructor-classes.html">
                            <ion-icon name="arrow-back-circle-outline"></ion-icon>
                        </a>
                    </div>
                    <div></div>
                    <hr class="main-content-line">
                </div>
                <div class="col-md-9 student-info">
                    <div class="stud-details">
                        <h2>Bernard Fernandez</h2>
                        <p>Bachelor of Science in Information Technology</p>
                        <p>First Year</p>
                        <p>202110118</p>
                        <p>CWTS</p>
                        <h2>Contact</h2>
                        <p>09123456789</p>
                        <p>Fernandez.Bernard@Cvsu.edu.ph</p>
                        <h2>Nstp Instructor :</h2>
                        <p>Armand Aton</p>
                    </div>
                </div>

            </div>
        </div>
        </div>

    </section>

</body>

</html>
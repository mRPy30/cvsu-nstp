<?php
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
    <link rel="short icon" href="logo-shortcut-icon.png" type="">
    <title>
        <?php echo "Student Page"; ?>
    </title>

    <!----------CSS------------>
    <link rel="stylesheet" href="style_student.css">

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
    <script src="https://kit.fontawesome.com/a3902efdd7.js" crossorigin="anonymous"></script>

    <!---Inner topbar--->
    <?php include('topbar.php'); ?>
</head>
<!----Body----->

<body>

    <!---------Sidebar------------>


    <section class="bg-section">
        <?php include('sidebar-student.php'); ?>
        <!---------End Sidebar--------->

        <!--Main Content-->

        <!--Main Content codeeeee-->

        <main class="pcoded-main-content">
            <div class="container pt-4">
                <div class="col-lg-12">
                
        <div class="centered">
            <div class="nstp_coordinator">
            <img src="Sixto.jpg" class="rounded-img">
            <h1>PROF. SIXTO N. RAS, JR.</h1>
            <h2>NSTP Program Coordinator</h2>
            <i class="fa-brands fa-facebook"></i>
            <h3>Sixto N. Ras Jr.</h3>
            <i class="fa-solid fa-envelope"></i>
            <h3>snras@cvsu.edu.ph</h3>
            </div>
        

        <div class="container">
        <div class="mapouter">
            <div class="gmap_canvas">
            <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=cavite state university - imus campus&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            </div>
        </div>
        </div>

        <div class="contact-info section-padding-02">
                            <div class="row gy-4">
                                <div class="col-lg-4 col-md-6">
                                    <!-- Contact Info Start -->
                                    <div class="contact-info__item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="contact-info__content">
                                            <i class="fa-solid fa-map-location"></i>
                                            <h5 class="contact-info__title">Address</h5>
                                            <h6>Cavite Civic Center, <br> Palico IV, Imus City, Cavite</h6>
                                        </div>
                                    </div>
                                    <!-- Contact Info End -->
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <!-- Contact Info Start -->
                                    <div class="contact-info__item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="contact-info__content">
                                            <i class="fa-solid fa-phone"></i>
                                            <h5 class="contact-info__title">Contact</h5>
                                            <h6>Admin: (046) 471-6607 <br> Registrar: (046) 436-6584</h6>
                                        </div>
                                    </div>
                                    <!-- Contact Info End -->
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <!-- Contact Info Start -->
                                    <div class="contact-info__item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="contact-info__content">
                                            <i class="fa-solid fa-business-time"></i>
                                            <h5 class="contact-info__title">Office Hours</h5>
                                            <h6>Monday - Thursday: <br> 07:00 AM - 06:00 PM</h6>
                                        </div>
                                    </div>
                                    <!-- Contact Info End -->
                                </div>
                            </div>
                        </div> 
                </div>
            </div>
        </main>
         <!-----End Main content------>
    </section>
     <!-----End of Body------>
</body>

</html
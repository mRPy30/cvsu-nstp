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
    <link rel="shortcut icon" href="logo.png" type="">
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

        <main class="pcoded-main-content">
            <div class="container pt-4">
                <div class="col-lg-12">

                    <div class="first-content">
                        <div class="first-inner-content">
                            <h1>The <span style="font-weight:900">National Service Training Program (NSTP) </span> Act
                                of 2001 (R.A. 9163) was
                                enacted
                                in response to public clamor for reforms in the Reserved Officers Training Corps (ROTC)
                                Program. This act affirms that the prime duty of the government shall be to serve and
                                protect its citizens. In turn, it shall be the responsibility of all its citizens to
                                defend the security of the State; thus, the government may require each citizen to
                                render personal, military or civil service. In the pursuit of these goals, the youth
                                shall be motivated, trained, organized, and mobilized in military training, literacy,
                                civic welfare, and other similar endeavors in service to the nation.</h1>
                        </div>
                        <div class="content-pic">
                            <img src="nstp-about.png" class="rounded float">
                        </div>

                    </div>

                    <div class="inner-content">
                        <div class="inner-left col-md-6">
                            <h3>National Service Training Program 1</h3>
                            <p>The course mandated by Republic Act No. 9163, otherwise known as the National Service
                                Training Act of 2001, aims to enhance the civic consciousness of the students “by
                                developing the ethics of service and patriotism” while undergoing Civic Welfare Training
                                Service (CWTS). NSTP1 covers topics through big sessions in campus that will tap on the
                                students’ enthusiasm and idealism for nation-building, leadership and civic involvement.
                                Combining active reflection in a creative dynamic learning environment, it prepares the
                                students into actual community service in NSTP 2.</p>
                            <img src="pic11.png" class="rounded float">
                        </div>

                        <div class="inner-right col-md-6  ">
                            <h3>National Service Training Program 2</h3>
                            <p>This course is the natural follow through of the Civic Welfare Training Service (CWTS)
                                the students underwent in NSTP 1. It includes the programs and activities highlighted by
                                the community service/immersion that are contributory to the welfare and the betterment
                                of the life of the members of the community. Among the areas where the students can make
                                their contribution through CWTS 2 are education, environment, entrepreneurship, health
                                and safety and the moral development of the members of the community where they render
                                service. It is hoped that this course will point them to a clearer life-long engagement
                                in service and volunteerism.</p>
                            <br>
                            <img src="pic22.png" class="rounded float">
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-----End Main content------>
    </section>


    <!-----End of Body------>
</body>

</html>
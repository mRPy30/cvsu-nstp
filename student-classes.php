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
            <div class="container">
                <div class="col-lg-12">
                    <div class="rec-content">
                        <!-- Add your main content here -->
                        <div class="upperbox">
                            <h4> Welcome to your NSTP-1 class </h4>
                        </div>

                        <div class="middlebox">
                            <div class="records_box col-sm-4" id="instructor_box">
                                <h3><i class="fa-regular fa-user"></i> Instructor </h3>
                            </div>

                            <div class="records_box col-sm-4" id="classes_box">
                                <h3><i class="fa-solid fa-list-ul"></i> Class List </h3>
                            </div>

                            <div class="records_box col-sm-4" id="course_box">
                                <h3><i class="fa-regular fa-folder-open"></i> Course Materials </h3>
                            </div>

                            <div class="records_box col-sm-4" id="grade_box">
                                <h3><i class="fa-solid fa-graduation-cap"></i> Grades </h3>
                            </div>

                            <div class="records_box col-sm-4" id="schedule_box">
                                <h3><i class="fa-regular fa-calendar-days"></i>Schedule </h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-----End Main content------>
    </section>

    <script>
        document.getElementById('instructor_box').addEventListener('click', function () {
            window.location.href = 'student-classes-instructor.php';
        });

        document.getElementById('classes_box').addEventListener('click', function () {
            window.location.href = 'student-classes-classlist.php';
        });

        document.getElementById('course_box').addEventListener('click', function () {
            window.location.href = 'student-classes-course-materials.php';
        });

        document.getElementById('grade_box').addEventListener('click', function () {
            window.location.href = 'student-classes-grade.php';
        });

        document.getElementById('schedule_box').addEventListener('click', function () {
            window.location.href = 'student-classes-schedule.php';
        });

    </script>

    <!-----End of Body------>
</body>

</html>
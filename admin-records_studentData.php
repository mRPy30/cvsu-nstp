<?php

include 'db_connect.php';


$studentName = '';
$sectionName = '';
$courseName = '';
$studentID = '';

session_start();

if (isset($_GET['id'])) {
    $studentID = $_GET['id'];
} elseif (isset($_SESSION['studentID'])) {
    $studentID = $_SESSION['studentID'];


}


// Retrieve student details from the database
$query = "SELECT student.name, tbl_sections.sectionName, tbl_course.courseName, student.id
              FROM student
              INNER JOIN tbl_sections ON student.sectionID = tbl_sections.sectionID
              INNER JOIN tbl_course ON tbl_sections.courseID = tbl_course.courseID
              WHERE student.id = '$studentID'";




$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the student details
    $student = mysqli_fetch_assoc($result);

    // Retrieve the individual values
    $studentName = $student['name'];
    $sectionName = $student['sectionName'];
    $courseName = $student['courseName'];
    $studentID = $student['id'];
} else {
    echo "No student found with the provided ID.";
}


?>


<?php
// Active Sidebar Page

$directoryURI = $_SERVER['REQUEST_URI'];

$path = parse_url($directoryURI, PHP_URL_PATH);

$components = explode('/', $path);

$page = $components[2];
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----------TITLE------------>
    <link rel="short icon" href="logo-shortcut-icon.png" type="">
    <title>
        <?php echo "Coordinator Page"; ?>
    </title>

    <!----------CSS------------>
    <link rel="stylesheet" href="style_admin.css">

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
        <?php include('sidebar-admin.php'); ?>

        <!--Main Content-->
        <main class="pcoded-main-content">
            <div class="container">
                <div class="col-lg-12">
                    <div class="rec-content print-container">


                        <div class="upperbox">
                            <h3>Student Records</h3>
                            <div class="searchbox">
                                <i class="fa-solid fa-magnifying-glass"></i><input type="text" class="form-control"
                                    aria-label="Text input with checkbox" id="searchInput" onkeyup="searchTable()"
                                    placeholder="Search section names...">
                            </div>
                            <div class="print">
                                <i class="fa-solid fa-print" onclick="window.print()"></i>
                            </div>
                            <a href="admin-records_sectionStudentDetails.php" class="go-back-button"><ion-icon
                                    name="arrow-back-circle-outline"></ion-icon></a>
                        </div>


                        <div class="student-info">
                            <div class="middle-box_Student">

                                <!----------------------------- SHOWING STUDENT DETAILS ------------------------>


                                <?php if (!empty($studentName) && !empty($sectionName) && !empty($courseName) && !empty($studentID)): ?>
                                    <h3>PERSONAL DETAILS</h3>
                                    <p>Full Name:
                                        <b>
                                            <?php echo $studentName ?>
                                        </b>
                                    </p>
                                    <p>NSTP Program:
                                        <b>
                                            <?php echo $courseName ?>
                                        </b>
                                    </p>

                                    <h3>ACADEMIC DETAILS</h3>
                                    <p>Course and Section:
                                        <b>
                                            <?php echo $sectionName ?>
                                        </b>
                                    </p>
                                    <p>Student Number:
                                        <b>
                                            <?php echo $studentID ?>
                                        </b>
                                    </p>
                                <?php else: ?>
                                    <p>No student data available.</p>
                                <?php endif; ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-----End Main content------>

        <!-----End of Body------>
    </section>
</body>

</html>
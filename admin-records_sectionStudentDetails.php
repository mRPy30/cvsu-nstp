<?php
include 'db_connect.php';


session_start();



    $selectedsectionID = "";
    $selectedsectionName = "";
    $selectedCourseName = "";

if (isset($_GET['sectionID']) && isset($_GET['sectionName'])) {
    $selectedsectionID = $_GET['sectionID'];
    $selectedsectionName = $_GET['sectionName'];

    $_SESSION['selectedsectionID'] = $selectedsectionID;
    $_SESSION['selectedsectionName'] = $selectedsectionName;

} elseif (isset($_SESSION['selectedsectionID']) && isset($_SESSION['selectedsectionName'])) {
    $selectedsectionID = $_SESSION['selectedsectionID'];
    $selectedsectionName = $_SESSION['selectedsectionName'];
}








// Fetch section details from the database
$sql = "SELECT * FROM tbl_sections WHERE sectionID = '$selectedsectionID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sectionData = $result->fetch_assoc();
    $courseID = $sectionData['courseID'];

    // Fetch course name from the database
    $sql = "SELECT courseName FROM tbl_course WHERE courseID = '$courseID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $courseData = $result->fetch_assoc();
        $selectedCourseName = $courseData['courseName'];
    }
}



$sql = "SELECT id, name FROM student WHERE sectionID = '$selectedsectionID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $students = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $students = array();
}
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

                        <!--------------------------------- DIV PARA SA TITLE AT GO BACK BUTTON ----------------------------------->
                        <div class="upperbox">
                            <h3>
                                <?php echo $selectedCourseName; ?>
                            </h3>

                            <div class="searchbox">
                                <i class="fa-solid fa-magnifying-glass"></i><input type="text" class="form-control"
                                    aria-label="Text input with checkbox" id="searchInput" onkeyup="searchTable()"
                                    placeholder="Search section names...">
                            </div>

                            <div class="print">
                                <i class="fa-solid fa-print" onclick="window.print()"></i>
                            </div>

                            <a href="admin-records_Student.php" class="go-back-button"><ion-icon
                                    name="arrow-back-circle-outline"></ion-icon></a>
                        </div>


                        <!--------------------------------- TABLE FOR STUDENTS ----------------------------------->
                        <div class="align-tbl-student">
                            <div class="student-tbl-display">
                                <div class="course-and-section">
                                    <p>
                                        <?php echo $selectedCourseName . ' - ' . $selectedsectionName; ?>
                                    </p>
                                </div>

                                <table id="student-course-table">
                                    <thead>
                                        <tr>
                                            <th>Student Names</th>
                                        </tr>
                                    </thead>
                                    <tbody class="scrollable-tbody">
                                        <?php if (!empty($students)): ?>
                                        <?php foreach ($students as $student): ?>
                                        <tr>
                                            <td>
                                                <a
                                                    href="admin-records_studentData.php?id=<?php echo $student['id']; ?>">
                                                    <?php echo $student['name']; ?>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="4">No students found.</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
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
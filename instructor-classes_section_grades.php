<?php
include 'db_connect.php';


// Start the session
session_start();

// Fetch section info
$selectedsectionID = $_GET['sectionID'] ?? '';

$sql = "SELECT * FROM tbl_sections WHERE sectionID = '$selectedsectionID'";
$result = $conn->query($sql);

// Initialize an empty array to hold student data
$students = array();

if ($result->num_rows > 0) {
    $sectionData = $result->fetch_assoc();
    $courseID = $sectionData['courseID'];
    
    // Fetch name and student id
    $sql = "SELECT id, name FROM student WHERE sectionID = '$selectedsectionID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $students = $result->fetch_all(MYSQLI_ASSOC);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitAttendance'])) {
    $attendanceData = $_POST['attendance'];

    // Loop through each student's attendance and update the database
    foreach ($attendanceData as $studentId => $attendance) {
        // Update the attendance value for each student in the database
        $updateQuery = "UPDATE student SET attendance = '$attendance' WHERE id = '$studentId'";
        $conn->query($updateQuery);
        
        // Calculate total attendance for each student and update the total_attendance column
        $totalAttendanceQuery = "UPDATE student SET total_attendance = total_attendance + '$attendance' WHERE id = '$studentId'";
        $conn->query($totalAttendanceQuery);
    }

    // Redirect back to the page to refresh the section table
    header("Location: instructor-classes_section_grades.php");
    exit();
}

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
    <title><?php echo "Instructor Page"; ?></title>

     <!----------CSS------------>
    <link rel="stylesheet" href="style_instructors.css">

     <!----------BOOTSTRAP------------>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     
     <!----------FONTS------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Inter:wght@400;800&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <!----------ICONS------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>

    <!----------ALERTS-------------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!---Inner topbar--->
     <?php include('topbar.php');?>
        
</head>

<!----Body----->

<body>
    <section class="bg-section">
        <!---------Sidebar------------>
        <?php include('sidebar-instructor.php');?>
         
        <!---------End Sidebar--------->

        <!--------MAIN CONTENT-------->
            <main class="pcoded-main-content">
                <div class="container pt-4">
                    <div class="col-lg-12">
                        <div class="box-top">
                            <h5>BSIT1-C</h5>
                                <a href="instructor-classes.php">
                                <ion-icon name="arrow-back-circle-outline"></ion-icon>
                                </a>
                            </div>               
                        <div class="class_navs">
                            <ul class="nav nav-underline">
                                <li class="nav-item">
                                  <a class="nav-link" href="instructor-classes_section.php">Masterlist</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link active" href="#">Grades</a>
                                </li>
                              </ul>
                        </div>
                        <div class="acads_info">
                            <p>ACADEMIC YEAR : 2022 - 2023 | SEMESTER: SECOND SEMESTER</p>
                        </div>
                        <div class="tbl_grades">
                        <form method="post">
                            <table class="table table-hover ">
                                <thead class="title">
                                <tr>
                                    <th scope="col" class="col-3">Student Number</th>
                                    <th scope="col" class="col-3">Name</th>
                                    <th scope="col" class="col-3">Grade</th>
                                </tr>
                                </thead>
                                    <tbody>
                                    <?php if (!empty($students)): ?>
                                        <?php foreach ($students as $student): ?>
                                            <tr>
                                                <td><?php echo $student['id']; ?></td>
                                                <td><?php echo $student['name']; ?></td>
                                                <td><input type="number" name="attendance[<?php echo $student['id']; ?>]" value="0"></td>
                                             </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="4">No students found.</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary" name="submitAttendance">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </main>      
        <!-----End Main content------>
</section>
</body>
</html>
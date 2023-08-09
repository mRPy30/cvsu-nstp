<?php

include 'db_connect.php';


session_start();

$selectedsectionID = "";
$selectedsectionName = "";
$selectedCourseName = "";



// Fetch section info
$sql = "SELECT * FROM tbl_sections WHERE sectionID = '$selectedsectionID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sectionData = $result->fetch_assoc();
    $courseID = $sectionData['courseID'];

// Fetch name and student id
$sql = "SELECT id, name FROM student WHERE sectionID = '$selectedsectionID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $students = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $students = array();
}
}
// Attendance into the database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitAttendance'])) {
    $attendanceData = $_POST['attendance'];

    // Loop through each student's attendance and insert into the database
    foreach ($attendanceData as $studentId => $attendance) {
        $insertQuery = "INSERT INTO student (id, attendance) VALUES ('$studentId', '$attendance')";
       
    }
    // Redirect back to the page to refresh the section table
     header("Location: instructor-classes_section.php");
     exit();
 }


// Check if the sectionName parameter is set in the URL
if (isset($_GET['sectionName'])) {
    // Get the sectionName value and store it in a variable
    $sectionName = $_GET['sectionName'];

    
} else {
    // Handle the case when sectionName parameter is not set in the URL
    echo "Section Name not provided.";
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
<?php  echo "$selectedsectionID"; ?>
    
    <section class="bg-section">
        <!---------Sidebar------------>
        <?php include('sidebar-instructor.php');?>
         
        <!---------End Sidebar--------->
        <!--------Main Content------->
            <main class="pcoded-main-content">
                <div class="container pt-4">
                    <div class="col-lg-12">
                        <a href="instructor-classes.php">
                            <ion-icon name="arrow-back-circle-outline"></ion-icon>
                        </a>                  
                        <div class="section_name">
                            <h1><?php echo " $sectionName" ?></h1>
                            <p id="datetime"></p>
                        </div>
                        <div class="class_navs">
                            <ul class="nav nav-underline">
                                <li class="nav-item">
                                  <a class="nav-link active" href="#">Masterlist</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="instructor-classes_section_grades.php">Grades</a>
                                </li>

                              </ul>
                        </div>
                        <div class="tbl_masterlist">
                        <form method="post">
                            <table class="table table-hover" method="post">
                                <thead class="title bar">
                                <tr>
                                    <th scope="col" class="col-3">Student Number</th>
                                    <th scope="col" class="col-5">Name</th>
                                    <th scope="col" class="col-2"> Total Attendance</th>
                                </tr>
                                </thead>
                                    <tbody class="scrollable-tbody">
                                        <?php if (!empty($students)): ?>
                                        <?php foreach ($students as $student): ?>
                                        <?php foreach ($students as $studentid): ?>
                                        <tr>
                                            <td><?php echo $studentid['id']; ?></td>
                                            <td>
                                                <a
                                                    href="instructor-student_info.php?id=<?php echo $student['id']; ?>">
                                                    <?php echo $student['name']; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <input type="number" name="attendance[<?php echo $student['id']; ?>]" value="0">
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="4">No students found.</td>
                                        </tr>
                                        <?php endif; ?>
                                            
                                        <tr>
                                            <td>202110116</td>
                                            <th><a href="instructor-student_info.php">Bianca Bautista</a></th>
                                            <td><input type="text"></td>
                                        </tr>
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

<script>
    // Function to update the date and time display
    function updateDateTime() {
      const now = new Date();
      const options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', timeZone: 'Asia/Manila' };
      const formattedDateTime = now.toLocaleDateString('en-PH', options);
      
      document.getElementById('datetime').textContent = formattedDateTime;
    }

    // Update the date and time initially
    updateDateTime();

    // Update the date and time every second
    setInterval(updateDateTime, 1000);
  </script>
</body>
</html>
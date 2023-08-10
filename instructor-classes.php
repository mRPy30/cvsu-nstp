<?php
include "db_connect.php";

session_start();
$accountID = $_SESSION['id'];


      // Count query for student
      $query = "SELECT COUNT(id) AS total_students FROM student";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);
      $totalStudents = $row['total_students'];

    // query for the name of the instructor
    $query = "SELECT instructorName FROM instructor WHERE id = '$accountID'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $instructorName = $row['instructorName'];
    } else {
        // Handle the case if the instructor is not found
        $instructorName = "Unknown";
    }

    
    // query for the description of the instructor
    $query = "SELECT instructorDescription FROM instructor WHERE id = '$accountID'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $instructorDesc = $row['instructorDescription'];
    } else {
        // Handle the case if the instructor is not found
        $instructorDesc = "Unknown";
    }

    // query for the instructor handled courseID
    $query = "SELECT tbl_course.courseID FROM instructor
    LEFT JOIN tbl_course ON instructor.courseID = tbl_course.courseID
    WHERE instructor.id = '$accountID'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $CourseID = $row['courseID'];
    } else {
        // Handle the case if the course ID is not found
         $CourseID = "0";
    }
    
     // query for the instructor handled course
     $query = "SELECT tbl_course.unit FROM instructor
     LEFT JOIN tbl_course ON instructor.courseID = tbl_course.courseID
     WHERE instructor.id = '$accountID'";
     $result = mysqli_query($conn, $query);
     if ($result && mysqli_num_rows($result) > 0) {
     $row = mysqli_fetch_assoc($result);
     $courseUnit = $row['unit'];
     } else {
         // Handle the case if the course unit is not found
          $courseUnit = "0.00";
     }


    // Fetch sections for the selected course from the database
    $sql = "SELECT sectionName FROM tbl_sections WHERE courseID = '$accountID'";
    $result = $conn->query($sql);
    
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
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>

    <!---Inner topbar--->
     <?php include('topbar.php');?>
        
</head>

<!----Body----->

<body>
    <section class="bg-section">
        <!---------Sidebar------------>
        <?php include('sidebar-instructor.php');?>
         
        <!---------End Sidebar--------->

        <!--Main Content-->
<main class="pcoded-main-content">
    <div class="container pt-4">
            <div class="col-lg-12">
                <div class="box-classes">
                        <div class="box-classes_left">
                            <i class="fa-solid fa-user"></i>
                            <h5><?php echo " $instructorName" ?> </h5>
                            <p><?php echo "$instructorDesc" ?> </p>
                        </div>
                        <div class="box-classes_right">
                            <h2><?php echo $totalStudents; ?></h2>
                            <p>STUDENTS</p>
                        </div>
                </div>
                <div class="class_info">
                    <h3>Program code: <?php echo $CourseID; ?></h3>
                    <p>Unit: <?php echo $courseUnit; ?></p>
                </div>

              
                <div class="sections-display">
    <?php
    $sections = array(); // Initialize an array to store section details
    $sectionsQuery = "SELECT * FROM tbl_sections WHERE instructorID=$accountID";
    $resultSections = $conn->query($sectionsQuery);

    if ($resultSections->num_rows > 0) {
        while ($row = $resultSections->fetch_assoc()) {
            $sections[] = array(
                'sectionID' => $row['sectionID'],
                'sectionName' => $row['sectionName']
            );
        }

        foreach ($sections as $section) {
            $sectionID = $section['sectionID'];

            // Query to get the total number of students for the current section
            $totalStudentsQuery = "SELECT COUNT(id) AS totalStudents FROM student WHERE sectionID = ?";
            $stmt = $conn->prepare($totalStudentsQuery);
            $stmt->bind_param("i", $sectionID);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $totalStudents = $row['totalStudents'];
            } else {
                $totalStudents = 0; // If no students enrolled, set total to 0
            }

            // Query to get the schedule details for the current section
            $scheduleQuery = "SELECT time_from, time_to FROM tbl_schedule WHERE sectionID = ?";
            $stmt = $conn->prepare($scheduleQuery);
            $stmt->bind_param("i", $sectionID);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $start_time = $row['time_from'];
                $end_time = $row['time_to'];
            } else {
                $start_time = "N/A"; // If no schedule found, set to N/A
                $end_time = "N/A";
            }

            // Rest of your code to display section details
            $encodedSectionName = urlencode($section['sectionName']);
            echo "<a href='instructor-classes_section.php?sectionName=$encodedSectionName'>";
            echo "<div class='section_box'>";
            echo "<h4> {$section['sectionName']}</h4>";
            echo "<div class='sec_box_inner'>";
            echo "<h3> $totalStudents </h3>";
            echo "<p>Number Of Student</p>";
            echo "<h3>$start_time - $end_time</h3>"; // Display start and end times
            echo "<p>Schedule</p>";
            echo "</div>";
            echo "</div>";
            echo "</a>";
        }
    } else {
        echo "No sections found.";
    }
    ?>
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
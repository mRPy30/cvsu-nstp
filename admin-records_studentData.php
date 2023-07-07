<?php
include 'topbar.php';
include 'db_connect.php';
include 'sidebar.php';

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


<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS styles for the table display */
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            position: relative;
        }

        .upperbox {
            border-bottom: solid black 1px;
            height: 50px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .searchbox {
            display: flex;
            align-items: center;
            margin-left: auto; /* Adjust the margin as needed */
            margin-right: 20px; /* Adjust the margin as needed */
        }

        .searchbox input[type="text"] {
            width: 300px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            height: 38px;
        }

        .print button {
            background-color: white;
            border: 1px solid black;
            border-radius: 3px;
            padding: 5px 10px;
            color: black;
            cursor: pointer;
            height: 38px;
            margin-right: 15px;
        }

        .upperbox .go-back-button {
            padding: 10px 20px;
            height: 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }

        .upperbox .go-back-button:hover {
            background-color: #45a049;
        }

        .middlebox {
            width: 1050px;
            border: 1px solid black;
            height: 500px;
            padding: 10px;
            margin-left: 30px;
        }
    </style>
</head>
<body>

<div class="content print-container">


    <div class="upperbox">
        <h3>Student Records</h3>
        <div class="searchbox">
            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search section names...">
        </div>
        <div class="print">
            <button onclick="window.print()">Print</button>
        </div>
        <a href="sectionStudentDetails.php" class="go-back-button">Go Back</a>
    </div>



    <div class="middlebox">

     <!----------------------------- SHOWING STUDENT DETAILS ------------------------>

     
        <?php if (!empty($studentName) && !empty($sectionName) && !empty($courseName) && !empty($studentID)) : ?>
            <h3>PERSONAL DETAILS</h3>
            <p>Full Name: <?php echo $studentName ?></p>
            <p>NSTP Program: <?php echo $courseName ?></p>

            <h3>ACADEMIC DETAILS</h3>
            <p>Course and Section: <?php echo $sectionName ?></p>
            <p>Student Number: <?php echo $studentID ?></p>
        <?php else : ?>
            <p>No student data available.</p>
        <?php endif; ?>



    </div>
</div>

</body>
</html>

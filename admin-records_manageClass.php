<?php
session_start(); // Start the session

include 'db_connect.php';

// Check if the selected course ID is stored in the session
if (isset($_SESSION['selectedCourseID'])) {
    $selectedCourseID = $_SESSION['selectedCourseID'];

    // Handle the deletion of a section
    if (isset($_GET['delete'])) {
        $sectionID = $_GET['delete'];

        // Delete the section from the database
        $deleteQuery = "DELETE FROM tbl_sections WHERE sectionID = '$sectionID'";
        $conn->query($deleteQuery);

        // Redirect back to the page to refresh the section table
        header('Location: admin-records_courseClasses.php?courseID=' . $selectedCourseID . '&courseName=' . $_SESSION['selectedCourseName']);
        exit();
    }
    // Handle the form submission for editing an existing section
    elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sectionName']) && isset($_POST['instructor_id']) && isset($_POST['room']) && isset($_POST['sectionID'])) {
        $sectionName = $_POST['sectionName'];
        $instructorID = $_POST['instructor_id'];
        $room = $_POST['room'];
        $sectionID = $_POST['sectionID'];

        // Update the section in the database
        $updateQuery = "UPDATE tbl_sections SET sectionName = '$sectionName', instructorID = '$instructorID', room = '$room' WHERE sectionID = '$sectionID'";
        $conn->query($updateQuery);

        // Redirect back to the page to refresh the section table
        header('Location: admin-records_courseClasses.php?courseID=' . $selectedCourseID . '&courseName=' . $_SESSION['selectedCourseName']);
        exit();
    }
    // Handle the form submission for adding a new section
    elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sectionName']) && isset($_POST['instructor_id']) && isset($_POST['room']) && !isset($_POST['sectionID'])) {
        $sectionName = $_POST['sectionName'];
        $instructorID = $_POST['instructor_id'];
        $room = $_POST['room'];

        // Insert the new section into the database
        $insertQuery = "INSERT INTO tbl_sections (sectionName, instructorID, room, courseID) VALUES ('$sectionName', '$instructorID', '$room', '$selectedCourseID')";
        $conn->query($insertQuery);

        // Redirect back to the page to refresh the section table
        header('Location: admin-records_courseClasses.php?courseID=' . $selectedCourseID . '&courseName=' . $_SESSION['selectedCourseName']);
        exit();
    }
} else {
    // Redirect to the page where the courses are listed
    header('Location: admin-records_courseClasses.php');
    exit();
}
?>
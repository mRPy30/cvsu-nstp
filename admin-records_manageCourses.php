<?php
include 'db_connect.php';

// Handle delete button click
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['courseID']) && isset($_POST['deleteCourse'])) {
        // Delete existing course
        $courseID = $_POST['courseID'];

        // Delete the course from the database
        $deleteQuery = "DELETE FROM tbl_course WHERE courseID = '$courseID'";
        $conn->query($deleteQuery);

        // Redirect back to the page to refresh the course table
        header('Location: admin-records_Courses.php');
        exit();
    }
    // Handle the form submission for editing a course
    elseif (isset($_POST['courseID'])) {
        $courseID = $_POST['courseID'];
        $courseName = $_POST['courseName'];

        // Update the course in the database
        $updateQuery = "UPDATE tbl_course SET courseName = '$courseName' WHERE courseID = '$courseID'";
        $conn->query($updateQuery);

        // Redirect back to the page to refresh the course table
        header('Location: admin-records_Courses.php');
        exit();
    }
    // Handle the form submission for adding a new course
    elseif (isset($_POST['courseName'])) {
        $courseName = $_POST['courseName'];

        // Insert the new course into the database
        $insertQuery = "INSERT INTO tbl_course (courseName) VALUES ('$courseName')";
        $conn->query($insertQuery);

        // Redirect back to the page to refresh the course table
        header('Location: admin-records_Courses.php');
        exit();
    }
}
?>

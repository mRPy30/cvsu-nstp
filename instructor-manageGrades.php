<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentIDs = $_POST['studentIDs'];
    $grades = $_POST['grades'];
    
    // Loop through the submitted data and update final grades for each student
    for ($i = 0; $i < count($studentIDs); $i++) {
        $studentID = $studentIDs[$i];
        $grade = $grades[$i];
    
        // Update the finalGrade for the current student in the student table
        $updateQuery = "UPDATE student SET finalGrade = '$grade' WHERE id = '$studentID'";
        $conn->query($updateQuery);
    }
    
    // Respond with a success message
    $response = array('success' => true);
    echo json_encode($response);
    header("Location: instructor-classes_section_grades.php");
    exit();
}
?>
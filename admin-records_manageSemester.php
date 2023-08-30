<?php
include 'db_connect.php';

// Code for deleting a semester
if (isset($_POST['semesterID']) && isset($_POST['deleteSemester'])) {
    // Delete existing expense
    $semesterID = $_POST['semesterID'];

    // Delete the semester from the database
    $deleteQuery = "DELETE FROM tbl_semester WHERE semesterID = '$semesterID'";
    $conn->query($deleteQuery);

    // Redirect back to the page to refresh the semester table
    header('Location: admin-records_Semester.php');
    exit();
}

// Code for setting a semester as default
if (isset($_POST['semesterID']) && isset($_POST['setDefaultSemester'])) {
    // Clear existing default semester
    $clearDefaultQuery = "UPDATE tbl_semester SET isDefault = 0";
    $conn->query($clearDefaultQuery);

    // Set the selected semester as default
    $semesterID = $_POST['semesterID'];
    $setDefaultQuery = "UPDATE tbl_semester SET isDefault = 1 WHERE semesterID = '$semesterID'";
    $conn->query($setDefaultQuery);

    // Redirect back to the page to refresh the semester table
    header('Location: admin-records_Semester.php');
    exit();
}

// Code for editing a semester
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["semesterID"]) && isset($_POST["semesterName"])) {
    $semesterID = $_POST["semesterID"];
    $semesterName = $_POST["semesterName"];
    
    // Perform your database update logic here
    $sql = "UPDATE tbl_semester SET semesterName = ? WHERE semesterID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $semesterName, $semesterID);
    $stmt->execute();
    $stmt->close();
    
    // Redirect back to the same page after editing a semester
    header("Location: recordsSemester.php");
    exit();
}

// Code for adding a semester
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["semesterName"])) {
    $semesterName = $_POST["semesterName"];
    
    // Perform your database insertion logic here
    $sql = "INSERT INTO tbl_semester (semesterName, isDefault) VALUES (?, NULL)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $semesterName);
    $stmt->execute();
    $stmt->close();
    
    // Redirect back to the same page after adding a semester
    header("Location: recordsSemester.php");
    exit();
}
?>
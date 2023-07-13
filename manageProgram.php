<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if it's a delete operation
    if (isset($_POST['programID']) && isset($_POST['deleteProgram'])) {
        $programID = $_POST['programID'];

        // Delete the program from the database
        $deleteQuery = "DELETE FROM tbl_program WHERE programID = '$programID'";
        $conn->query($deleteQuery);

        // Redirect back to the page to refresh the program list
        header('Location: programsList.php');
        exit();
    }

    // Check if it's an edit operation
    else if (isset($_POST["programID"]) && isset($_POST["programName"]) && isset($_POST["programLocation"]) && isset($_POST["description"]) && isset($_POST["instructor_id"]) && isset($_POST["scheduleDate"]) && isset($_POST["start_time"]) && isset($_POST["end_time"])) {
        $programID = $_POST["programID"];
        $programName = $_POST["programName"];
        $programLocation = $_POST["programLocation"];
        $description = $_POST["description"];
        $instructorID = $_POST["instructor_id"];
        $scheduleDate = $_POST["scheduleDate"];
        $start_time = $_POST["start_time"];
        $end_time = $_POST["end_time"];

        // Perform your database update logic here
        $sql = "UPDATE tbl_program SET programName = ?, programLocation = ?, description = ?, instructorID = ?, scheduleDate = ?, start_time = ?, end_time = ? WHERE programID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiisss", $programName, $programLocation, $description, $instructorID, $scheduleDate, $start_time, $end_time, $programID);
        $stmt->execute();
        $stmt->close();

        header("Location: editProgram.php?programID=".$programID);
        exit();
    }

    // Check if it's an add operation
    else if (isset($_POST["programName"]) && isset($_POST["programLocation"]) && isset($_POST["description"]) && isset($_POST["instructor_id"]) && isset($_POST["scheduleDate"]) && isset($_POST["start_time"]) && isset($_POST["end_time"])) {
        $programName = $_POST["programName"];
        $programLocation = $_POST["programLocation"];
        $description = $_POST["description"];
        $instructorID = $_POST["instructor_id"];
        $scheduleDate = $_POST["scheduleDate"];
        $start_time = $_POST["start_time"];
        $end_time = $_POST["end_time"];

        // Perform your database insertion logic here
        $sql = "INSERT INTO tbl_program (programName, programLocation, description, instructorID, scheduleDate, start_time, end_time) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiiss", $programName, $programLocation, $description, $instructorID, $scheduleDate, $start_time, $end_time);
        $stmt->execute();
        $stmt->close();

        header("Location: createProgram.php");
        exit();
    }
}
?>
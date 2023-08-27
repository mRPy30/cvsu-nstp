<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['deleteProgram'])) {
        // Delete operation
        if (isset($_POST['programID'])) {
            $programID = $_POST['programID'];
            $deleteQuery = "DELETE FROM tbl_program WHERE programID = '$programID'";
            $conn->query($deleteQuery);
            header('Location: admin-createprogram.php');
            exit();
        }
    } elseif (isset($_POST['updateProgram'])) {
        // Update operation
        if (isset($_POST["updateProgramID"]) && isset($_POST["programName"]) && isset($_POST["programLocation"]) && isset($_POST["description"]) && isset($_POST["instructor_id"]) && isset($_POST["scheduleDate"]) && isset($_POST["start_time"]) && isset($_POST["end_time"])) {
            $programID = $_POST["updateProgramID"];
            $programName = $_POST["programName"];
            $programLocation = $_POST["programLocation"];
            $description = $_POST["description"];
            $instructorID = $_POST["instructor_id"];
            $scheduleDate = $_POST["scheduleDate"];
            $start_time = $_POST["start_time"];
            $end_time = $_POST["end_time"];

            $sql = "UPDATE tbl_program SET programName = ?, programLocation = ?, description = ?, instructorID = ?, scheduleDate = ?, start_time = ?, end_time = ? WHERE programID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssiisss", $programName, $programLocation, $description, $instructorID, $scheduleDate, $start_time, $end_time, $programID);
            $stmt->execute();
            $stmt->close();

            header("Location: admin-createprogram.php");
            exit();
        }
    } elseif (isset($_POST['addProgram'])) {
        // Add operation
        if (isset($_POST["programName"]) && isset($_POST["programLocation"]) && isset($_POST["description"]) && isset($_POST["instructor_id"]) && isset($_POST["scheduleDate"]) && isset($_POST["start_time"]) && isset($_POST["end_time"])) {
            $programName = $_POST["programName"];
            $programLocation = $_POST["programLocation"];
            $description = $_POST["description"];
            $instructorID = $_POST["instructor_id"];
            $scheduleDate = $_POST["scheduleDate"];
            $scheduleDate = date('Y-m-d', strtotime($scheduleDate)); // Format the date
            $start_time = $_POST["start_time"];
            $end_time = $_POST["end_time"];

            $sql = "INSERT INTO tbl_program (programName, programLocation, description, instructorID, scheduleDate, start_time, end_time) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssiiss", $programName, $programLocation, $description, $instructorID, $scheduleDate, $start_time, $end_time);
            $stmt->execute();
            $stmt->close();

            header("Location: admin-createProgram.php");
            exit();
        }
    }
}
?>
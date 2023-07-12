<?php
include 'db_connect.php';
$eventId = $_GET['event_id'];
// Fetch event details from the database based on the event ID
$stmt = $conn->prepare("SELECT * FROM tbl_schedule WHERE scheduleID = ?");
$stmt->bind_param("i", $eventId);
$stmt->execute();
$result = $stmt->get_result();
$eventDetails = $result->fetch_assoc();

// Fetch instructor name based on instructor ID
$stmt = $conn->prepare("SELECT instructorName FROM instructor WHERE id = ?");
$stmt->bind_param("i", $eventDetails['instructorID']);
$stmt->execute();
$result = $stmt->get_result();
$instructor = $result->fetch_assoc();

// Add the instructor name to the event details array
$eventDetails['instructorName'] = $instructor['instructorName'];

// Close the prepared statements
$stmt->close();

// Send the event details as a JSON response
header('Content-Type: application/json');
echo json_encode($eventDetails, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
?>

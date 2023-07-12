<?php
include 'db_connect.php';

// Retrieve the section ID from the URL parameter
$sectionID = $_GET['section_id'];

// Perform your database query
$stmt = $conn->prepare("SELECT sectionName FROM tbl_sections WHERE sectionID = ?");
$stmt->bind_param("i", $sectionID);
$stmt->execute();
$result = $stmt->get_result();

// Check if a row is found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $sectionName = $row['sectionName'];

    // Output the section name as JSON without quotation marks
    echo $sectionName;
} else {
    // Section not found
    // Handle the case when the section ID is not valid or the section doesn't exist
    // You can return an error message or appropriate response here
    echo json_encode(['error' => 'Section not found']);
}

$stmt->close();
$conn->close();
?>

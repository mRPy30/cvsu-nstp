<?php
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected semester ID from the form
    $yearID = $_POST["yearID"];

    // Update the isDefault column for all semesters to 0 (false)
    $sql = "UPDATE tbl_semester SET isDefault = 0";
    $conn->query($sql);

    // Update the isDefault column for the selected semester to 1 (true)
    $sql = "UPDATE tbl_year SET isDefault = 1 WHERE yearID = $yearID";
    $conn->query($sql);

    // Redirect back to the page displaying the table
    header("Location: recordsYear.php");
    exit();
}
?>
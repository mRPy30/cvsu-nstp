<?php
include 'db_connect.php';

// Code for deleting a semester
if (isset($_POST['yearID']) && isset($_POST['deleteYear'])) {
    // Delete existing expense
    $yearID = $_POST['yearID'];

    // Delete the expense from the database
    $deleteQuery = "DELETE FROM tbl_year WHERE yearID = '$yearID'";
    $conn->query($deleteQuery);

    // Redirect back to the page to refresh the expense table
    header('Location: admin-records_Year.php');
    exit();

}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["yearID"]) && isset($_POST["yearName"])) {
    $yearID = $_POST["yearID"];
    $yearName = $_POST["yearName"];
    
    // Perform your database update logic here
    $sql = "UPDATE tbl_year SET yearName = ? WHERE yearID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $yearName, $yearID);
    $stmt->execute();
    $stmt->close();
    
    // Redirect back to the same page after editing a semester
    header("Location: admin-records_Year.php");
    exit();
}
// Code for adding a semester
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["yearName"])) {
    $yearName = $_POST["yearName"];
    
    // Perform your database insertion logic here
    $sql = "INSERT INTO tbl_year (yearName, isDefault) VALUES (?, NULL)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $yearName);
    $stmt->execute();
    $stmt->close();
    
    // Redirect back to the same page after adding a semester
    header("Location: admin-records_Year.php");
    exit();
}
?>

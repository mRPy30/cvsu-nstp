<?php
// Include your database connection code here, e.g., db_connect.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $studentID = $_POST['studentID'];
    $contact = $_POST['number']; // Assuming 'number' is the name attribute for contact number field.
    $courseID = $_POST['course']; // You should modify this to retrieve the actual course ID.
    $sectionID = $_POST['section']; // You should modify this to retrieve the actual section ID.
    $programID = $_POST['programID'];

    // Establish a database connection (assuming you have db_connect.php)
    include 'db_connect.php';

    // Prepare and execute the SQL INSERT query
    $insertQuery = "INSERT INTO tbl_volunteers (name, email, studentID, contact, courseID, sectionID, programID) 
                    VALUES ('$name','$email', '$studentID', '$contact', '$courseID', '$sectionID' , '$programID ')";

 
        
    if ($conn->query($insertQuery) === TRUE) {
        echo "Volunteer registration successful!";
        // You can redirect the user to a success page or perform other actions here.
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
        // Handle the error as needed, e.g., display an error message to the user.
    }

    // Close the database connection
    $conn->close();
}
?>
<?php
include 'db_connect.php';

session_start();

// Check if the selected course ID is stored in the session
if (isset($_SESSION['selectedCourseID'])) {
    $selectedCourseID = $_SESSION['selectedCourseID'];
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the delete button is clicked
  

    if (isset($_POST['instructorID']) && isset($_POST['deleteInstructor'])) {
        // Delete existing expense
        $instructorID = $_POST['instructorID'];

        // Delete the expense from the database
        $deleteQuery = "DELETE FROM instructor WHERE id = '$instructorID'";
        $conn->query($deleteQuery);
    
        // Redirect back to the page to refresh the instructor list
        header('Location: admin-records_InstructorList.php');
        exit();
        
    } elseif (isset($_POST['updateInstructor'])) {
        // Retrieve form data
        $instructorID = $_POST['instructorID'];
        $instructorName = $_POST['instructorName'];
        $sectionName = $_POST['sectionName'];
        $password = $_POST['password'];

        // Construct the update query
        $query = "UPDATE instructor SET
                    instructorName = '$instructorName',
                    sectionID = (SELECT sectionID FROM tbl_sections WHERE sectionName = '$sectionName'),
                    password = '$password'
                WHERE id = '$instructorID'";

        // Execute the update query
        if (mysqli_query($conn, $query)) {
            header("Location: admin-records_InstructorList.php");
        } else {
            // Update failed
            echo "Error updating instructor details: " . mysqli_error($conn);
        }
    } elseif (isset($_POST['instructorID']) && isset($_POST['instructorName']) && isset($_POST['sectionName']) && isset($_FILES['instructorImage']) && isset($_POST['password'])) {
        // Handle the form submission for adding a new instructor
        $instructorID = $_POST['instructorID'];
        $instructorName = $_POST['instructorName'];
        $sectionName = $_POST['sectionName'];
        $instructorImage = $_FILES['instructorImage']['name'];
        $instructorImageTmp = $_FILES['instructorImage']['tmp_name'];
        $password = $_POST['password'];

        // Move uploaded image to a designated folder
        $uploadDirectory = 'C:/xampp/htdocs/nstp_website/assets/instructor_images/';
        $targetFilePath = $uploadDirectory . basename($instructorImage);
        move_uploaded_file($instructorImageTmp, $targetFilePath);

        // Get the course ID from the selectedCourseID
        $selectedCourseID = $_SESSION['selectedCourseID'];

        $insertQuery = "INSERT INTO instructor (instructorImage, id, instructorName, sectionID, courseID, password) VALUES ('$instructorImage', '$instructorID', '$instructorName', (SELECT sectionID FROM tbl_sections WHERE sectionName = '$sectionName'), '$selectedCourseID', '$password')";
        if ($conn->query($insertQuery)) {
            // Set a success message in the session
            $_SESSION['instructorAdded'] = true;
            // Close the form by redirecting to the same page
            header('Location: admin-records_recordsInstructorList.php');
            exit();
        } else {
            // Set an error message in the session if insertion fails
            $_SESSION['instructorAdded'] = false;
        }
    }
}
?>
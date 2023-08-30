<?php
// ... Your existing PHP code ...

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the total scores from the form
    $instructorRating = $_POST['instructor_rating'];
    $courseRating = $_POST['course_rating'];
    $comments = $_POST['comments'];

    // Insert the values into the database
    $insertQuery = "INSERT INTO feedbacks (studentID, sectionID, courseID, instructorID, instructorRating, courseRating, comments)
                    VALUES ('$studentID', '$sectionID', '$courseID', '$instructorID', '$instructorRating', '$courseRating', '$comments')";
    
    // Execute the insert query
    // ...
}
?>
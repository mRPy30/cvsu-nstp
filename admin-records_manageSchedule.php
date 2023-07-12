<?php
include 'db_connect.php';

session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the delete button is clicked
    if (isset($_POST['schedule_id']) && isset($_POST['deleteSchedule'])) {
        // Delete existing schedule
        $scheduleID = $_POST['schedule_id'];

        // Delete the schedule from the database
        $deleteQuery = "DELETE FROM tbl_schedule WHERE scheduleID = '$scheduleID'";
        $conn->query($deleteQuery);

        // Redirect back to the page or display a success message
        header('Location: schedule.php');
        exit();
    } elseif (isset($_POST['updateSchedule'])) {
        // Retrieve form data
        $scheduleID = $_POST['schedule_id'];

        // Retrieve event details from the array
        $eventDetails = $_POST['event_details'];

        // Retrieve additional form data
        $title = $eventDetails['title'];
        $scheduleType = $eventDetails['schedule_type'];
        $instructorID = $eventDetails['instructor_id'];
        $sectionID = $eventDetails['section_id'];
        $description = $eventDetails['description'];
        $location = $eventDetails['location'];
        $dow = $_POST['dow'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $timeFrom = $eventDetails['time_from'];
        $timeTo = $eventDetails['time_to'];

        // Construct the update query
        $query = "UPDATE tbl_schedule SET
                    title = '$title',
                    scheduleType = $scheduleType,
                    instructorID = '$instructorID',
                    sectionID = '$sectionID',
                    description = '$description',
                    location = '$location',
                    dow = '$dow',
                    schedule_date = '$start_date',
                    time_from = '$timeFrom',
                    time_to = '$timeTo'
                WHERE scheduleID = '$scheduleID'";

        // Execute the update query
        if (mysqli_query($conn, $query)) {
            // Redirect back to the page or display a success message
            header("Location: schedule.php");
            exit();
        } else {
            // Update failed
            echo "Error updating schedule details: " . mysqli_error($conn);
        }
    } elseif (isset($_POST['title']) && isset($_POST['schedule_type']) && isset($_POST['instructor_id']) && isset($_POST['description']) && isset($_POST['location']) && isset($_POST['time_from']) && isset($_POST['time_to'])) {
        // Handle the form submission for adding a new schedule
        $title = $_POST['title'];
        $scheduleType = $_POST['schedule_type'];
        $instructorID = $_POST['instructor_id'];
        $sectionID = $_POST['section_id'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        $dow = $_POST['dow'];
        $schedule_date = $_POST['schedule_date'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $timeFrom = $_POST['time_from'];
        $timeTo = $_POST['time_to'];
    
        $insertQuery = "INSERT INTO `tbl_schedule`( `instructorID`, `sectionID`, `scheduleType`, `title`, `description`, `location`, `dow`, `start_date`, `end_date`, `schedule_date`, `time_from`, `time_to`) 
                VALUES ('$instructorID', '$sectionID', $scheduleType, '$title', '$description', '$location', '$dow', '$start_date', '$end_date', '$schedule_date', '$timeFrom', '$timeTo')";

        // Execute the insert query
        if (mysqli_query($conn, $insertQuery)) {
            // Redirect back to the page or display a success message
            header("Location: schedule.php");
            exit();
        } else {
            // Insertion failed
            echo "Error adding new schedule: " . mysqli_error($conn);
        }
    }
}
?>    

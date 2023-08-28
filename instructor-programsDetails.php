<?php



session_start();
include 'db_connect.php';

// Check if the programID is set in the URL
if (isset($_GET['programID'])) {
    // Get the programID value from the URL
    $selectedProgramID = $_GET['programID'];

    // Store the selected program ID in a session variable
    $_SESSION['selectedProgramID'] = $selectedProgramID;

    // Prepare and execute the query to fetch the program name based on program ID
    $programQuery = "SELECT programName FROM tbl_program WHERE programID = $selectedProgramID";
    $result = $conn->query($programQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch the row
        $programName = $row['programName']; // Store the program name in a variable
    } else {
        $programName = "Program Not Found"; // Default value if program name is not found
    }
  

}



// Active Sidebar Page

$directoryURI = $_SERVER['REQUEST_URI'];

$path = parse_url($directoryURI, PHP_URL_PATH);

$components = explode('/', $path);

$page = $components[2];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----------TITLE------------>
    <link rel="shortcut icon" href="logo.png" type="">
    <title>
        <?php echo "Instructor Page"; ?>
    </title>

    <!----------CSS------------>
    <link rel="stylesheet" href="style_instructors.css">

    <!----------BOOTSTRAP------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!----------FONTS------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abel&family=Inter:wght@400;800&family=Poppins:wght@400;500&display=swap"
        rel="stylesheet">

    <!----------ICONS------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>

    <!----------ALERTS-------------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!---Inner topbar--->
    <?php include('topbar.php'); ?>

</head>

<!----Body----->

<body>
    <section class="bg-section">
        <!---------Sidebar------------>
        <?php include('sidebar-instructor.php'); ?>

        <!---------End Sidebar--------->

        <!--Main Content-->
        <main class="pcoded-main-content">
          <div class="container pt-4">
            <div class="col-lg-12">
            <div class="centered">
                
                <div class="student_prog">
                    <h1>NSTP PROGRAMS /  <?php  echo $programName; ?> </h1>
                </div>
            </div>
        </div>

        <?php

                include 'db_connect.php';

                // Check if the selected program ID is set in the session
                if (isset($_SESSION['selectedProgramID'])) {
                    // Retrieve the selected program ID from the session
                    $selectedProgramID = $_SESSION['selectedProgramID'];

                    // Prepare and execute the query to fetch program details based on program ID
                    $query = "SELECT * FROM tbl_program WHERE programID = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $selectedProgramID);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        // Display program details using fetched data
                        echo '<div class="feed">';
                        echo '<div class="inner_feed">';
                        echo '<h1>' . $row["programName"] . '</h1>';
                        echo '</div>';

                        echo '<div class="inner_feed-2">';
                        echo '<h1>' . $row["description"] . '</h1>';
                        echo '</div>';

                        // Fetch instructor's name based on instructor ID
                        $instructorID = $row["instructorID"];
                        $instructorQuery = "SELECT instructorName FROM instructor WHERE id = $instructorID";
                        $resultInstructor = $conn->query($instructorQuery);

                        if ($resultInstructor) {
                            $instructorRow = $resultInstructor->fetch_assoc();
                            $instructorName = $instructorRow["instructorName"];
                        } else {
                            // Handle the case when the query fails
                            $instructorName = "Unknown Instructor";
                        }

                        echo '<div class="inner_feed-3">';
                        echo '<h1>' . $instructorName . '</h1>';
                        echo '<p>Assigned Instructor</p>';
                        echo '<img src="instructors_folder/Aton.jpg" class="rounded-img" alt="">';
                        echo '</div>';

                        echo '<div class="inner_feed-4">';
                        echo '<h1>' . $row["start_time"] . ' - ' . $row["end_time"] . '</h1>';
                        echo '<p>Time</p>';
                        echo '<i class="fa-regular fa-clock"></i>';
                        echo '</div>';

                        echo '<div class="inner_feed-5">';
                        echo '<h1>' . $row["programLocation"] . '</h1>';
                        echo '<p>Location</p>';
                        echo '<i class="fa-solid fa-location-dot"></i>';
                        echo '<button type="submit" class="btn btn-primary">+ VOLUNTEER NOW</button>';
                        echo '</div>';

                        echo '</div>'; // Close the feed div
                    } else {
                        echo "Program details not found.";
                    }

                    $stmt->close();
                    $conn->close();
                } else {
                    echo "No program selected.";
                }
                ?>
          </div>       
        </main>     
    </section>
            <!-----End Main content------>
             <!-----End of Body------>
</body>
</html>
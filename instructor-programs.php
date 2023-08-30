<?php

session_start();

include 'db_connect.php';

$instructorID = $_SESSION['id'];





// Prepare and execute the query
$query = "SELECT * FROM tbl_program WHERE instructorID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $instructorID);
$stmt->execute();
$result = $stmt->get_result();


















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
    <link rel="short icon" href="logo-shortcut-icon.png" type="">
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
                    <div class="student_prog2">
                            <p>NSTP PROGRAMS</p>
                        </div>

                     
                            <?php         
                                    // Fetch programs and display them
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<div class="feeds">';
                                            echo '<a href="instructor-programsDetails.php?programID=' . $row["programID"] . '">';
                                            echo '<div class="inner_feeds">';
                                            echo '<h1>' . $row["programName"] . '</h1>';
                                            echo '<i class="fa-regular fa-clock"></i>';
                                            echo '<p>' . $row["start_time"] . ' - ' . $row["end_time"] . '</p>';
                                            echo '</div>';
                                            echo '</a>';
                                          

                                // Fetch instructor's name based on instructor ID
                                $instructorID = $row["instructorID"]; // Assuming this is the instructor ID in the tbl_program table

                                $instructorQuery = "SELECT instructorName FROM instructor WHERE id = $instructorID";
                                $resultInstructor = $conn->query($instructorQuery);
                                
                                if ($resultInstructor) {
                                    $instructorRow = $resultInstructor->fetch_assoc();
                                    $instructorName = $instructorRow["instructorName"];
                                } else {
                                    // Handle the case when the query fails
                                    $instructorName = "Unknown Instructor";
                                }

                                
                                    echo '<div class="inner_feeds-2">';
                                    echo '<i class="fa-regular fa-user"></i>';
                                    echo '<p>' . $instructorRow["instructorName"] . '</p>'; // Display instructor's name
                                    echo '</div>';

                                    echo '<div class="inner_feeds-3">';
                                    echo '<i class="fa-solid fa-location-dot"></i>';
                                    echo '<p>' . $row["programLocation"] . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    }
                                    } else {
                                    echo "No programs found.";
                                    }

                                  
                                    $stmt->close();
                                    $conn->close();

                                   
                                    ?>
                       

            </div>
          </div>
        </main>     

    <!-----End Main content------>        
    </section>

    
<!-----End of Body------>
</body>
</html>
<?php

include 'db_connect.php';


// Start the session
session_start();

// Include the necessary files
include 'db_connect.php';

// Fetch courses from the database
$sql = 'SELECT courseID, courseName FROM tbl_course';
$result = $conn->query($sql);

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
    <title><?php echo "Coordinator Page"; ?></title>

     <!----------CSS------------>
    <link rel="stylesheet" href="style_admin.css">
          <!----------BOOTSTRAP------------>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     
     <!----------FONTS------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Inter:wght@400;800&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <!----------ICONS------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>
    <!----------ALERTS-------------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!---Inner topbar--->
<?php include('topbar.php');?>

</head>

<!----Body----->
<body>
<!----Body----->
<body>
<section class="bg-section">
   <!---------Sidebar------------>
        <?php include('sidebar-admin.php');?>

        <!--Main Content-->
        <main class="pcoded-main-content">
            <div class="container">
                <div class="col-lg-12">
                    <div class="rec-content">
                        <div class="upperbox">
                            <h4>TRAINING PROGRAMS</h4>
                            <a href="admin-external.php" class="go-back-button"><ion-icon name="arrow-back-circle-outline"></ion-icon></a>
                        </div>

                        <div class="middlebox-class">
                            <?php
                            // Check if there are any courses
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $courseID = $row['courseID'];
                                    $courseName = $row['courseName'];
                                    $encodedCourseName = urlencode($courseName);

                                    echo "<a href='admin-external-list.php?courseID=$courseID&courseName=$encodedCourseName'>";
                                    echo "<div class='course-box'>";
                                    echo "<p>$courseName</p>";
                                    echo "</div>";
                                    echo "</a>";
                                }
                            } else {
                                echo "No courses found.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
                    <!-----End Main content------>        
        
<!-----End of Body------>
</section>
</body>
</html>    
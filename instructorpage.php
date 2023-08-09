<?php
//connection
include 'db_connect.php';

session_start();
$accountID = $_SESSION['id'];


// query for the instructor handled course
$query = "SELECT tbl_course.courseName FROM instructor
                LEFT JOIN tbl_course ON instructor.courseID = tbl_course.courseID
                WHERE instructor.id = '$accountID'";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $instructorCourse = $row['courseName'];
} else {
    // Handle the case if the instructor is not found
    $instructorCourse = "Unknown";
}


// query for the name of the instructor
$query = "SELECT instructorName FROM instructor WHERE id = '$accountID'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $instructorName = $row['instructorName'];
} else {
    // Handle the case if the instructor is not found
    $instructorName = "Unknown";
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
    <title><?php echo "Instructor Page"; ?></title>

     <!----------CSS------------>
    <link rel="stylesheet" href="style_instructors.css">

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
    <section class="bg-section">
        <!---------Sidebar------------>
        <?php include('sidebar-instructor.php');?>
         
        <!---------End Sidebar--------->

        <!--Main Content-->
        <main class="pcoded-main-content">
            <div class="pt-4 ">
                <div class="col-lg-12">
                <div class="instructor_prof">
                        <h1><?php echo "$instructorCourse" ?></h1>
                        <p>Instructor Name:  <?php echo " $instructorName" ?>
                        <div class="profile_img">
                            <img src="INSTRUCTORS & coor/Abayari.jpg">
                        </div>
                    </div>
                </div>
            <!-----2 BOX------->
               <div class="col">
                    <div class="box">
                        <div class="content-box first">
                            <h4>2022 - 2023</h4>
                            <span>ACADEMIC YEAR</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="box">
                        <div class="content-box second">
                            <h4>SECOND</h4>
                            <span>SEMESTER</span>
                        </div>
                    </div>
                    <div class="calendar_section">
                        <?php include('calendar.php');?>
                        </div>
                </div>
                
            </div>

        </main>
        
        <!-----End Main content------>
    </section>
    <!-----End of Body------>
</body>
</html>
<?php
    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "login_system");

    // Count query for student
    $query = "SELECT COUNT(id) AS total_students FROM student";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $totalStudents = $row['total_students'];
    
    // Count query for COURSE
    $query = "SELECT COUNT(courseID) AS total_courses FROM tbl_course";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $totalCourse = $row['total_courses'];
   
    $query = "SELECT COUNT(id) AS total_instructors FROM instructor";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $totalInstructors = $row['total_instructors'];
   


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----------TITLE------------>
    <link rel="shortcut icon" href="logo.png" type="">
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
<section class="bg-section">
   <!---------Sidebar------------>
        <?php include('sidebar-admin.php');?>

        <!--Main Content-->
        <main class="pcoded-main-content">
            <div class="container pt-4">
                <div class="col-lg-12">
                    <div class="total-result">
                        <div class='total_stud_box'>
                        <h1><i class="fa-solid fa-graduation-cap"></i><?php echo $totalStudents; ?></h1>
                            <p>Total NSTP Students</p>
                        </div>

                        <div class='total_stud_box'>
                            <h1><i class="fa-solid fa-book"></i><?php echo $totalCourse; ?></h1>
                            <p>NSTP Program Courses</p>
                        </div>

                        <div class='total_stud_box'>
                            <h1><i class="fa-solid fa-chalkboard-user"></i><?php echo $totalInstructors; ?></h1>
                            <p>Instructors</p>
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
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
            <div class="container">
                <div class="col-lg-12">
                        <div class="rec-content">
                            <!-- Add your main content here -->
                            <div class="upperbox">
                                <h4> RECORDS </h4>
                            </div>
                            
                            <div class="middlebox">
                                <div class="records_box" id="classes_box">
                                    <h3><i class="fa-solid fa-users"></i> Classes Records</h3>
                                </div>

                                <div class="records_box" id="students_box">
                                    <h3><i class="fa-solid fa-graduation-cap"></i> Student Records</h3>
                                </div> 

                                <div class="records_box" id="financial_box">
                                    <h3><ion-icon name="wallet"></ion-icon> Financial Records</h3>
                                </div>

                                <div class="records_box" id="courses_box">
                                    <h3><i class="fa-solid fa-file-lines"></i> Courses Records</h3>
                                </div>
                                
                                <div class="records_box" id="instructor_box">
                                    <h3><i class="fa-solid fa-book-open-reader"></i> Instructor Records</h3>
                                </div> 

                                <div class="records_box" id="year_box">
                                    <h3><i class="fa-solid fa-calendar-check"></i> School-Year Records</h3>
                                </div>

                                <div class="records_box" id="senm_box">
                                    <h3><i class="fa-regular fa-calendar"></i> Semester Records</h3>
                                </div>  
                            </div>
                        </div>
                </div>
            </div>
        </main>
     <!-----End Main content------>        
        
<!-----End of Body------>
</section>
  <script>
        document.getElementById('courses_box').addEventListener('click', function() {
            window.location.href = 'admin-records_Courses.php';
        });
        
        document.getElementById('classes_box').addEventListener('click', function() {
            window.location.href = 'admin-records_Classes.php';
        });

        document.getElementById('students_box').addEventListener('click', function() {
            window.location.href = 'admin-records_Student.php';
        });

        document.getElementById('instructor_box').addEventListener('click', function() {
            window.location.href = 'admin-records_Instructor.php';
        });

        document.getElementById('financial_box').addEventListener('click', function() {
            window.location.href = 'admin-records_Finances.php';
        });

        document.getElementById('year_box').addEventListener('click', function() {
            window.location.href = 'admin-records_Year.php';
        });

        document.getElementById('sem_box').addEventListener('click', function() {
            window.location.href = 'admin-records_Semester.php';
        });









        



    </script>
</body>
</html>    
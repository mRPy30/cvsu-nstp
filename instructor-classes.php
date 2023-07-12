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
    <link rel="stylesheet" href="style_instructor.css">

     <!----------BOOTSTRAP------------>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     
     <!----------FONTS------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Inter:wght@400;800&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <!----------ICONS------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>

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
    <div class="container pt-4">
            <div class="col-lg-12">
                <div class="box-classes">
                        <div class="box-classes_left">
                            <i class="fa-solid fa-user"></i>
                            <h5>Mark B. Villar</h5>
                        </div>
                        <div class="box-classes_right">
                            <h2>80</h2>
                            <p>STUDENTS</p>
                        </div>
                </div>
                <div class="class_info">
                    <h3>Subject Code: 1</h3>
                    <p>UNIT 2.00</p>
                </div>

                <a href="instructor-classes_section.php">
                <div class="section_box">
                    <h4>BSIT 1-C</h4>
                    <div class="sec_box_inner">
                        <h5>40</h5>
                        <p>Number of students</p>
                        <h5>7:00 - 9:00</h5>
                        <p>Schedule</p>
                     </div>
                </div>
                </a>

                
                         
            </div>
        </div>
    </div>
</main>

        <!-----End Main content------>
    </section>
    <!-----End of Body------>
</body>

</html>
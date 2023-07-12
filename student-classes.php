<?php
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
    <title><?php echo "Student Page"; ?></title>

     <!----------CSS------------>
    <link rel="stylesheet" href="style_students.css">

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


     <!---Inner topbar--->
     <?php include('topbar.php');?>
</head>
<!----Body----->
<body>

   <!---------Sidebar------------>
   

   <section class="bg-section">
   <?php include('sidebar-student.php');?>
    <!---------End Sidebar--------->


        <!--Main Content-->

                             <!--Main Content codeeeee-->

        <main class="pcoded-main-content">
            <div class="container pt-4 ">
                <div class="col-lg-12">  
                    <div class="welcome"> 
                        <p>Welcome to your NSTP-1 class</p>
                    </div> 
                        <div class="instructorbox">
                            <div class="row">
                                <a href="student-classes-instructor.php" class="clickable-link"> 
                                <div class="col-sm-3">
                                    <div class="box1 instructor"> 
                                        <img src="icon_folder/instructor.jpg"> 
                                            <span class="black-letter">Instructor </span> </a>
                                    </div>
                                </div>
                             <div class="col-sm-3"> 
                                <div class="box1 coursematerials"> 
                                    <img src="icon_folder/coursematerials.png">
                                <a href="student-classes-course-materials.php">
                                    <span class="black-letter">  Course Materials </span> </a>
                             </div>
                             </div>
                             <div class="col-sm-3"> 
                                <div class="box1 schedule"> 
                                    <img src="icon_folder/schedule.png">
                                <a href="student-classes-schedule.php"> 
                                    <span class="black-letter"> Schedule </span> 
                                </a>
                            </div>
                             </div>
                             <div class="col-sm-3"> 
                                <div class="box1 classlist"> 
                                    <img src="icon_folder/classlist.png">
                                <a href="student-classes-classlist.php"> 
                                    <span class="black-letter"> Class List </span> 
                                </a>
                            </div>
                             </div> 
                             
                             <div class="col-sm-12">
                                <div class="description"> 
                                    <p>National Service Training Program 1</p>
                                    <img src="pic1.png">
                                </div>
                                <div class="descriptionbox">
                                
                                    <div class="maindescription"> 
                                        <p>The course mandated by Republic Act No. 9163, otherwise known as 
                                        the National Service Training Act of 2001, aims to enhance the civic consciousness of the students 
                                        “by developing the ethics of service and patriotism” while undergoing Civic Welfare Training Service (CWTS). 
                                        NSTP1 covers topics through big sessions in campus that will tap on the students’ enthusiasm and idealism for 
                                        nation-building, leadership and civic involvement. Combining active reflection in a creative dynamic learning 
                                        environment, it prepares the students into actual community service in NSTP 2. 
                                    
                                    </p>
                                    </div>
                                </div>
                             </div>
                    </div>
                </div>
        </main>     

    <!-----End Main content------>        
    </section>

    
<!-----End of Body------>
</body>
</html>
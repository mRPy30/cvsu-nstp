<?php
//connection
include 'db_connect.php';

session_start();
$accountID = $_SESSION['id'];


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

        <main class="pcoded-main-content">
            <div class="container pt-4 ">
                <div class="col-lg-12">
                    <!------LAYER 1----->
                    <div class="layer_1">  
                            <div class="nstp">
                                <h1>NSTP 1</h1>
                                <p>Civil Welfare Training Service
                                <i class="fa-solid fa-chevron-right"></i></p>
                            </div>
                            <div class="statusbox"> 
                                <div class="status">
                                    <h1>Enrolled</h1>
                                    <ion-icon name="checkmark-circle-outline"></ion-icon>
                                    <p>Status</p>
                                </div>
                                 <div class="courseandsection">
                                    <h1>BSIT1-C</h1>
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    <p>Course and Section</p>
                                </div>
                            </div>
                    </div>
                            <!------LAYER 2----->
                            <div class="box">
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
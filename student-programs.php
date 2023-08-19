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
    <link rel="stylesheet" href="style_student.css">

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
<br>

<main class="pcoded-main-content">
            <div class="container pt-4 ">
            <div class="col-lg-12">
    <div class="centered">
    
        <div class="student_prog2">
            <h1>NSTP PROGRAMS</h1>
        </div>

    </div>
</div>

<div class="feeds">
<a href="student-programsDetails.php">
    <div class="inner_feeds">
        <h1>FEEDING PROGRAM</h1>
        <i class="fa-regular fa-clock"></i>
        <p>7AM - 12PM</p>
    </div>
    </a>

    <div class="inner_feeds-2">
        <i class="fa-regular fa-user"></i>
        <p>Armand G. Aton</p>
    </div>

    <div class="inner_feeds-3">
        <i class="fa-solid fa-location-dot"></i>
        <p>Brgy. Buhay na Tubig</p>
    </div>
</div>

<div class="feeds-3">
    <div class="inner_feeds-4">
        <h1>CLEAN UP DRIVE</h1>
        <i class="fa-regular fa-clock"></i>
        <p>7AM - 12PM</p>
    </div>

    <div class="inner_feeds-5">
        <i class="fa-regular fa-user"></i>
        <p>Armand G. Aton</p>
    </div>

    <div class="inner_feeds-6">
        <i class="fa-solid fa-location-dot"></i>
        <p>Brgy. Buhay na Tubig</p>
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
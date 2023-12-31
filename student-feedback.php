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
    <link rel="short icon" href="logo-shortcut-icon.png" type="">
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
                             <div class="feedbackandevaluation"> <p> FEEDBACK AND EVALUATION </p> </div>

                             <div class="row" > 
                             <div class="col-sm-12" > 
                                <div class="feedback-box"> 
                                <div class="instructions"> <p> Welcome to feedback and evaluation in this page students are able to give an evalution  
                                for your NSTP course and your corresponding instructor. <br> 
                                <br>
                                Here are the Guidelines for evaluation: <br>
                                 •  Only officially enrolled student can evaluate; <br>
                                 •  Select your NSTP program and your instructor <br>
                                 •  Evaluate the faculty member based on the given indicator (5 is the highest and 1 is the lowest); <br>
                                 •  Evaluate the effectivity of the course based on the given indicator  (5 is the highest and 1 is the lowest); <br> 
                                 •  Submit your evaluaiton after double checking your answers
                                <br> 
                                <br>
                                <b>Thank you for helping us make NSTP Program better! </b> </p> </div>

                             </div>   
                              
                             <div class="row" > 
                             <div class="col-sm-4" ></div>
                             <div class="col-sm-4"> 
                                <div class="evaluatebox"><a href="student-feedbackEvaluation.php"> <b> <span class="black-letter"> EVALUATE NOW </span> </b> </a> </div>
                             </div>
                             <div class="col-sm-4" ></div>
                             </div>
                                             
                             </div>
                             </div>
                             </div>      
                             </main>
</section>
</body>
</html>
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
    <title><?php echo "Instructor Page"; ?></title>

     <!----------CSS------------>
    <link rel="stylesheet" href="style_student.css">

     <!----------BOOTSTRAP------------>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     
     <!----------FONTS------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Inter:wght@400;800&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <!----------ICONS------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>


     
<!---Inner topbar--->
<header class=" flex-column flex-md-row bd-navbar sticky-top header-section navbar-expand  ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 logo ">
                   <img src="logo.png" alt="">
                    <div class=" p1">
                        <p class="font-weight-normal">CVSU-IMUS CAMPUS</p>
                    </div>
                    <div class="p2">
                        <p>NSTP PROGRAM</p>
                    </div>
                    <div class="w-100 logout">
                        <button type="button" class="btn btn-light rounded btn-logout float-left " a href="logout.php"><i
                                class="fa-solid fa-arrow-right-from-bracket"></i> LOGOUT </button>
                    </div>
                </div>
            </div>
    </header>
    <style type="text/css">
                            
                            .status { 
                            position: relative;
                            border: 1px black solid;
                            width: 365px;
                            height: 93px;
                            margin: 10px;
                            background-color: #FFFFFF;
                            border-radius: 10px;
                            text-align: bottom; 
                            
                            
                            }

                            .courseandsection {
                            position: relative;
                            border: 1px black solid;
                            width: 365px;
                            height: 93px;
                            margin: 10px;
                            background-color: #FFFFFF;
                            border-radius: 10px;
                            }

                            .bottom-left {
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            padding: 1px;
                            margin: 10px;
                            }

                            .feedbackandevaluation {
                            position: absolute;
                            margin: 10px;
                            left: 30px;
                            font-size: 30px;
                            border-bottom: 1px black solid;
                            display: flex;
                            flex-direction: column;
                            width: 1015px;
                            height: 60px;
                            }

                            .feedback-box {
                            position: relative;
                            width: 1015px;
                            height: 530px;
                            margin: 15px;
                            border-radius: 10px;
                            display: flex;
                            align-items: justify ;
                            justify-content: justify;
                            top: 50px;
                            font-size: 20px;
                            font-family: arial, sans-serif;
                            padding: 25px;
                            left: 0;
                            }
                            
                            .instructions {
                            text-align: justify;
                            align-items: justify ;
                            justify-content: justify;
                            top: 40px;
                            font-size: 15px;
                            font-family: arial, sans-serif;
                            padding: 5px;

                            }

                            .evaluatebox {
                            position: absolute;
                            border: 1px black solid;
                            width: 280px;
                            height: 60px;
                            margin: 10px;
                            background-color: #6FBB76;
                            border-radius: 5px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 14px;
                            bottom: 0;
                            top: -170px;
                            }

                            .evaluatebox  a {
                                text-decoration: none;
                            } 

                            .black-letter {
                                color: black;
                            }

                            
                           

                        </style>





</head>

<!----Body----->
<body>

   <!---------Sidebar------------>
   
   <section class="bg-section">
   <nav class="sidebar navbar-collapsed" >
            <div class="navbar-wrapper">
                    <div class="navbar-nav">
                       <ul class="nav pcoded-inner-navbar">
                        <li><a class="nav-link active" aria-current="page" href="studentpage.php"><i class="fa-sharp fa-solid fa-house"></i> Home </a></li>
                        <li><a class="nav-link" href="student-classes.php"><i class="fa-solid fa-book"></i> Classes </a></li>
                        <li><a class="nav-link" href="student-programs.php"><i class="fa-solid fa-people-group"></i> Programs </a></li>
                        <li><a class="nav-link" href="student-feedback.php"><i class="fa-solid fa-comment"></i> Feedback </a></li>
                       </ul>
                    </div>
                </div>
            </nav>
        </div>    
    <!---------End Sidebar--------->
        

        <!--Main Content-->
        

                             <!--Main Content codeeeee-->


                             <div class="container">
                             
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
                                <div class="evaluatebox"><a href="student-feedback-page.php"> <b> <span class="black-letter"> EVALUATE NOW </span> </b> </a> </div>
                             </div>
                             <div class="col-sm-4" ></div>
                             </div>
                                             
                             </div>
                             </div>
                             </div>
                        



                            
                                         

                      
                          
                       
                      

                           
                            
                        </div>
                    </div>
                </div>
            </div>      

    <!-----End Main content------>        
    </section>

    
<!-----End of Body------>
</body>
</html>
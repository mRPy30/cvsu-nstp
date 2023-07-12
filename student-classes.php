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
                            .container {
                                position: absolute;
                                display: flex;
                                flex-direction: row;
                        
                                padding: 10px;
                                width: 1100px;
                                height: 670px;
                                 top: 340px;
                                left: 930px;
                                transform: translate(-50%, -50%);
                                
                                
                            }  
                            
                            .nstp {
                            position: relative;
                            border: 1px black solid;
                            width: 735px;
                            height: 217px;
                            margin: 10px;
                            padding: 10px; 
                            background-color: #FFE193;
                            border-radius: 10px
                                                  

                            }

                          

                            .statusbox {
                            border: 1px black solid;
                            width: 400px;
                            height: 217px;
                            margin: 10px;
                            padding: 1px;

                            }

                            .box {
                            border: 1px black solid;
                            width: 1060px;
                            height: 400px;
                            background-color: #FFFFFF;
                            position: absolute;
                            left: 20px;
                            top: 270px;
                            border-radius: 10px;
                            
                            }

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

                            .welcome {
                            font-size: 20px;
                            font-weight: bold;
                            font-family: arial, sans-serif;
                            padding: 1px;
                          

                            }

                            .box1 {
                            position: relative;
                            border: 1px black solid;
                            width: 225px;
                            height: 90px;
                            margin: 10px;
                            background-color: #FFFFFF;
                            border-radius: 10px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                           
                            
                            

                            }

                            .instructorbox{
                            position: absolute;
                            display: flex;
                            flex-direction: column;
                            border-bottom: 1px black solid;
                            width: 1060px;
                            height: 125px;
                           
                           
                            top: 45px;
                            left: 0;
                            }

                            .description {
                            position: relative;
                            border: 1px black solid;
                            width: 1040px;
                            height: 300px;
                            margin: 10px;
                            background-color: #FFFFFF;
                            border-radius: 10px;
                            display: flex;
                            align-items: justify ;
                            justify-content: justify;
                            top: 50px;
                            font-size: 33px;
                            font-family: arial, sans-serif;
                            padding: 23px;
                            

                            }

                            .descriptionbox {
                            position: absolute;
                            display: flex;
                            flex-direction: column;
                            border: 1px black solid;
                            width: 500px;
                            height: 220px;
                            margin-left: 5px;
                            padding: 1px;
                            top: 130px;
                            left: 40px;
                            }

                            .maindescription {
                            text-align: justify;
                            align-items: justify ;
                            justify-content: justify;
                            top: 40px;
                            font-size: 15px;
                            font-family: arial, sans-serif;
                            padding: 5px;

                            }

                            .black-letter {
                            color: black;
                            }


                            .instructor img {
                                weight: 30px;
                                height: 33px;
                            }

                            .coursematerials img {
                                weight: 30px;
                                height: 30px;
                            }

                            .schedule img {
                                weight: 35px;
                                height: 35px;
                            }

                            .classlist img {
                                weight: 30px;
                                height: 30px;
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
                             
                             <div class="welcome"> <p>Welcome to your NSTP-1 class</p></div> 
                             <div class="instructorbox">
                             <div class="row">

                             <a href="student-classes-instructor.php" class="clickable-link"> 
                             <div class="col-sm-3">
                                <div class="box1 instructor"> <img src="instructor.jpg" >
                                <a href="student-classes-instructor.php"> <span class="black-letter">Instructor </span> </a>
                             </div>
                             </div>
                             <div class="col-sm-3"> 
                                <div class="box1 coursematerials"> <img src="coursematerials.png" >
                                <a href="student-classes-course-materials.php"><span class="black-letter">  Course Materials </span> </a>
                             </div>
                             </div>
                             <div class="col-sm-3"> 
                                <div class="box1 schedule"> <img src="schedule.png" >
                                <a href="student-classes-schedule.php"> <span class="black-letter"> Schedule </span> </a></div>
                             </div>
                             <div class="col-sm-3"> 
                                <div class="box1 classlist"> <img src="classlist.jpg" >
                                <a href="student-classes-classlist.php"> <span class="black-letter"> Class List </span> </a></div>
                             </div> 
                             
                             <div class="col-sm-12">
                                <div class="description"> <p>National Service Training Program 1</p></div>
                                <div class="descriptionbox">
                                <div class="maindescription"> <p>The course mandated by Republic Act No. 9163, otherwise known as 
                                    the National Service Training Act of 2001, aims to enhance the civic consciousness of the students 
                                    “by developing the ethics of service and patriotism” while undergoing Civic Welfare Training Service (CWTS). 
                                    NSTP1 covers topics through big sessions in campus that will tap on the students’ enthusiasm and idealism for 
                                    nation-building, leadership and civic involvement. Combining active reflection in a creative dynamic learning 
                                    environment, it prepares the students into actual community service in NSTP 2. </p>
                             </div>
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
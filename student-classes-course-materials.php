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
                                border: 1px solid black;
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

                            .course-materials {
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

                            .coursebox {
                            position: relative;
                            border: 1px black solid;
                            width: 1015px;
                            height: 530px;
                            margin: 15px;
                            background-color: #FFFFFF;
                            border-radius: 10px;
                            display: flex;
                            align-items: justify ;
                            justify-content: justify;
                            top: 80px;
                            font-size: 15px;
                            font-family: arial, sans-serif;
                            padding: 25px;
                            left: 15px;

                            }

                            .table-bordered {
                            border-collapse: collapse;
                            width: 100%;
                            table-layout: fixed; 
                          
                            }

                            .table-bordered th,
                            .table-bordered td {
                                padding: 20px;
                            
                                border: 2px solid black;
                            }

                            th, td, tr {
                            text-align: center;
                            height: 50px;
                        
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
                        <li><a class="nav-link" href="student-feedback.php"><i class="fa-solid fa-people-group"></i> Programs </a></li>
                        <li><a class="nav-link" href="student-programs.php"><i class="fa-solid fa-comment"></i> Feedback </a></li>
                       </ul>
                    </div>
                </div>
            </nav>
        </div>    
    <!---------End Sidebar--------->
        

        <!--Main Content-->
        

                             <!--Main Content codeeeee-->


                             <div class="container">

                             <div class="course-materials"> <p> COURSE MATERIALS </p> </div>

                             <div class="row">
                             <div class="col-sm-12"> 
                             <div class="coursebox"> 

                             <table class="table-bordered">
                                <thead>
                                    <tr>
                                  
                                    <th>TOPIC</th>
                                    <th>HANDOUT</th>
                                    <th>RECORDED MATERIAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>Introduction to NSTP 1</td>
                                    <td>Introduction.pdf</td>
                                    <td>Introduction.mp4</td>
                                    </tr>
                                    <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    </tr>
                                    <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    </tr>
                                    <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    </tr>
                                   
                                    
                                </tbody>
                                </table>
                             
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
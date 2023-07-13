<?php
    // Database connection
    include 'db_connect.php';

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
    <title><?php echo "Home"; ?></title>

     <!----------CSS------------>
    <link rel="stylesheet" href="style_home.css">

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

  
        

<header class=" flex-column flex-md-row bd-navbar fixed-top header-section  ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4 logo ">
                   <img src="logo.png" alt="">
                    <div class=" p1">
                        <p class="font-weight-normal">CVSU-IMUS CAMPUS</p>
                    </div>
                    <div class="p2">
                        <p>NSTP PROGRAM</p>
                    </div>
                    </div>
                    <div class="col-8">
                        <div class="class_navs">
                                <ul class="nav nav-underline justify-content-end">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="homepage.php">HOME</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            ABOUT
                                          </a>
                                            <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="homepage-about_MisVisQp.php">VISION AND MISSION</a></li>
                                              <li><a class="dropdown-item" href="homepage-about-nstp_program.php">NSTP PROGRAM</a></li>
                                              <li><a class="dropdown-item" href="homepage-about-instructor.php">INSTRUCTORS</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="#news">NEWS</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="homepage-contact.php">CONTACT </a>
                                    </li>
                                </ul>
                        </div>
                        <div class="logout">
                            <a href="login.php"> <button type="button" class="btn btn-light rounded btn-logout float-left ">
                           <i class="fa-solid fa-right-to-bracket"></i> LOGIN </button></a>
                        </div>
                    </div>
            </div>
    </header>
    </head>
<!-------End Topbar------->


<body>

    <div class="container">
        <div class="centered">
            <div class="CvSUWebsite">
                <h1>Welcome to Cavite State University - Imus Campus NSTP Website!</h1>
                <video autoplay loop muted src="Advertisement video Cavite State University - Imus Campus.mp4"></video>
            </div>
        </div>
    </div>

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
    <div class="container">
        <div class="centered">
            <div class="NSTP_Act">
                <h1>NSTP ACTIVITIES</h1>
            </div>
        </div>
    </div>

    <div class="nstp-activties">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Reserve Officers Training Corps</h1>
            <span>Welcoming new Cadets</span>
          <img src="rotc.jpg" class="rounded float">
            <span>International Coastal Clean-up Day</span>
          <img src="cleanupDay.jpg" class="rounded float">
            <span>Campus Training</span>
          <img src="CampusTraining.jpg" class="rounded float">
            <span>Blood Donation Program</span>
          <img src="BloodDonationProgram.jpg" class="rounded float">
        </div>

        <div class="col">
          <h1>Civic Welfare Training Service</h1>
            <span>Gardening</span>
          <img src="gardening.jpg" class="rounded float">
            <span>General Gathering</span>
          <img src="pic1.png" class="rounded float">
            <span>Field Day</span>
          <img src="pic2.png" class="rounded float">
           <span>Clean-up Drive</span>
          <img src="pic3.png" class="rounded float">
        </div>
      </div>
    </div>
</div>


<div class="text-center pt-5" id="news"><h1><strong>NEWS AND UPDATES</strong></h1></div>
  <div id="myCarousel2" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel2" data-bs-slide-to="1" aria-label="Slide 2"></button>
      
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 p-5">

          <div class="col">
            <div class="card shadow-sm">
                                                  <img src="Rectangle 218.jpg" alt="" width="100%" height="auto">
              <div class="card-body text-center">
                  <p class="card-text text-start">Academic Break
                  
                  <div class="btn-group">
                    <a href="/News/2023_June.html#Up_news100"><button type="button" class="btn btn-sm ">View</button></a>
                        
                  </div>

              </div>
            </div>
          </div> 

          <div class="col">
            <div class="card shadow-sm">
                                                  <img src="329945500_597232348599656_1009511258308726229_n.jpg" alt="" width="100%" height="auto">
              <div class="card-body text-center">
                  <p class="card-text text-start">Pursuant to Office Memorandum 07, s. 2023 released by the Office of the Vice President for Academic Affairs (OVPAA), the following guidelines will be effective Second Semester of A.Y. 2022-2023.

                  <div class="btn-group">
                    <a href="/News/2023_June.html#Up_news99"><button type="button" class="btn btn-sm ">View</button></a>
                        
                  </div>

              </div>
            </div>
          </div> 

                <div class="col">
                  <div class="card shadow-sm">
                                                  <img src="345863742_6229350883825936_3886661454847551511_n 1.jpg" alt="" width="100%" height="auto">
              <div class="card-body text-center">
                  <p class="card-text text-start">Hi! Student Evaluation for Teachers (SET) is open until May 18, 2023.

                  <div class="btn-group">
                    <a href="/News/2023_June.html#Up_news98"><button type="button" class="btn btn-sm ">View</button></a>
                        
                  </div>

              </div>
            </div>
                </div>  

          
                 
              </div>
      </div>





<div class="carousel-item">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 p-5">
      <div class="col" style="height: 100%;">
        <div class="card shadow-sm">
                                                        <img src="/Media/News/2023_June_flag_burning.jpg" alt="" width="100%" height="auto">
                    <div class="card-body text-center">
                        <p class="card-text text-start">Flag-burning ceremony, pinangunahan ng Imus LGU
                         
                        </br></br><small class="text-muted">June 11</small></p>
                        
                        <div class="btn-group">
                          <a href="/News/2023_June.html#Up_news97"><button type="button" class="btn btn-sm ">View</button></a>
                              
                        </div>

                    </div>
                  </div>
      </div>
      
      <div class="col">
        <div class="card shadow-sm">
                                                  <img src="/Media/News/2023_June_world_environment_day_philippine_environment_month.jpg" alt="" width="100%" height="auto">
              <div class="card-body text-center">
                  <p class="card-text text-start">World Environment Day at Philippine Environment Month, ipinagdiwang sa Imus

                    <br>
                  <small class="text-muted">June 5</small></p>
                  
                  <div class="btn-group">
                    <a href="/News/2023_June.html#Up_news95"><button type="button" class="btn btn-sm ">View</button></a>
                        
                  </div>

              </div>
            </div>
      </div>


      <div class="col">
        <div class="card shadow-sm">
                                                        <img src="/Media/News/2023_May_AJ_Cup_inter_cluster_volleyball_tournament.jpg" alt="" width="100%" height="auto">
                    <div class="card-body text-center">
                        <p class="card-text text-start">First Congressman AJ Cup Inter-cluster Volleyball Tournament, inumpisahan na
                    </div>
                  </div>
      </div>




 
    </div>
  </div>





      
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel2" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel2" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="footer-section footer-bg-1">

<!-- Footer Widget Area Start -->
<div class="footer-widget-area section-padding-01">
    <div class="container">
        <div class="row gy-6">

            <div class="col-lg-4">
                <!-- Footer Widget Start -->
                <div class="footer-widget text-center">
            
                    <a href="https://cvsu-imus.edu.ph/" target="_blank"><img src="logo.png" alt="CvSU Link"></a>


                </div>
                <!-- Footer Widget End -->
            </div>

            <div class="col-lg-8">
                <div class="row gy-6">

                    <div class="col-sm-4">
                        <!-- Footer Widget Start -->
                        <div class="footer-widget">
                            <h4 class="footer-widget__title">Government Links</h4>

                            <ul class="footer-widget__link">
                                <li><a href="https://www.gov.ph/">Goverment PH</a></li>
                                <li><a href="https://ched.gov.ph/">CHED</a></li>
                                <li><a href="https://www.dost.gov.ph/">DOST</a></li>
                                <li><a href="https://cavite.gov.ph/">Cavite PH</a></li>
                                <li><a href="https://cityofimus.gov.ph/">Imus City </a></li>
                                
                            </ul>
                        </div>
                        <!-- Footer Widget End -->
                    </div>
                    
                    <div class="col-sm-4">
                        <!-- Footer Widget Start -->
                        <div class="footer-widget">
                            <h4 class="footer-widget__title">Contact Information</h4>

                            <p class="footer-widget__description">Cavite Civic Center, Palico IV, Imus City, Cavite 4103</p>
                            <p class="footer-widget__description">Admin: (046) 471-6607 Registrar: (046) 436-6584</p>
                        </div>
                        <!-- Footer Widget End -->
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Footer Widget Area End -->

<!-- Footer Copyright Area End -->
<div class="footer-copyright">
    <div class="container">
        <div class="copyright-wrapper text-center">
            <div class="footer-widget__social-02 text-center">
                <a class="facebook" href="https://www.facebook.com/cvsuimusofficialpage" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a class="youtube" href="https://www.youtube.com/channel/UCMraY_VdxLvKTktj1el5FwQ/videos" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
            <p class="footer-widget__copyright mt-0">© 2023 <span> Cavite State University </span> Imus Campus</p>
        </div>
    </div>
</div>
<!-- Footer Copyright Area End -->

</div>

<footer>

</body>
</html>
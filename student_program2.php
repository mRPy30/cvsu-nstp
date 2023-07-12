<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----------TITLE------------>
    <link rel="shortcut icon" href="logo.png" type="">
    <title>Student Page</title>

    <!----------CSS------------>
    <link rel="stylesheet" href="homepage.css">

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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

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
                                        <a class="nav-link" href="homepage.php">HOME</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            ABOUT
                                          </a>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="MisVisQp.php">VISION AND MISSION</a></li>
                                              <li><a class="dropdown-item" href="nstp_program.php">NSTP PROGRAM</a></li>
                                              <li><a class="dropdown-item" href="instructor.php">INSTRUCTORS</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="homepage.php#news">NEWS</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="contact.php">CONTACT</a>
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
<br>

<div class="container">
    <div class="centered">
        <div class="student_prog2">
            <h1>NSTP PROGRAMS</h1>
        </div>
    </div>
</div>

<div class="feeds">
    <div class="inner_feeds">
        <h1>FEEDING PROGRAM</h1>
        <i class="fa-regular fa-clock"></i>
        <p>7AM - 12PM</p>
    </div>

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

</body>
</html>
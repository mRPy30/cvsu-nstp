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
  <title>
    <?php echo "Home"; ?>
  </title>

  <!----------CSS------------>
  <link rel="stylesheet" href="style_home.css">

  <!----------BOOTSTRAP------------>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!----------FONTS------------>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Abel&family=Inter:wght@400;800&family=Poppins:wght@400;500&display=swap"
    rel="stylesheet">

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
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
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
      <h1><i class="fa-solid fa-graduation-cap"></i>
        <?php echo $totalStudents; ?>
      </h1>
      <p>Total NSTP Students</p>
    </div>

    <div class='total_stud_box'>
      <h1><i class="fa-solid fa-book"></i>
        <?php echo $totalCourse; ?>
      </h1>
      <p>NSTP Program Courses</p>
    </div>

    <div class='total_stud_box'>
      <h1><i class="fa-solid fa-chalkboard-user"></i>
        <?php echo $totalInstructors; ?>
      </h1>
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


  <div class="text-center pt-5" id="news">
    <h1><strong>NEWS AND UPDATES</strong></h1>
  </div>

  <div class="maincarousel">
    <div class="wrapper shadow-sm">
      <ul class="carousel">
        <li class="card shadow-sm">
          <div class="img"><img src="Rectangle 218.jpg" alt="slide1" draggable="false"></div>
          <p>NEWS UPDATE | CvSU announced the Academic Break of classes from April 5-11, 202. </p>
          <div class="btn-group">
            <a href="/News/2023_June.html#Up_news100"><button type="button" class="btn btn-sm">View</button></a>
          </div>
        </li>

        <li class="card shadow-sm">
          <div class="img"><img src="329945500_597232348599656_1009511258308726229_n.jpg" alt="slide1"
              draggable="false">
          </div>
          <p>Pursuant to Office Memorandum 07, s. 2023 released by the Office of the
            Vice President for Academic Affairs, will be effective 2023.</p>
          <div class="btn-group">
            <a href="/News/2023_June.html#Up_news100"><button type="button" class="btn btn-sm ">View</button></a>
          </div>
        </li>

        <li class="card shadow-sm">
          <div class="img"><img src="345863742_6229350883825936_3886661454847551511_n 1.jpg" alt="slide1"
              draggable="false"></div>
          <p>ANNOUCEMENT: Heads up | Student Evaluation for Teachers (SET) is open until May 18, 2023. </p>
          <div class="btn-group">
            <a href="/News/2023_June.html#Up_news100"><button type="button" class="btn btn-sm ">View</button></a>
          </div>
        </li>
      </ul>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
  </div>

  </div>

  <script>
    const wrapper = document.querySelector(".wrapper");
    const carousel = document.querySelector(".carousel");
    const firstCardWidth = carousel.querySelector(".card").offsetWidth;
    const arrowBtns = document.querySelectorAll(".wrapper i");
    const carouselChildrens = [...carousel.children];

    let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;

    // Get the number of cards that can fit in the carousel at once
    let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

    // Insert copies of the last few cards to beginning of carousel for infinite scrolling
    carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
      carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
    });

    // Insert copies of the first few cards to end of carousel for infinite scrolling
    carouselChildrens.slice(0, cardPerView).forEach(card => {
      carousel.insertAdjacentHTML("beforeend", card.outerHTML);
    });

    // Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
    carousel.classList.add("no-transition");
    carousel.scrollLeft = carousel.offsetWidth;
    carousel.classList.remove("no-transition");

    // Add event listeners for the arrow buttons to scroll the carousel left and right
    arrowBtns.forEach(btn => {
      btn.addEventListener("click", () => {
        carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
      });
    });

    const dragStart = (e) => {
      isDragging = true;
      carousel.classList.add("dragging");
      // Records the initial cursor and scroll position of the carousel
      startX = e.pageX;
      startScrollLeft = carousel.scrollLeft;
    }

    const dragging = (e) => {
      if (!isDragging) return; // if isDragging is false return from here
      // Updates the scroll position of the carousel based on the cursor movement
      carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
    }

    const dragStop = () => {
      isDragging = false;
      carousel.classList.remove("dragging");
    }

    const infiniteScroll = () => {
      // If the carousel is at the beginning, scroll to the end
      if (carousel.scrollLeft === 0) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
        carousel.classList.remove("no-transition");
      }
      // If the carousel is at the end, scroll to the beginning
      else if (Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");
      }

      // Clear existing timeout & start autoplay if mouse is not hovering over carousel
      clearTimeout(timeoutId);
      if (!wrapper.matches(":hover")) autoPlay();
    }

    const autoPlay = () => {
      if (window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
      // Autoplay the carousel after every 2500 ms
      timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
    }
    autoPlay();

    carousel.addEventListener("mousedown", dragStart);
    carousel.addEventListener("mousemove", dragging);
    document.addEventListener("mouseup", dragStop);
    carousel.addEventListener("scroll", infiniteScroll);
    wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
    wrapper.addEventListener("mouseleave", autoPlay);
  </script>






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
            <a class="facebook" href="https://www.facebook.com/cvsuimusofficialpage" target="_blank"><i
                class="fab fa-facebook-f"></i></a>
            <a class="youtube" href="https://www.youtube.com/channel/UCMraY_VdxLvKTktj1el5FwQ/videos" target="_blank"><i
                class="fab fa-youtube"></i></a>
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
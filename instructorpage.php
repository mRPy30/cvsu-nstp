<?php
//connection
include 'db_connect.php';

session_start();
$accountID = $_SESSION['id'];


// query for the instructor handled course
$query = "SELECT tbl_course.courseName FROM instructor
                LEFT JOIN tbl_course ON instructor.courseID = tbl_course.courseID
                WHERE instructor.id = '$accountID'";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $instructorCourse = $row['courseName'];
} else {
    // Handle the case if the instructor is not found
    $instructorCourse = "Unknown";
}


// query for the name of the instructor
$query = "SELECT instructorName FROM instructor WHERE id = '$accountID'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $instructorName = $row['instructorName'];
} else {
    // Handle the case if the instructor is not found
    $instructorName = "Unknown";
}


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
    <title><?php echo "Instructor Page"; ?></title>

     <!----------CSS------------>
    <link rel="stylesheet" href="style_instructors.css">

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

    <!---Inner topbar--->
     <?php include('topbar.php');?>
        
</head>

<!----Body----->

<body>
    <section class="bg-section">
        <!---------Sidebar------------>
        <?php include('sidebar-instructor.php');?>
         
        <!---------End Sidebar--------->

        <!--Main Content-->
        <main class="pcoded-main-content">
            <div class="container pt-4">
                <div class="col-lg-12">
                    <div class="instructor_prof">
                        <p> Welcome <?php echo " $instructorName!" ?>
                    </div>
                    <div class="course">
                        <h1><?php echo "$instructorCourse" ?></h1>
                    </div>

                 <!-----BOXES------->
                    <div class="box">
                        <div class="first">
                                    <h4>2022 - 2023</h4>
                                    <span>Academic Year</span>
                        </div>
                        <div class="second">
                            <h4>Second</h4>
                            <span>Semester</span>
                        </div>
                    </div>

                <!--EVENT PANEL--->
                <aside class="event-panel">
                    <div class="header">
                        <h4>Upcoming</h4>
                    </div>
                    <div class="class-container">
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM tbl_schedule ORDER BY schedule_date ASC");
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Loop through the result and display events
                        while ($row = $result->fetch_assoc()) {
                        $scheduleID = $row['scheduleID']; // Assuming 'scheduleID' is the column name for the event ID
                        $scheduleType = $row['scheduleType'];
                        $title = $row['title'];
                        $location = $row['location'];
                        $timeFrom = $row['time_from'];
                        

                        if ($scheduleType == 2) {
                            $startDate = new DateTime($row['schedule_date']);
                            $scheduleDate = $startDate->format('Y-m-d');

                            $month = date('M', strtotime($scheduleDate));
                            $day = date('d', strtotime($scheduleDate));

                    echo '
                    <div class="program-box" data-event-id="' . $scheduleID . '">
                        <div class="date-box">
                            <h3>' . $month . '</h3>
                            <h4>' . $day .  '</h4>
                        </div>
                    <div class="divider"></div>
                        <div class="details-box">
                            <h3>' . $title . '</h3>
                            <h5>' . $location  . '</h5>
                        </div>
                    </div>
                    ';
                } elseif ($scheduleType == 1) {
                    // Non-repeating schedule
                    $startDate = new DateTime($row['schedule_date']);
                    $scheduleDate = $startDate->format('Y-m-d');

                    $month = date('M', strtotime($scheduleDate));
                    $day = date('d', strtotime($scheduleDate));

                    echo '
                    <div class="class">
                    <div class="class-box" data-event-id="' . $scheduleID . '">
                        <div class="date-box">
                            <h3>' . $month . '</h3>
                            <h4>' . $day . '</h4>
                        </div>
                    <div class="divider"></div>
                        <div class="details-box">
                            <h3>' . $title . '</h3>
                            <h5>' . $location . $scheduleID .'</h5>
                        </div>
                    </div>
                    </div>
                    ';
                }
                }

                $stmt->close();
                $conn->close();
                ?>
                </div>
                </aside>

                  <!----------------------------------- CALENDAR BOX ---------------------------------------->
    
                <div class="calendar-box">
                    <div class="wrapper">
                        <header>
                            <p class="current-date"></p>
                                <div class="icons">
                                <span id="prev" class="material-symbols-rounded"><i class="fa-solid fa-chevron-left"></i></span>
                                <span id="next" class="material-symbols-rounded"><i class="fa-solid fa-chevron-right"></i></span>
                                </div>
                        </header>
                        <div class="calendar">
                            <ul class="weeks">
                                <li>Sun</li>
                                <li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                            </ul>
                            <ul class="days"></ul>
                        </div>
                    </div>
                </div>
                     <!-- End Calendar -->

                    <!---NEWS---->
                    <section class="news">
                        <div class="wrapper">
                            <div><img style="height:340px; width:348px; justify-content: center;" src="news1.jpg"></div>
                            <div><img style="height:340px; width:348px; justify-content: center; "src="news2.jpg"></div>
                            <div><img style="height:340px; width:348px; justify-content: center;"src="news3.png"></div>
                            <div><img style="height:340px; width:348px; justify-content: center;"src="news4.jpg"></div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
        
        
        <!-----End Main content------>
    </section>
    <!-----End of Body------>
    <script>
      const daysTag = document.querySelector(".days"),
  currentDate = document.querySelector(".current-date"),
  prevNextIcon = document.querySelectorAll(".icons span");
  
  // getting new date, current year and month
  let date = new Date(),
  currYear = date.getFullYear(),
  currMonth = date.getMonth();
  
              // storing full name of all months in array
  const months = ["January", "February", "March", "April", "May", "June", "July",
                "August", "September", "October", "November", "December"];
  
  const renderCalendar = () => {
      let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
      lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
      lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
      lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
      let liTag = "";
  
      for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
          liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
      }
  
      for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
          // adding active class to li if the current day, month, and year matched
          let isToday = i === date.getDate() && currMonth === new Date().getMonth() 
                       && currYear === new Date().getFullYear() ? "active" : "";
          liTag += `<li class="${isToday}">${i}</li>`;
      }
  
      for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
          liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
      }
      currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
      daysTag.innerHTML = liTag;
  }
  renderCalendar();
  
  prevNextIcon.forEach(icon => { // getting prev and next icons
      icon.addEventListener("click", () => { // adding click event on both icons
          // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
          currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
  
          if(currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
              // creating a new date of current year & month and pass it as date value
              date = new Date(currYear, currMonth, new Date().getDate());
              currYear = date.getFullYear(); // updating current year with new date year
              currMonth = date.getMonth(); // updating current month with new date month
          } else {
              date = new Date(); // pass the current date as date value
          }
          renderCalendar(); // calling renderCalendar function
      });
  });
  
      </script>       
</body>
</html>
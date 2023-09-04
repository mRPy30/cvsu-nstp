<?php
include ('db_connect.php');
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
    <title><?php echo "Coordinator Page"; ?></title>

     <!----------CSS------------>
    <link rel="stylesheet" href="style_admin.css">

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

    <style>
/*****CALENDAR****/
/****EVENT PANEL*****/

.event-panel {
   padding: 25px;
   background: #ffffff;
   filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
   width: 345px;
   height: 530px;
   position: absolute;
   margin: 20px 0px 0px 500px;
 }
 .header h4{
   font: normal 700 20px/normal 'Poppins';
}
 .event-panel-title {
   font-size: 18px;
   margin-bottom: 0px;
 }

 .event-panel-content {
   font-size: 14px;
 }

 .class-container{
   overflow-y: scroll;
   height: 420px;
   width: 305px;
   margin-right: 10px;
 }
.class-container::-webkit-scrollbar {
   width: 8px; 
}
.class-container::-webkit-scrollbar-thumb {
   background-color: #cccccc; 
   border-radius: 6px; 
}
.class-container::-webkit-scrollbar-thumb:hover {
   background-color: #ffd700; 
}
.class-container::-webkit-scrollbar-track {
   background-color: #ffffff;
}

 .class-box {
   border-radius: 8px;
   background-color: #ffffff;
   box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.50), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
   display: flex;
   align-items: center;
   margin: 10px 5px 15px 5px;
   height: 45px;
 }
 .date-box {
   height: 50px;
   width: 40px;
   margin-right: 10px; /* Add margin between date-box and divider */
   display:flex;
   flex-direction: column;
   align-items: center;
   justify-content: space;
 }
 .date-box h3{
   margin-top: 5px;
   font-size: 15px;
 }
 .date-box h4 {
  margin-bottom: 30px;
  font-size: 15px;
 }
 .divider {
   flex-grow: 1; /* Allow the divider to expand and fill the remaining space */
   height: 40px;
   border: solid 1px black;
   margin-right: 10px; /* Add margin between divider and details-box */
   background-color: #4CAF50;
   width: 1px;
 }
 .details-box {
   height: 50px;
   width: 220px;
   flex-direction: column;
   align-items: center;
   justify-content: space;
 }
 .details-box h3 {
   margin-top: 8px;
   font-size: 12px
 }
 .details-box h5 {
   margin-bottom: 10px;
   font-size: 15px
 }

 .program-box {
   width: 286px;
   height: 45px;
   border-radius: 8px;
   padding: 5px;
   display: flex;
   align-items: center;
   margin: 5px;
   background-color: #ffffff;
 }
/*******END EVENT PANNEL*********/
 .calendar-box{
    width: 360px;
    height: 530px;
   filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
   border-radius: 5px;
   margin: 20px 0px 0px 110px;
   background-color: #fff;
   position: absolute;
 }
 header .icons{
   display: flex;
   margin: 10px 0px 0px 240px;
 }
 header .icons span{
   height: 30px;
   width: 30px;
   cursor: pointer;
   color: #000000;
   text-align: center;
   margin-left: 20px;
   line-height: 38px;
   font-size: 1.5rem;
   user-select: none;
   border-radius: 50%;
 }
 .icons span:last-child{
   margin-right: -10px;
 }
 header .icons span:hover{
   background: #f2f2f2;
   
 }
 header .current-date{
   font: normal 600 23px/34px 'Poppins';
   margin: 5px 10px;
   position: absolute;
   
 }
           
 .calendar{
   padding: 20px;
 }
 .calendar ul{
   display: flex;
   flex-wrap: wrap;
   list-style: none;
   text-align: center;
   padding: 25px 2px 5px 2px;

 }
 .calendar .days{
   margin-bottom: 10px;
 }
 .calendar li{
   color: #333;
   width: calc(100% / 7);
   font-size: 18px;
 }
 .calendar .weeks li{
   font-weight: 500;
   cursor: default;
 }
 .calendar .days li{
   z-index: 1;
   cursor: pointer;
   position: relative;
   margin-top: 30px;
 }
 .days li.inactive{
   color: #aaa;
 }
 .days li.active{
   color: #fff;
 }
 .days li::before{
   position: absolute;
   content: "";
   left: 50%;
   top: 50%;
   height: 40px;
   width: 40px;
   z-index: -1;
   border-radius: 50%;
   transform: translate(-50%, -50%);
 }
 .days li.active::before{
   background: #6FBB76;
 }
 .days li:not(.active):hover::before{
   background: #e7e7e7;
 }
/****END CALENDAR****/
</style>
     
<!---Inner topbar--->
<?php include('topbar.php');?>

</head>

<!----Body----->
<body>
<section class="bg-section">
   <!---------Sidebar------------>
        <?php include('sidebar-admin.php');?>

        <!--Main Content-->
        <main class="pcoded-main-content">
            <div class="container pt-4">
                <div class="col-lg-12">
                    <div class="sched-content">
                        <div class="upperbox">
                            <h6>SCHEDULE</h6>
                        </div>
                    </div>    
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


                    <!------------ADD BUTTON---------->

                    <!----class---->
                    <div class="sched-section">
                        <div class="sched-class">
                          <button type="submit" class="add-class" id="class-btn">ADD CLASS SCHEDULE</button>
                        </div>
                        <div class="sched-prog">
                          <button type="submit" class="add-prog" id="prog-btn">ADD PROGRAM SCHEDULE</button>
                        </div>
                    </div>
                    <!----end class--->

                    <!----------------------------- Add Class form (hidden by default) ------------------------>


                <div id="classForm" class="form-popup">
                    <form action="admin-manageSchedule.php" method="POST" class="form-container" enctype="multipart/form-data">
                        <h3>Add Class Schedule</h3>

                        <label for="section"><b>Section:</b></label>
                    <select type="select" name="select">
                        <option></option>
                        <option>BSIT-1C</option>
                        <option>BSCS-1A</option>
                    </select>

                    <label for="days"><b>Days of the week:</b></label>
                      <select type="select" name="select">
                          <option></option>
                          
                      </select>

                      <div class="form-control-1">
                        <!----form1 Date--->
                        <label for="studentID"><b>Start Date:</b></label>
                        <input type="date" id="birthday" name="birthday">
                        <!----form1 Time--->
                        <label for="course-volunteer"><br>Time From:</b></label>
                        <input type="time" id="appt" name="appt">
                    </div>

                      <div class="form-control-2">
                        <!----form2 Date--->
                        <label for="studentID"><b>End Date:</b></label>
                        <input type="date" id="birthday" name="birthday">
                        <!----form2 Time--->
                        <label for="course-volunteer"><br>Time End:</b></label>
                        <input type="time" id="appt" name="appt">
                      </div>
                        <button type="submit" class="btn" onclick="closeAddForm()">Submit</button>
                        <button type="button" class="btn cancel" onclick="closeAddForm()">Cancel</button>
                  </form>
                </div>

                <!----------------------------- Add Program form (hidden by default) ------------------------>


                <div id="progForm" class="form-popup">
                    <form action="admin-manageSchedule.php" method="POST" class="form-container" enctype="multipart/form-data">
                        <h4><b>Add Program Schedule</b></h4>

                
                        <label for="section"><b>Program:</b></label>
                        <select type="select" name="select">
                            <option></option>
                            <option>Civil Welfare Training Service</option>
                            <option>Reserve Officer Training Corps</option>
                        </select>

                        <div class="date">
                          <label for="section"><b>Schedule Date:</b></label>
                          <input type="date" name="birthday" required>
                        </div>

                        <div class="form-control-1">
                        <!----form1 Date--->
                        
                        <!----form1 Time--->
                        <label for="course-volunteer"><br>Time From:</b></label>
                        <input type="time" id="appt" name="appt">
                    </div>

                      <div class="form-control-2">
                        <!----form2 Date--->
                        
                        <!----form2 Time--->
                        <label for="course-volunteer"><br>Time End:</b></label>
                        <input type="time" id="appt" name="appt">
                      </div>

                        <button type="submit" class="btn" onclick="closeAddForm()">Submit</button>
                        <button type="button" class="btn cancel" onclick="closeAddForm()">Cancel</button>
                    </form>
                </div>


                </div>
            </div>
        </main>        
        <!-----End Main content------>        
        
<!-----End of Body------>
</section>


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
  

             // ---------------------------------- adding Class open js -------------------------------- //

                // Get the button element
                var ClassButton = document.getElementById('class-btn');

                // Get the popup form element
                var classPopup = document.getElementById('classForm');

                // Add an event listener to the button for the click event
                ClassButton.addEventListener('click', function(event) {
                // Prevent the default form submission behavior
                event.preventDefault();

                // Show the popup form
                classPopup.style.display = 'block';
                });


                // Function to close the pop-up form
                function closeAddForm() {
                document.getElementById("classForm").style.display = "none";
                }


                // ---------------------------------- adding Program open js -------------------------------- //

                // Get the button element
                var progButton = document.getElementById('prog-btn');

                // Get the popup form element
                var ProgPopup = document.getElementById('progForm');

                // Add an event listener to the button for the click event
                progButton.addEventListener('click', function(event) {
                // Prevent the default form submission behavior
                event.preventDefault();

                // Show the popup form
                ProgPopup.style.display = 'block';
                });


                // Function to close the pop-up form
                function closeAddForm() {
                document.getElementById("progForm").style.display = "none";
                }    
      </script>       
</body>
</html>
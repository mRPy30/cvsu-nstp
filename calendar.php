<!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font Link for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="script.js" defer></script>

<style>
/*****CALENDAR****/
/****EVENT PANEL*****/

.event-panel {
   padding: 25px;
   background: #6FBB76;
   box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
   width: 345px;
   height: 520px;
   position: absolute;
   margin: 20px 80vw 0px 55vw;
 }
 .header h4{
   font: normal 700 17px/normal 'Poppins';
}
 .event-panel-title {
   font-size: 18px;
   margin-bottom: 10px;
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
   display: flex;
   align-items: center;
   margin: 5px;
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
   width: 44vw;
   height: 520px;
   filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
   border-radius: 5px;
   margin: 20px 0px 0px 130px;
   background-color: #fff;
   position: absolute;
 }
 header .icons{
   display: flex;
   margin: 10px 0px 0px 550px;
 }
 header .icons span{
   height: 38px;
   width: 38px;
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
   font: normal 600 24px/34px 'Poppins';
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
   font-size: 20px;
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
   background: #f2f2f2;
 }
/****END CALENDAR****/
</style>
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
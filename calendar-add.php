<?php

include 'db_connect.php';




// Fetch course data from the database
$query = "SELECT id, instructorName FROM instructor";
$result = mysqli_query($conn, $query);
$instructor = mysqli_fetch_all($result, MYSQLI_ASSOC);


// Fetch section data from the database
$query = "SELECT sectionID, sectionName FROM tbl_sections";
$result = mysqli_query($conn, $query);
$sections = mysqli_fetch_all($result, MYSQLI_ASSOC);







?>












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
          body {
            font-family: Arial, sans-serif;
          }
          .container{
            width: 1180px;
            height: 650px;
            display: flex;
            flex-direction: row;
            padding:10px;
            margin-left: 140px;
          }


          .event-panel {
            padding: 10px;
            box-shadow: -2px 2px 10px -4px rgba(4,4,4,0.82);
            border-radius: 10px;
            width: 320px;
            height: 530px;
            margin: 20px;
            background-color: #FFFFFF;

        
          }

          .event-panel-title {
            font-size: 18px;
            margin-bottom: 10px;
          }

          .event-panel-content {
            font-size: 14px;
          }

          .create-event-btn {
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
            margin-bottom: 20px;
          }

          .create-event-btn:hover {
            background-color: #6FBB76;
          }









          .form-box {
              background-color: #ffffff;
              width: 600px;
              border-radius: 10px;
              margin:20px;
              height: 530px;
              padding: 5px;
              padding-top: 5px;
              box-shadow: -2px 2px 10px -4px rgba(4,4,4,0.82);
          }
          .form-box h4 {
           text-align:center;
           padding-top: 5px;
          

          }
          .container2 {
            
              width: 320px;
              border-radius: 10px;
              overflow: hidden;
              padding: 5px;
              height: 480px;
              display:flex;
              justify-content: space-evenly;
            
          }
          .form-control {
              margin-bottom: 5px;
              position: relative;
              border: none;
          }

          .form {
              padding: 40px;
          }
          .form-control label {
              display: inline-block;
              margin-bottom: 15px;
              left: 0px;
              position: absolute;
              font-size: 15px;
          }
          .form-control input {
              width: 100px;
              border: 1px solid black;
              font-size: 13px;
              border-radius: 5px;
              padding: 7px;
              display: block;
          }

          .form-control input:focus {
              border-color: #777;
          }

        .form-control select {
              width: 110px;
              border: 1px solid black;
              font-size: 12px;
              border-radius: 5px;
              padding: 8px;
              display: block;
          }
          .form-control2 select {
              width:146px;
              border: 1px solid black;
              font-size: 12px;
              border-radius: 5px;
              padding: 7px;
              display: block;

          }

          .form-control2 input {
              width: 120px;
              border: 1px solid black;
              font-size: 12px;
              border-radius: 5px;
              padding: 8px;
              display: block;
          }


          h3{
            margin: 0px;

          }
          
          h5{
            margin: 0px;

          }


          h4{
            margin: 10px;

          }


          .form-control textarea {
              width: 120px;
              height: 40px;
              border: 1px solid black;
              font-size: 14px;
              border-radius: 5px;
              padding: 12px;
              display: block;
          }

          .form-control textarea:focus {
          border-radius: 5px;
          padding: 12px;
          display: block;
        
          }

          .form-control textarea:focus {
          border-color: #777;
          }
              
          .form-controls-container {
          position: sticky;
          bottom: 0;
          margin-top: 20px;
        }

        .form-control2 {
          margin-bottom: 10px;
          
        }

        .submit {
          width: 150px;
          color: #fff;
          border: none;
          font-size: 14px;
          background-color: #6FBB76;
          border-radius: 5px;
          padding: 8px;
          display: block;
          margin-top: 10px;
        }

        .calendar-box{
          width: 420px;
          height: 530px;
          box-shadow: -2px 2px 10px -4px rgba(4,4,4,0.82);
          border-radius: 5px;
          margin: 20px;
        }


        .first-form{
          padding:3px;
          border-radius: 5px;
        }
        
        .program-box {
          width: 290px;
          height: 50px;
          border: 1px solid black;
          border-radius: 5px;
          padding: 5px;
          display: flex;
          align-items: center;
          margin: 5px;
          background-color: #ffffff;
        }

        .class-box {
          
          border: 1px solid black;
          border-radius: 5px;
 
          display: flex;
          align-items: center;
          margin: 5px;
         
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
          margin-top: 10px;
          font-size: 12px;
      
        }
        .date-box h4 {
         margin-top: 0px;
         margin-bottom: 50px;
         font-size: 12px;
        }



        .divider {
          flex-grow: 1; /* Allow the divider to expand and fill the remaining space */
          height: 40px;
          border: solid 1px black;
          margin-right: 10px; /* Add margin between divider and details-box */
          background-color: #4CAF50;
        }

        .details-box {
          height: 50px;
          width: 220px;
       
          flex-direction: column;
          align-items: center;
          justify-content: space;
          
       
        }

        .details-box h3 {
          margin-top: 10px;
          font-size: 12px
        }

        .details-box h5 {
          margin-bottom: 10px;
          font-size: 15px
        }

         /* Modal styles */
      .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
       
      }

      .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 25%;
        border-radius: 10px;
      }

      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
      }

      .close:hover,
      .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
      }

      .modal-buttons {
        display: flex;
         justify-content: right;
        margin-top:10px;
            
      }

      .editmodal{
        background-color: green;
        padding: 5px 10px;
        margin-right: 10px;
 
        border: none;
        border-radius: 4px;
        color: #fff;
        cursor: pointer;
        border: solid 1px black;
      }

      
      .deletemodal{
        background-color: red;
        padding: 5px 10px;
        margin-right: 10px;
 
        border: none;
        border-radius: 4px;
        color: #fff;
        cursor: pointer;
        border: solid 1px black;
      }

      .cancelmodal{
        background-color: white;
        padding: 5px 10px;
        margin-right: 10px;
 
        border: none;
        border-radius: 4px;
        color: black;
        cursor: pointer;
        border: solid 1px black;
      }




      .modal-buttons button:hover {
        background-color: #aaa;
      }

      .modal-buttons button:focus {
        outline: none;
      }
      .program-details-only {
  display: none;
}

.class-details-only {
  display: none;
}

.program-details-only.show {
  display: block;
}

.class-details-only.show {
  display: block;
}
      .form-box.edit {
            border: solid 1px black;
            width: 332px;
            border-radius: 10px;
            margin: 10px;
            height: 520px;
            padding: 5px;
            padding-top: 5px;
            display: none;
            background-color: white;
          }



          .form-box.edit h4 {
            text-align: center;
            padding-top: 5px;
          }

          .container2.edit {
            width: 320px;
            border-radius: 10px;
            overflow: hidden;
            padding: 5px;
            height: 480px;
            display: flex;
            justify-content: space-evenly;
          }

          .form-control.edit {
            margin-bottom: 18px;
            position: relative;
          }

          .form.edit {
            padding: 40px;
          }

          .form-control.edit label {
            display: inline-block;
            margin-bottom: 10px;
            left: 0px;
            position: absolute;
          }

          .form-control.edit input {
            width: 120px;
            border: 1px solid black;
            font-size: 14px;
            border-radius: 5px;
            padding: 12px;
            display: block;
          }

          .form-control.edit input:focus {
            border-color: #777;
          }

          .form-control.edit select {
            width: 146px;
            border: 1px solid black;
            font-size: 14px;
            border-radius: 5px;
            padding: 12px;
            display: block;
          }

          .form-control2.edit select {
            width: 146px;
            border: 1px solid black;
            font-size: 14px;
            border-radius: 5px;
            padding: 12px;
            display: block;
          }

          .form-control2.edit input {
            width: 120px;
            border: 1px solid black;
            font-size: 14px;
            border-radius: 5px;
            padding: 12px;
            display: block;
          }
          
          h3 {
            margin: 0px;
          }

          h5 {
            margin: 0px;
          }

          h4 {
            margin: 10px;
          }

          .form-control.edit textarea {
            width: 120px;
            height: 40px;
            border: 1px solid black;
            font-size: 14px;
            border-radius: 5px;
            padding: 12px;
            display: block;
          }

          .form-control.edit textarea:focus {
            border-radius: 5px;
            padding: 12px;
            display: block;
          }

          .form-control.edit textarea:focus {
            border-color: #777;
          }

          .form-controls-container.edit {
            position: sticky;
            bottom: 0;
            margin-top: 20px;
          }

          .form-control2.edit {
            margin-bottom: 10px;
         
          }

          .form-control3.edit {
            margin-bottom: 10px;
            display: flex;
          }

          .submit-edit {
            width: 70px;
            
            font-size: 14px;
            border-radius: 5px;
            padding: 8px;
            display: block;
            margin-top: 10px;
            margin-right: 5px;
            background-color: #4CAF50;
          }

          .cancel {
            width: 70px;
            border: 1px solid black;
            font-size: 14px;
            border-radius: 5px;
            padding: 8px;
            display: block;
            margin-top: 10px;
            background-color: gray;
          }
          
          .form-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Adjust the alpha value (0.5) to control the darkness */
            z-index: 999; /* Ensure the overlay is on top of other elements */
            display: none; /* Initially hidden */
          }

          .form-box.edit {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000; /* Ensure the edit form is on top of the overlay */
          }

          

.wrapper{
  width: 420px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.12);
}
.wrapper header{
  display: flex;
  align-items: center;
  padding: 25px 30px 10px;
  justify-content: space-between;
}
header .icons{
  display: flex;
}
header .icons span{
  height: 38px;
  width: 38px;
  margin: 0 1px;
  cursor: pointer;
  color: #878787;
  text-align: center;
  line-height: 38px;
  font-size: 1.9rem;
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
  font-size: 1.45rem;
  font-weight: 500;
}
.calendar{
  padding: 20px;
  height: 450px;
  width: 420px;
}
.calendar ul{
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  text-align: center;
}
.calendar .days{
  margin-bottom: 20px;
}
.calendar li{
  color: #333;
  width: calc(100% / 7);
  font-size: 1.07rem;
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

    </style>
  </head>
  <body>

  <!----------------------------------- CALENDAR BOX ---------------------------------------->
    <div class="container">
    
      <div class="calendar-box">
        
      <div class="wrapper">
      <header>
        <p class="current-date"></p>
        <div class="icons">
          <span id="prev" class="material-symbols-rounded">chevron_left</span>
          <span id="next" class="material-symbols-rounded">chevron_right</span>
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

      <!----------------------------------- EVENT BOX ---------------------------------------->

      <div class="event-panel">
  <div class="header">
    <h4>Upcoming</h4>
  </div>
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
        <h5>' . $location .  $scheduleID . '</h5>
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
    ';
  }
}

$stmt->close();
$conn->close();
?>
</div>








      <!----------------------------------- FORM BOX ---------------------------------------->


      <div class="form-box">
      <div class="header">
                <h4>ADD NEW SCHEDULE</h4>
       </div>

        <div class="container2">
          
          <div class="first-form">
            <form method="POST" action="admin-records_manageSchedule.php">

            <input type="hidden" name="schedule_id" id="schedule_id">

            <div class="form-control">
              <label for="schedule_type">Schedule Type</label>
              <br>
              <select name="schedule_type" id="schedule_type" class="custom-select">
                <option value="1" <?php echo isset($schedule_type) && $schedule_type == 1 ? 'selected' : '' ?>>Class</option>
                <option value="2" <?php echo isset($schedule_type) && $schedule_type == 2 ? 'selected' : '' ?>>Program</option>
              </select>
            </div>

            <div class="form-control" >
              <label for="title">Title:</label>
              <br>
              <input type="text" id="title" name="title">
            </div>

          
                    


              
              <div class="form-control">
                <label for="instructor">Instructor</label>
                <br>
                <select name="instructor_id" id="instructor_id" class="custom-select">
                  <?php foreach ($instructor as $row): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['instructorName']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

          
    
        

              <div class="form-control" id="description-control">
                    <label for="" class="control-label">Description</label>
                    <br>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="3"><?php echo isset($description) ? $description : '' ?></textarea>
              </div>

        
              <div class="form-control" id="section-control" style="display: none;">
                <label for="section">Section:</label>
                <br>
                <!-- code for getting sections in the nstp program -->
                <select name="section_id" id="section">
                  
                  <?php foreach ($sections as $section) : ?>
                    <option value="<?php echo $section['sectionID']; ?>"><?php echo $section['sectionName']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              
              <div class="form-control">
                <label for="" class="control-label">Location</label>
                <br>
                <textarea class="form-control" name="location" cols="30" rows="3"></textarea>
              </div>
              
              <div class="form-group">
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="1" id="is_repeating_edit" name="is_repeating" <?php echo isset($is_repeating) && $is_repeating != 1 ? '' : 'checked' ?>>
    <label class="form-check-label" for="type">
      Weekly Schedule
    </label>
  </div>
</div>


              </div>

            <div class=form-weekly style=" ">
        
        
            <div class="form-control2 for-repeating">
                <label for="dow" class="control-label">Days of Week</label>
                <br>
                <select name="dow" id="dow" class="custom-select select2">
                  <?php 
                  $dow = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
                  for($i = 0; $i < 7; $i++):
                  ?>
                  <option value="<?php echo $i ?>" <?php echo isset($dow_arr) && in_array($i, $dow_arr) ? 'selected' : '' ?>><?php echo $dow[$i] ?></option>
                  <?php endfor; ?>
                </select>

                <br>

                <label for="" class="control-label">Start Date</label>
                <br>
                <input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo isset($start_date) ? $start_date : '' ?>">

                <label for="" class="control-label">End Date</label>
                <br>
                <input type="date" name="end_date" id="end_date" class="form-control" value="<?php echo isset($end_date) ? $end_date : '' ?>">
              </div>

                

                <div class="form-control2  for-nonrepeating" style="display: none">
                  <label for="" class="control-label">Schedule Date</label>
                  <br>
                  <input type="date" name="schedule_date" id="schedule_date" class="form-control" value="<?php echo isset($schedule_date) ? $schedule_date : '' ?>">
                </div>
                <div class="form-control2 ">
                  <label for="" class="control-label">Time From</label>
                  <input type="time" name="time_from" id="time_from" class="form-control" value="<?php echo isset($time_from) ? $time_from : '' ?>">
                </div>
                <div class="form-control2 ">
                  <label for="" class="control-label">Time To</label>
                  <input type="time" name="time_to" id="time_to" class="form-control" value="<?php echo isset($time_to) ? $time_to : '' ?>">
                </div>
          


              <div class="form-control2">
              <button type="submit" class="submit">Add Schedule</button>
              </div>
            </div>
        
          </form>

       
    </div>  
    </div>


<!----------------------------------- EDIT FORM BOX ---------------------------------------->

<div class="form-overlay"></div>
<div class="form-box edit">
  <div class="header">
    <h4>ADD NEW SCHEDULE</h4>
  </div>

  <div class="container2">
    <div class="first-form">
      <form action="manageSchedule.php" method="POST" class="form-container" enctype="multipart/form-data">

      <div class="form-control">
        <label for="schedule_type">Schedule Type</label>
        <br>
        <select name="schedule_type" id="schedule_type" class="custom-select">
        <option value="1" <?php echo $eventDetails['scheduleType'] === '1' ? 'selected' : ''; ?>>Class</option>
          <option value="2" <?php echo $eventDetails['scheduleType'] === '2' ? 'selected' : ''; ?>>Program</option>

        </select>
      </div>

        <div class="form-control" >
              <label for="title">Title:</label>
              <br>
              <input type="text" id="title" name="title" value="<?php echo isset($title) ? $title : '' ?>">

            </div>

        <div class="form-control edit">
          <label for="instructor">Instructor</label>
          <br>
          <select name="instructor_id" id="instructor_id" class="custom-select">
            <?php foreach ($instructor as $row): ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['instructorName']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-control edit" id="description-control">
          <label for="" class="control-label">Description</label>
          <br>
          <textarea class="form-control" id="description" name="description" cols="30" rows="3"><?php echo isset($description) ? $description : '' ?></textarea>
        </div>

        <div class="form-control edit" id="section-control" style="display: none;">
          <label for="section">Section:</label>
          <br>
          <!-- code for getting sections in the nstp program -->
          <select name="section_id" id="section">
            <?php foreach ($sections as $section) : ?>
              <option value="<?php echo $section['sectionID']; ?>"><?php echo $section['sectionName']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-control edit" >
          <label for="" class="control-label">Location</label>
          <br>
          <textarea class="form-control"  id="location" name="location" cols="30" rows="3"><?php echo isset($location) ? $location : '' ?></textarea>
        </div>

        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="is_repeating" name="is_repeating" <?php echo isset($is_repeating) && $is_repeating != 1 ? '' : 'checked' ?>>
            <label class="form-check-label" for="type">
              Weekly Schedule
            </label>
          </div>
        </div>
      </div>

      <div class="form-weekly" style=" ">
        <div class="form-control2 for-repeating edit">
          <label for="dow" class="control-label">Days of Week</label>
          <br>
          <select name="dow" id="dow" class="custom-select select2">
            <?php 
            $dow = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
            for($i = 0; $i < 7; $i++):
            ?>
            <option value="<?php echo $i ?>" <?php echo isset($dow_arr) && in_array($i, $dow_arr) ? 'selected' : '' ?>><?php echo $dow[$i] ?></option>
            <?php endfor; ?>
          </select>

          <br>

          <label for="" class="control-label">Start Date</label>
          <br>
          <input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo isset($start_date) ? $start_date : '' ?>">

          <label for="" class="control-label">End Date</label>
          <br>
          <input type="date" name="end_date" id="end_date" class="form-control" value="<?php echo isset($end_date) ? $end_date : '' ?>">
        </div>

        <div class="form-control2 for-nonrepeating edit" style="display: none">
          <label for="" class="control-label">Schedule Date</label>
          <br>
          <input type="date" name="schedule_date" id="schedule_date" class="form-control" value="<?php echo isset($schedule_date) ? $schedule_date : '' ?>">
        </div>

        <div class="form-control2 edit">
          <label for="" class="control-label">Time From</label>
          <input type="time" name="time_from" id="time_from" class="form-control" value="<?php echo isset($time_from) ? $time_from : '' ?>">
        </div>

        <div class="form-control2 edit">
          <label for="" class="control-label">Time To</label>
          <input type="time" name="time_to" id="time_to" class="form-control" value="<?php echo isset($time_to) ? $time_to : '' ?>">
        </div>

        <div class="form-control3 edit">
        <button type="submit" class="submit-edit">Update</button>

        <button id="cancelEditButton" type="button" class="cancel">Cancel</button>
      </div>
        

      </div>
    </form>
  </div>
</div>




<!----------------------------------- MORE DETAILS BOX ---------------------------------------->

<div id="eventModal" class="modal">
  <div class="modal-content">
    <h2 id="modalTitle"></h2>
    <div id="eventDetails">

     
      <p ><b><span class="label">Instructor:</span></b> <span id="modalInstructor"></span></p>
      <p ><b><span class="label">Location:</span> </b> <span id="modalLocation"></span></p>
      
      <div class="program-details-only">
          <p><b><span class="label">Description:</span> </b> <span id="modalDescription"></span></p>
          <p><b><span class="label">Dates:</span> </b> <span id="modalDates"></span></p>
      </div> 

      <p ><b><span class="label">Time Start:</span></b> <span id="modalStart"></span></p>
      <p ><b><span class="label">Time End:</span></b> <span id="modalEnd"></span></p>

      <div class="class-details-only">
          <p ><b><span class="label">Section:</span> </b> <span id="sectionName"></span></p>
          <p ><b><span class="label">Day of the week:</span></b> <span id="modalDay"></span></p>
          <p ><b><span class="label">Start Date:</span></b> <span id="startDate"></span></p>
          <p ><b><span class="label">End Date:</span></b> <span id="endDate"></span></p>
      </div>

      <div class="modal-buttons">
        <button id="editButton" class="editmodal">Edit</button>
        <button id="deleteButton" class="deletemodal">Delete</button>
        <button id="cancelButton" class="cancelmodal">Cancel</button>
      </div>
    </div>
  </div>
</div>

























      <script>
        // JavaScript code// JavaScript code
        // Event listener for event div click
        var classDivs = document.getElementsByClassName('class-box');
        var programDivs = document.getElementsByClassName('program-box');

        for (var i = 0; i < classDivs.length; i++) {
          classDivs[i].addEventListener('click', function() {
            var eventId = this.getAttribute('data-event-id');
            var eventType = this.getAttribute('data-event-type');
            openModal(eventId, eventType);
          });
        }

        for (var i = 0; i < programDivs.length; i++) {
          programDivs[i].addEventListener('click', function() {
            var eventId = this.getAttribute('data-event-id');
            var eventType = this.getAttribute('data-event-type');
            openModal(eventId, eventType);
          });
        }

      function openModal(eventId, eventType) {
              var xhr = new XMLHttpRequest();
              xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                  if (xhr.status === 200) {
                    console.log(xhr.responseText); // Log the response
                    var eventDetails = JSON.parse(xhr.responseText);
                    retrieveSectionName(eventDetails, eventType);
                  } else {
                    console.log('Error: ' + xhr.status); // Log any HTTP error status
                  }
                }
              };

              xhr.open('GET', 'get-event.php?event_id=' + eventId, true);
              xhr.send();
            }

            function retrieveSectionName(eventDetails, eventType) {
              var sectionId = eventDetails.section_id;
              var sectionXhr = new XMLHttpRequest();
              sectionXhr.onreadystatechange = function() {
                if (sectionXhr.readyState === 4) {
                  if (sectionXhr.status === 200) {
                    var sectionName = sectionXhr.responseText; // Assuming the response contains the section name
                    eventDetails.sectionName = sectionName;
                    showModal(eventDetails, eventType);
                  } else {
                    console.log('Error: ' + sectionXhr.status); // Log any HTTP error status
                  }
                }
              };

              sectionXhr.open('GET', 'get-section.php?section_id=' + eventDetails.sectionID, true);
              sectionXhr.send();
            }
              function showModal(eventDetails) {
                var modal = document.getElementById('eventModal');
                var modalTitle = document.getElementById('modalTitle');
                var modalLocation = document.getElementById('modalLocation');
                var modalDescription = document.getElementById('modalDescription');
                var modalDates = document.getElementById('modalDates');
                var modalTime = document.getElementById('modalTime');
                var editButton = document.getElementById('editButton');
                var deleteButton = document.getElementById('deleteButton');
                var cancelButton = document.getElementById('cancelButton');
                var modalInstructor = document.getElementById('modalInstructor');
                var sectionName = document.getElementById('sectionName');
                var day = document.getElementById('modalDay');
                var startDate = document.getElementById('startDate');
                var endDate = document.getElementById('endDate');

                var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                var dayValue = eventDetails.dow; // The numerical representation of the day (0-6)
                var dayName = dayNames[dayValue]; // Get the corresponding day name

                day.textContent = dayName;

                modalTitle.textContent = eventDetails.title;
                modalLocation.textContent = eventDetails.location;
                modalStart.innerHTML = eventDetails.time_from;
                modalEnd.innerHTML = eventDetails.time_to;
                modalInstructor.textContent = eventDetails.instructorName;
                modalDescription.textContent = eventDetails.description;
                modalDates.textContent = eventDetails.dates;
                sectionName.textContent = eventDetails.sectionName;
                day.textContent = eventDetails.dayOfWeek;
                startDate.textContent = eventDetails.startDate;
                endDate.textContent = eventDetails.endDate;

                // Reset display properties for program and class details
                modalDescription.style.display = 'none';
                modalDates.style.display = 'none';

                if (eventDetails.scheduleType === 1) { // Class
                  // Show class details
                  sectionName.classList.add('show');
                  day.classList.add('show');
                  startDate.classList.add('show');
                  endDate.classList.add('show');

                  // Hide program details
                  modalDescription.classList.remove('show');
                  modalDates.classList.remove('show');
                } else if (eventDetails.scheduleType === 2) { // Program
                  // Hide class details
                  sectionName.classList.remove('show');
                  day.classList.remove('show');
                  startDate.classList.remove('show');
                  endDate.classList.remove('show');

                  // Show program details
                  modalDescription.classList.add('show');
                  modalDates.classList.add('show');
                }
                modal.style.display = 'block';

                editButton.addEventListener('click', function() {
                  openEditForm(eventDetails);
                });

                deleteButton.addEventListener('click', function() {
                  if (confirm("Are you sure you want to delete this schedule?")) {
                    deleteSchedule(eventDetails.scheduleID);
                  }
                });

                cancelButton.addEventListener('click', function() {
                  closeModal();
                });

                function closeModal() {
                  modal.style.display = 'none';
                }

                window.onclick = function(event) {
                  if (event.target === modal) { 
                    closeModal();
                  }
                };
              }


              function deleteSchedule(scheduleID) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                  if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
        

                      // You can also choose to refresh the page after successful deletion
                      window.location.reload();
                    } else {
                      // Handle the error case, e.g., display an error message
                      alert('Error deleting schedule');
                    }
                  }
                };

              xhr.open('POST', 'manageSchedule.php', true);
              xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
              xhr.send('schedule_id=' + encodeURIComponent(scheduleID) + '&deleteSchedule=1');
            }


            function openEditForm(eventDetails) {
                var editForm = document.querySelector('.form-box.edit');
                var formOverlay = document.querySelector('.form-overlay');
                var cancelEditButton = document.querySelector('#cancelEditButton');
                var editScheduleType = document.getElementById('schedule_type');

                // Show the edit form and overlay
                editForm.style.display = 'block';
                formOverlay.style.display = 'block';

                cancelEditButton.addEventListener('click', function() {
                  closeEditForm();
                });

                // Check event type and show/hide appropriate form controls
                var editSectionControl = document.querySelector('.form-box.edit #section-control');
                var editDescriptionControl = document.querySelector('.form-box.edit #description-control');

                // Set the selected schedule type
                editScheduleType.value = eventDetails.scheduleType;

                if (eventDetails.scheduleType === '1') {
                  editSectionControl.style.display = 'block';
                  editDescriptionControl.style.display = 'none';
                } else if (eventDetails.scheduleType === '2') {
                  editSectionControl.style.display = 'none';
                  editDescriptionControl.style.display = 'block';
                }

                // Populate the other form fields with the event details
                console.log(eventDetails);
                document.getElementById('modalid').value = eventDetails.scheduleID;
                document.getElementById('title').value = eventDetails.title;
                document.getElementById('instructor_id').value = eventDetails.instructorID;
                document.getElementById('description').value = eventDetails.description;
                document.getElementById('location').value = eventDetails.location;
                document.getElementById('schedule_type').value = eventDetails.scheduleType;
                // Populate other form fields as needed

                // Check schedule type and show/hide appropriate form sections
                var editRepeatingForm = document.querySelector('.form-box.edit .for-repeating');
                var editNonRepeatingForm = document.querySelector('.form-box.edit .for-nonrepeating');

                if (eventDetails.isRepeating === '1') {
                  editRepeatingForm.style.display = 'block';
                  editNonRepeatingForm.style.display = 'none';
                } else {
                  editRepeatingForm.style.display = 'none';
                  editNonRepeatingForm.style.display = 'block';
                }

                function closeEditForm() {
                  editForm.style.display = 'none';
                  formOverlay.style.display = 'none';
                }
              }




            // Get the schedule type select element
            const scheduleTypeSelect = document.getElementById('schedule_type');
            // Get the title and section form controls
            const descriptionControl = document.getElementById('description-control'); // Corrected ID spelling
            const sectionControl = document.getElementById('section-control');

            // Function to show/hide the title and section based on the selected schedule type
            function updateFormControls() {
              const selectedType = scheduleTypeSelect.value;
              if (selectedType === '1') {
                descriptionControl.style.display = 'none'; // Hide description
                sectionControl.style.display = 'block'; // Show section dropdown
              } else if (selectedType === '2') {
                descriptionControl.style.display = 'block'; // Show description
                sectionControl.style.display = 'none'; // Hide section dropdown
              }
            }

            // Add event listener to the schedule type select element
            scheduleTypeSelect.addEventListener('change', updateFormControls);

            // Initial form controls update
            updateFormControls();

            
            const isRepeatingCheckbox = document.getElementById('is_repeating_edit');
            const repeatingSection = document.querySelector('.for-repeating');
            const nonRepeatingSection = document.querySelector('.for-nonrepeating');

            // Function to toggle visibility of form sections
            function toggleFormSections() {
              if (isRepeatingCheckbox.checked) {
                repeatingSection.style.display = 'block';
                nonRepeatingSection.style.display = 'none';
              } else {
                repeatingSection.style.display = 'none';
                nonRepeatingSection.style.display = 'block';
              }
            }

            // Add event listener to the checkbox
            isRepeatingCheckbox.addEventListener('change', toggleFormSections);

            // Initial visibility based on checkbox state
            toggleFormSections();
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
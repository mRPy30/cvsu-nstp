<?php

include 'db_connect.php';
// Fetch course data from the database
$query = "SELECT id, instructorName FROM instructor";
$result = mysqli_query($conn, $query);
$instructor = mysqli_fetch_all($result, MYSQLI_ASSOC);
$query = "SELECT p.programID, p.programName, p.programLocation, p.description, p.instructorID, p.scheduleDate, p.start_time, p.end_time, i.instructorName
            FROM tbl_program p
            INNER JOIN instructor i ON p.instructorID = i.id";

$result = mysqli_query($conn, $query);

$programs = array(); // Initialize an empty array to store program details

if ($result && mysqli_num_rows($result) > 0) {
    while ($program = mysqli_fetch_assoc($result)) {
        // Retrieve the individual values
        $programID = $program['programID'];
        $programName = $program['programName'];
        $programLocation = $program['programLocation'];
        $description = $program['description'];
        $instructorID = $program['instructorID'];
        $scheduleDate = $program['scheduleDate'];
        $start_time = $program['start_time'];
        $end_time = $program['end_time'];
        $instructorName = $program['instructorName'];

        // Store the program details in the array
        $programs[] = array(
            'programID' => $programID,
            'programName' => $programName,
            'programLocation' => $programLocation,
            'description' => $description,
            'instructorID' => $instructorID,
            'scheduleDate' => $scheduleDate,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'instructorName' => $instructorName
        );
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS for topbar */
        .topbar {
            background-color: #6FBB76;
            color: #fff;
            padding: 20px;
        }

        .topbar .logout {
            float: right;
            color: #fff;
            text-decoration: none;
        }

        /* CSS for sidebar */
        .sidebar {
            background-color: #f1f1f1;
            float: left;
            width: 200px;
            height: 100vh;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px;
            background-color: #ddd;
            cursor: pointer;
        }

        .sidebar ul li:hover {
            background-color: #ccc;
        }

        /* CSS for content */
        .content {
            margin-left: 200px; /* Adjust this value to match the width of the sidebar */
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .records_box {
            height: 75px;
            width: 300px;
            border: solid black 1px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            padding: 10px;
            margin: 10px;
            border-radius: 12px;
            margin-top: 0;
        }

        h1 {
            margin: 0; /* Reset the margin for the h1 element */
            margin-left: 50px;
        }

        p {
            font-size: 20px;
            color: black;
            margin: 0; /* Reset the margin for the p element */
            margin-bottom: 10px;
        }

        .middlebox {
            padding: 5px;
            margin: 5px;
            width: 800px;
            height: 550px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-content: flex-start;
            margin-left: 200px;
            padding-top: 20px;
            margin-top: 20px;
        }

        .upperbox { 
            border-bottom: solid black 1px;
            height: 50px;
            width: 100%;
            display: flex;
            margin-bottom: 20px;
        }

        .upperbox h4 {
            margin-left: 15px;
        }
        
        .upperbox .go-back-button {
            margin-left: 850px;
            display: inline-block;
            padding: 10px 20px;
            height: 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }
        .middlebox {
            padding: 5px;
            margin: 5px;
            width: 1000px;
            height: 550px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-content: flex-start;
            margin-left: 70px;
            padding-top: 20px;
            margin-top: 20px;
            border: solid 1px black;
            justify-content: space-evenly;
        }
                 /* CSS styles for the table display */
                 .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            position
            
        }
        #course-table {
            width: 500px;
            margin: 10px;
            
        }
        
        #course-table th, #course-table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        
        #course-table th {
            text-align: left;
        }
        
        #course-table tbody tr:hover {
            background-color: #f5f5f5;
        }
        
        #course-table .edit-button, #course-table .delete-button {
            padding: 6px 10px;
            border: none;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }
        
        #course-table .edit-button {
            background-color: #2196F3;
            border-radius:4px;
        }
        
        #course-table .delete-button {
            background-color: #f44336;
            border-radius:4px;
        }

        .upperbox {
            border-bottom: solid black 1px;
            height: 50px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 5px;
        }

        .searchbox {
            display: flex;
            align-items: center;
            margin-left: auto; /* Adjust the margin as needed */
            margin-right: 20px; /* Adjust the margin as needed */
         
            
        }

        .searchbox input[type="text"] {
            width: 300px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            height: 25px;
           
        }

        .print button {
            background-color: white;
            border: 1px solid black;
            border-radius: 3px;
            padding: 5px 10px;
            color: black;
            cursor: pointer;
            height: 38px;
            margin-right: 15px;
        }

        .upperbox .go-back-button {
            padding: 10px 20px;
            height: 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }

        .upperbox .go-back-button:hover {
            background-color: #45a049;
        }

        .tabledisplay {
            width: 1000px;
            border: solid black 1px;
            display: flex;
            justify-content: center;
            overflow: hidden;
            margin: 10px;


        }

        #course-table {
            width: 90%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        #course-table th,
        #course-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        #course-table th {
            background-color: #f2f2f2;
        }

        .edit-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            border-radius: 3px;
        }

        .delete-button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            border-radius: 3px;
        }

       
        .lowerbox {
            width: 120px;
            margin-top: 500px; /* Adjust the margin-top value as needed */
            position: sticky;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 999;
        }
        /* CSS styles for the popup form */
        #add-sem-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }

        .form-container {
            width: 300px;
        }

        .form-container h4 {
            margin-top: 0;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .form-container button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            border-radius: 3px;
        }

        .form-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }
        
        @media print {
            .upperbox,
            .lowerbox,
            .searchbox
            .sidebar{
                display: none;
            }
        }

        #edit-section-popup .cancel-button {
            background-color: #ccc;
            color: #fff;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            margin-left: 70px;
        }

        #edit-section-popup .cancel-button:hover {
            background-color: #999;
        }

        #semester-table {
                    width: 500px;
                    margin: 10px;
                }

                #semester-table th,
                #semester-table td {
                    padding: 8px;
                    border-bottom: 1px solid #ddd;
                }

                #semester-table th {
                    text-align: left;
                }

                #semester-table tbody tr:hover {
                    background-color: #f5f5f5;
                }

                #semester-table .edit-button,
                #semester-table .delete-button {
                    padding: 6px 10px;
                    border: none;
                    background-color: #4CAF50;
                    color: #fff;
                    cursor: pointer;
                }

                #semester-table .edit-button {
                    background-color: #2196F3;
                    border-radius: 4px;
                }

                #semester-table .delete-button {
                    background-color: #f44336;
                    border-radius: 4px;
                }

                #edit-sem-popup .cancel-button{
                    width: 70px;
                    border: 1px solid black;
                    font-size: 14px;
                    border-radius: 5px;
                    padding: 8px;
                    display: block;
                    margin-top: 10px;
                    background-color: gray;
                }

                .form-control {
                margin-bottom: 18px;
                position: relative;
                }

                .adding-form {
                padding: 40px;
                width: 300px;

                }


                .form-control label {
                display: inline-block;
                margin-bottom: 10px;
                left: 0px;

                }

                .form-control input{
                width: 205px;
                border: 1px solid black;
                font-size: 14px;
                border-radius: 5px;
                padding: 12px;
                display: block;
                }
                .unique-input{
                
                }

                #programName {
                width: 200px;
                border: 1px solid black;
                font-size: 14px;
                border-radius: 5px;
                padding: 12px;
                display: block;
                }

                #programLocation {
                width: 200px;
                border: 1px solid black;
                font-size: 14px;
                border-radius: 5px;
                padding: 12px;
                display: block;
                }
                .form-control select{
                width: 300px;
                border: 1px solid black;
                font-size: 14px;
                border-radius: 5px;
                padding: 12px;
                display: block;
                }

                .form-control textarea {
                width: 200px;
                border: 1px solid black;
                font-size: 14px;
                border-radius: 5px;
                padding: 12px;
                display: block;
                }

                .form-control input:focus,
                .form-control select:focus,
                .form-control textarea:focus {
                border-color: #777;
                }

                .form-control select {
                width: 230px;
                }

                .form-control2 {
                margin-bottom: 10px;
                }

                h3 {
                margin: 0;
                }

                h5 {
                margin: 0;
                }

                h4 {
                margin: 10px;
                }

                .form-container {
                max-width: 230px;
                }

                .form-popup {
                display: none;
                position: fixed;

                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 100;
                }

                .form-container .form-container {
                max-width: 100%;
                }

                .form-popup .form-container {
                margin: 10% auto;
                background-color: #fefefe;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
                }

                .form-container h4 {
                margin: 0;
                text-align: center;
                }

                .form-container button[type="submit"] {
                background-color: #4CAF50;
                color: white;
                border: none;
                cursor: pointer;
                width: 100%;
                padding: 10px;
                margin-top: 10px;
                }

                .form-container button[type="submit"]:hover {
                background-color: #45a049;
                }

                .form-container .form-control:last-child {
                margin-bottom: 0;
                }

    </style>
</head>
<body>
    <!-- Topbar -->
    <div class="topbar">
        <a class="logout" href="log-in.php">Logout</a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul>
            <li><a href="adminpage.php">Home</a></li>
            <li><a href="records.php">Records</a></li>
            <li><a href="schedule.php">Schedule</a></li>
            <li><a href="programs.php">Programs</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="compliance.php">Compliance</a></li>
        </ul>
    </div>

    <!-- Main content -->
    <div class="content">

        <div class="upperbox">
            <h4>PROGRAMS</h4>
            <a href="programs.php" class="go-back-button">Go Back</a>
        </div>

        <div class="middlebox">

        

        <div class="tabledisplay">
            <table id="course-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Instructor</th>
                        <th>Date</th>
                        <th>start_time</th>
                        <th>end_time</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="scrollable-tbody">
                <?php
include 'db_connect.php';

$sql = "SELECT * FROM tbl_program";
$result_program = $conn->query($sql);

if ($result_program->num_rows > 0) {
    while ($row = $result_program->fetch_assoc()) {
        $title = $row["programName"];
        $programID = $row["programID"];
        $location = $row["programLocation"];
        $scheduleDate = $row["scheduleDate"];
        $start_time = $row["start_time"];
        $end_time = $row["end_time"];
        $description = $row["description"];

        $query = "SELECT i.instructorName
        FROM tbl_program p
        JOIN instructor i ON p.instructorID = i.id";
        $result_instructor = mysqli_query($conn, $query);

        if ($result_instructor) {
            // Fetch the row from the result
            $row_instructor = $result_instructor->fetch_assoc();

            // Store the instructor name in the variable
            $instructorName = $row_instructor["instructorName"];
        }

        $programs[] = array(
            'programID' => $programID,
            'programName' => $title,
            'programLocation' => $location,
            'description' => $description,
            'instructorName' => $instructorName,
            'scheduleDate' => $scheduleDate,
            'start_time' => $start_time,
            'end_time' => $end_time
        );

        ?>
        <script>
            var programs = <?php echo json_encode($programs); ?>;
        </script>
        <tr>
            <td><?php echo $title; ?></td>
            <td><?php echo $location; ?></td>
            <td><?php echo $description; ?></td>
            <td><?php echo $instructorName; ?></td>
            <td><?php echo $scheduleDate; ?></td>
            <td><?php echo $start_time; ?></td>
            <td><?php echo $start_time; ?></td>
            <td><button onclick="openEditForm('<?php echo $programID; ?>')" class="edit-button">Edit</button></td>
            <td><button class="delete-button" onclick="deleteSem(<?php echo $semesterID; ?>)">Delete</button></td>
        </tr>

        <?php
    }
} else {
    echo "<tr><td colspan='3'>No records found</td></tr>";
}
?>
                </tbody>
            </table>


            
        </div>









        </div>


        
        
        <!--------------------------------------  PARA SA ADDITION BUTTON --------------------------------------------->
        <div class="lowerbox">
            <button id="add-program-button" style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">Add Semester</button>
        </div>
    </div>





    <!----------------- POP UP FORM NG PAG ADD  -------------->

    <div id="add-program-popup" class="form-popup">
    <form method="post" class="form-container" id="add-program-form" action="manageProgram.php">
        <h4>Add Program</h4>

        <div class="form-control">
            <label for="programName">Title:</label>
            <input type="text" name="programName" id="programName" class="unique-input" placeholder="Enter Title">
        </div>

         <div class="form-control">
            <label for="programLocation">Location:</label>
            <input type="text" name="programLocation" id="programLocation" class="unique-input" placeholder="Enter Location">
        </div>

        <div class="form-control">
            <label for="description">Description:</label>
            <textarea name="description" rows="3" placeholder="Enter Description"></textarea>
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

          

        <div class="form-control">
            <label for="scheduleDate">Date:</label>
            <input type="date" name="scheduleDate">
        </div>

        <div class="form-control">
            <label for="start_time">Start Time:</label>
            <input type="time" name="start_time">
        </div>

        <div class="form-control">
            <label for="end_time">End Time:</label>
            <input type="time" name="end_time">
        </div>

        <button type="submit">Add Program</button>
    </form>
</div>

   
    <!----------------- POP UP FORM PARA SA PAG EDIT ------------->

      
 
<div id="edit-program-popup" class="form-popup" style="display: none;">
    <form method="post" class="edit-container" id="edit-program-form" action="manageProgram.php">
        <h4>Edit Program</h4>

        <div class="form-control">
            <label for="editProgramName">Title:</label>
            <input type="text" name="editProgramName" id="editProgramName" class="unique-input" placeholder="Enter Title">
        </div>

        <div class="form-control">
            <label for="editProgramLocation">Location:</label>
            <input type="text" name="editProgramLocation" id="editProgramLocation" class="unique-input" placeholder="Enter Location">
        </div>

        <div class="form-control">
            <label for="editDescription">Description:</label>
            <textarea name="editDescription" id="editDescription" rows="3" placeholder="Enter Description"></textarea>
        </div>

        <div class="form-control">
            <label for="editInstructor">Instructor:</label>
            <select name="editInstructor" id="editInstructor" class="custom-select">
                <?php foreach ($instructor as $row): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['instructorName']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-control">
            <label for="editScheduleDate">Date:</label>
            <input type="date" name="editScheduleDate" id="editScheduleDate">
        </div>

        <div class="form-control">
            <label for="editStartTime">Start Time:</label>
            <input type="time" name="editStartTime" id="editStartTime">
        </div>

        <div class="form-control">
            <label for="editEndTime">End Time:</label>
            <input type="time" name="editEndTime" id="editEndTime">
        </div>

        <button type="submit">Update Program</button>
    </form>
</div>


        <form id="deleteSemForm" action="manageSemester.php" method="post">
                <input type="hidden" name="semesterID" id="semesterIDInput">
                <input type="hidden" name="deleteSemester" value="1">
         </form>             








    
     <!---------------------------------     JAVASCRIPT CODE ------------------------------------------>
    <script>
 function openEditForm(programID) {
    var programDetails = programs.find(function(program) {
        return program.programID === programID;
    });

    if (programDetails) {
        document.getElementById("editProgramName").value = programDetails.programName;
        document.getElementById("editProgramLocation").value = programDetails.programLocation;
        document.getElementById("editDescription").value = programDetails.description;
        document.getElementById("editInstructor").value = programDetails.instructorName;
        document.getElementById("editScheduleDate").value = programDetails.scheduleDate;
        document.getElementById("editStartTime").value = programDetails.start_time;
        document.getElementById("editEndTime").value = programDetails.end_time;

        document.getElementById("edit-program-popup").style.display = "block";
    }
}
// Function to close the edit form
function closeEditForm() {
    document.getElementById("editForm").style.display = "none";
}

// Get the button elements for edit buttons
var editButtons = document.getElementsByClassName('edit-button');

// Add event listeners to each "Edit" button
Array.from(editButtons).forEach(function(editButton) {
    editButton.addEventListener('click', function(event) {
        var programID = event.target.getAttribute('programID');
        openEditForm(programID, <?php echo json_encode($programs); ?>);
    });
});

        // ---------------- JS PARA BUMUKAS YUNG POP UP FORM PARA SA PAG ADD NG BAGONG CLASS ---------------- //

                // Get the button element
                var addSemButton = document.getElementById('add-program-button');

                // Get the popup form element
                var addSemPopup = document.getElementById('add-program-popup');

                // Add an event listener to the button for the click event
                addSemButton.addEventListener('click', function(event) {    
                    event.preventDefault();
                    addSemPopup.style.display = 'block';
                });


    //--------------------------- DELETE CONFIRMATION PROMPT ------------------------------//
    // Delete confirmation prompt
    function deleteSem(semesterID) {
        if (confirm("Are you sure you want to delete this semester?")) {
            document.getElementById('semesterIDInput').value = semesterID;
            document.getElementById('deleteSemForm').submit();
        }
    }


    </script>











    </div>
        



    </script>
</body>
</html>

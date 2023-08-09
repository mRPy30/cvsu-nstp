<?php
include 'db_connect.php';

$programs = array(); // Initialize an empty array to store program details

$sql = "SELECT p.*, i.instructorName
        FROM tbl_program p
        JOIN instructor i ON p.instructorID = i.id";
$result_program = $conn->query($sql);

if ($result_program->num_rows > 0) {
    while ($row = $result_program->fetch_assoc()) {
        // Store the program details in the array
        $programs[] = array(
            'programID' => $row["programID"],
            'programName' => $row["programName"],
            'programLocation' => $row["programLocation"],
            'description' => $row["description"],
            'instructorID' => $row["instructorID"],
            'instructorName' => $row["instructorName"],
            'scheduleDate' => $row["scheduleDate"],
            'start_time' => $row["start_time"],
            'end_time' => $row["end_time"]
        );
    }
} else {
    echo "<tr><td colspan='9'>No records found</td></tr>";
}


$query = "SELECT id, instructorName FROM instructor";
$result = mysqli_query($conn, $query);
$instructors = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
                width: 150px;
                border: 1px solid black;
                font-size: 14px;
                border-radius: 5px;
                padding: 12px;
                display: block;
                }
                .unique-input{
                
                }

                #programName {
                width: 150px;
                border: 1px solid black;
                font-size: 14px;
                border-radius: 5px;
                padding: 12px;
                display: block;
                }

                #programLocation {
                width: 150px;
                border: 1px solid black;
                font-size: 14px;
                border-radius: 5px;
                padding: 12px;
                display: block;
                margin-bottom: 23px;
                }

                .form-control select{
                width: 178px;
                border: 1px solid black;
                font-size: 14px;
                border-radius: 5px;
                padding: 12px;
                display: block;
                }

                .form-control textarea {
                width: 150px;
                height: 113px;
                border: 1px solid black;
                font-size: 14px;
                border-radius: 5px;
                padding: 12px;
                display: block;
                }

                .form-control input:focus,
                .form-control select:focus,
                .form-control textarea:focus {
                border-color: black;
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
                max-width: 359px;
                border-radius: 10px;

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
                border: 1px solid black;
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
                width: 30%;
                padding: 10px;
                margin-top: 20px;
                border: solid 1px black;
                border-radius: 3px;
                margin-left: 139px;
                }

                .form-container button[type="button"] {
                background-color: white;
                color: black;
                border: none;
                cursor: pointer;
                width: 30%;
                padding: 10px;
                margin-top: 20px;
                border: solid 1px black;
                border-radius: 3px;
                
                }

                .form-container button[type="submit"]:hover {
                background-color: #45a049;
                }

                .form-container button[type="button"]:hover {
                background-color: gray;
                }

                .form-container .form-control:last-child {
                margin-bottom: 0;
                }

                .popup-box{
                
                 display: flex;
                 justify: space-evenly;
                }

                .first-column{
                    margin-right:10px;
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
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class="scrollable-tbody">
                <?php foreach ($programs as $program): ?>
                    <tr>
                        <td><?php echo $program['programName']; ?></td>
                        <td><?php echo $program['programLocation']; ?></td>
                        <td><?php echo $program['description']; ?></td>
                        <td><?php echo $program['instructorName']; ?></td>
                        <td><?php echo $program['scheduleDate']; ?></td>
                        <td><?php echo $program['start_time']; ?></td>
                        <td><?php echo $program['end_time']; ?></td>
                        <td><button class="edit-button" onclick="openEditForm(<?php echo $program['programID']; ?>)" data-program-id="<?php echo $program['programID']; ?>">Edit</button></td>
                        <td><button class="delete-button" onclick="deleteYear(<?php echo $program['programID']; ?>)">Delete</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>








        </div>


        
        
        <!--------------------------------------  PARA SA ADDITION BUTTON --------------------------------------------->
        <div class="lowerbox">
            <button id="add-program-button" style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">Add Program</button>
        </div>
    </div>





    <!----------------- POP UP FORM NG PAG ADD  -------------->

    <div id="add-program-popup" class="form-popup">
    <form method="post" class="form-container" id="add-program-form" action="manageProgram.php">
       
        <div class="popup-box">
        <div class="first-column">
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


        </div>

        <div class="second-column">

        <div class="form-control">
            <label for="instructor">Instructor</label>
            <br>
            <select name="instructor_id" id="instructor_id" class="custom-select">
                <?php foreach ($instructors as $row): ?>
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
        </div>

        </div>
        <button type="submit">Add Program</button>
        <button type="button" id="cancelButton">Cancel</button>
        
    </form>
</div>

   
    <!----------------- POP UP FORM PARA SA PAG EDIT ------------->

      
        <div id="edit-program-popup" class="form-popup">
        <form method="post" class="form-container" id="edit-program-form" action="manageProgram.php">
            <h4>Edit Program</h4>
            <div class="popup-box">

            <input type="hidden" name="updateProgramID" value="<?php echo $program['programID']; ?>">


                <div class="first-column">
                    <div class="form-control">
                        <label for="programName">Title:</label>
                        <input type="text" name="programName" id="program_Name" class="unique-input" placeholder="Enter Title">
                    </div>

                    <div class="form-control">
                        <label for="programLocation">Location:</label>
                        <input type="text" name="programLocation" id="program_Location" class="unique-input" placeholder="Enter Location">
                    </div>

                    <div class="form-control">
                        <label for="description">Description:</label>
                        <textarea name="description"  id="description" rows="3" placeholder="Enter Description"></textarea>
                    </div>
                </div>

                <div class="second-column">

                <div class="form-control">
                    <label for="instructor_id">Instructor</label>
                    <br>
                    <select name="instructor_id" id="instructorName" class="custom-select">
                        <?php foreach ($instructors as $instructor): ?>
                            <option value="<?php echo $instructor['id']; ?>" <?php if ($instructor['id'] === $program['instructorID']) echo 'selected'; ?>>
                                <?php echo $instructor['instructorName']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                    <div class="form-control">
                        <label for="scheduleDate">Date:</label>
                        <input type="date"  id="scheduleDate" name="scheduleDate">
                    </div>

                    <div class="form-control">
                        <label for="start_time">Start Time:</label>
                        <input type="time" id="start_time" name="start_time">
                    </div>

                    <div class="form-control">
                        <label for="end_time">End Time:</label>
                        <input type="time" id="end_time" name="end_time">
                    </div>
                </div>
            </div>
            <button type="submit">Update Program</button>
            <button type="button" id="cancelEditButton">Cancel</button>
        </form>
    </div>

        <form id="deleteProgramForm" action="manageProgram.php" method="post">
                <input type="hidden" name="programID" id="programIDInput">
                <input type="hidden" name="deleteProgram" value="1">
         </form>             








    
     <!---------------------------------     JAVASCRIPT CODE ------------------------------------------>
    <script>

    document.addEventListener("DOMContentLoaded", function () {
            // Event listener for all "Edit" buttons with class "edit-button"
    document.querySelectorAll(".edit-button").forEach(function (button) {
      button.addEventListener("click", function () {
        // Extract the programID from the data attribute
        var programID = button.dataset.programId;

        // Call the openEditForm function with the programID
        openEditForm(programID);
      });
    });

    function openEditForm(programID) {
        var programs = <?php echo json_encode($programs); ?>;
        var program = programs.find(function(p) {
            return p.programID === programID;
        });

        if (program) {
            console.log("Found element: ", document.getElementById("description"));
            console.log("Found element: ", document.getElementById("scheduleDate"));
            console.log(program.programName);
            console.log(program);

            document.getElementById("program_Name").value = program.programName;
            document.getElementById("program_Location").value = program.programLocation;
            document.getElementById("description").textContent = program.description;
            document.getElementById("instructorName").value = program.instructorID;
            document.getElementById("scheduleDate").value = program.scheduleDate;
            document.getElementById("start_time").value = program.start_time;
            document.getElementById("end_time").value = program.end_time;

            document.getElementById("edit-program-popup").style.display = "block";
        }
    }

  // Update the event listener for the "Cancel" button
  document.getElementById("cancelEditButton").addEventListener("click", closeEditForm);

function closeEditForm() {
    var editProgramPopup = document.getElementById("edit-program-popup");
    editProgramPopup.style.display = "none";
}

});

   
        // ---------------- JS PARA BUMUKAS YUNG POP UP FORM PARA SA PAG ADD NG BAGONG PROGRAM ---------------- //

                // Get the button element
                var addSemButton = document.getElementById('add-program-button');

                // Get the popup form element
                var addSemPopup = document.getElementById('add-program-popup');

                // Add an event listener to the button for the click event
                addSemButton.addEventListener('click', function(event) {    
                    event.preventDefault();
                    addSemPopup.style.display = 'block';
                });

                function closeModal() {
                    var popup = document.getElementById("add-program-popup");
                    popup.style.display = "none";
                }

                // Wait for the DOM to be ready
                document.addEventListener("DOMContentLoaded", function () {
                    // Get the cancel button element
                    var cancelButton = document.getElementById("cancelButton");

                    // Add a click event listener to the cancel button
                    cancelButton.addEventListener("click", function () {
                        closeModal();
                    });
                });

    //--------------------------- DELETE CONFIRMATION PROMPT ------------------------------//
    // Delete confirmation prompt
    function deleteYear(programID) {
    if (confirm("Are you sure you want to delete this program?")) {
        document.getElementById('programIDInput').value = programID;
        document.getElementById('deleteProgramForm').submit();
    }
}


    </script>











    </div>
        



    </script>
</body>
</html>

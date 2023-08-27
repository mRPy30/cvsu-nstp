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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----------TITLE------------>
    <link rel="shortcut icon" href="logo.png" type="">
    <title>
        <?php echo "Coordinator Page"; ?>
    </title>

    <!----------CSS------------>
    <link rel="stylesheet" href="style_admin.css">

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




    <!---Inner topbar--->
    <?php include('topbar.php'); ?>

</head>

<!----Body----->

<body>
    <section class="bg-section">
        <!---------Sidebar------------>
        <?php include('sidebar-admin.php'); ?>

        <!--Main Content-->
        <main class="pcoded-main-content">
            <div class="container">
                <div class="col-lg-12">
                    <div class="rec-content">
                        <!-- Add your main content here -->
                        <div class="upperbox">
                            <h4> PROGRAMS </h4>
                        </div>
                        <div class="add-box">
                            <button id="add-program-button">Add
                                Program</button>
                        </div>
                        <div class="align-tbl-programs">
                            <div class="tabledisplay-program">
                                <table id="program-table">
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
                                                <td>
                                                    <?php echo $program['programName']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $program['programLocation']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $program['description']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $program['instructorName']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $program['scheduleDate']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $program['start_time']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $program['end_time']; ?>
                                                </td>
                                                <td><button class="edit-button"
                                                        onclick="openEditForm(<?php echo $program['programID']; ?>)"
                                                        data-program-id="<?php echo $program['programID']; ?>">Edit</button>
                                                </td>
                                                <td><button class="delete-button"
                                                        onclick="deleteYear(<?php echo $program['programID']; ?>)">Delete</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




                    <!--------------------------------------  PARA SA ADDITION BUTTON --------------------------------------------->

                </div>
            </div>
            </div>
            </div>
        </main>
    </section>



    <!----------------- POP UP FORM NG PAG ADD  -------------->

    <div id="add-program-popup" class="form-popup">
    <form method="post" class="form-container" id="add-program-form" action="manageProgram.php">

            <div class="popup-box">
                <div class="first-column">
                    <div class="form-control">
                        <label for="programName">Title:</label>
                        <input type="text" name="programName" id="programName" class="unique-input"
                            placeholder="Enter Title">
                    </div>

                    <div class="form-control">
                        <label for="programLocation">Location:</label>
                        <input type="text" name="programLocation" id="programLocation" class="unique-input"
                            placeholder="Enter Location">
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
            <button type="submit" name="addProgram">Add Program</button>
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
                        <input type="text" name="programName" id="program_Name" class="unique-input"
                            placeholder="Enter Title">
                    </div>

                    <div class="form-control">
                        <label for="programLocation">Location:</label>
                        <input type="text" name="programLocation" id="program_Location" class="unique-input"
                            placeholder="Enter Location">
                    </div>

                    <div class="form-control">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" rows="3"
                            placeholder="Enter Description"></textarea>
                    </div>
                </div>

                <div class="second-column">

                    <div class="form-control">
                        <label for="instructor_id">Instructor</label>
                        <br>
                        <select name="instructor_id" id="instructorName" class="custom-select">
                            <?php foreach ($instructors as $instructor): ?>
                            <option value="<?php echo $instructor['id']; ?>" <?php if ($instructor['id'] === $program['instructorID'])
                                   echo 'selected'; ?>>
                                <?php echo $instructor['instructorName']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-control">
                        <label for="scheduleDate">Date:</label>
                        <input type="date" id="scheduleDate" name="scheduleDate">
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
            <<button type="submit" name="updateProgram">Update Program</button>
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
                var program = programs.find(function (p) {
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
        addSemButton.addEventListener('click', function (event) {
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
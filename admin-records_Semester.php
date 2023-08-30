
<?php

include 'db_connect.php';

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
            <div class="container">
                <div class="col-lg-12">
    <div class="rec-content print-container">
    
    <!-------------------------------------- UPPER PART NG PAGE --------------------------------------------->
    
        <div class="upperbox">
            <h3>Semester List</h3>
            <a href="admin-records.php" class="go-back-button"><ion-icon
                                    name="arrow-back-circle-outline"></ion-icon></a>
        </div>

       <!--------------------------------------  PARA SA ADDITION BUTTON --------------------------------------------->
       <div class="add-box">
            <button id="add-sem-button">Add Semester</button>
        </div>
         <!--------------------------------------TABLE NG CLASSES --------------------------------------------->
        <div class="align-tbl-year">
            <div class="table-year-display">
            <table id="course-table">
                <thead>
                    <tr>
                        <th>Semester</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="scrollable-tbody">
                    <?php
                        $sql = "SELECT * FROM tbl_semester";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $semester = $row["semesterName"];
                                $semesterID = $row["semesterID"];
                                ?>
                               <tr>
                                    <td data-semester="<?php echo $semesterID; ?>"><?php echo $semester; ?></td>
                                    <td><button onclick="editSemester('<?php echo $semesterID; ?>')" class="edit-button">Edit</button></td>
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


        <div class="table-year-display">
            <table id="semester-table">
                <thead>
                    <tr>
                        <th>Semester</th>
                        <th>Default</th>
                        <th>Set Default</th>
                    </tr>
                </thead>
                <tbody class="scrollable-tbody">
    <?php
    $sql = "SELECT * FROM tbl_semester";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $semester = $row["semesterName"];
            $semesterID = $row["semesterID"];
            $isDefault = $row["isDefault"];

            // Check if the semester is the current default semester
            if ($isDefault) {
                $currentDefaultID = $semesterID;
            }

            ?>
            <tr>
                <td><?php echo $semester; ?></td>
                <td><?php echo ($isDefault) ? 'Yes' : 'No'; ?></td>
                <td>
                    <?php if (!$isDefault) { ?>
                        <form method="POST" action="setDefaultSem.php">
                            <input type="hidden" name="semesterID" value="<?php echo $semesterID; ?>">
                            <button type="submit">Set as Default</button>
                        </form>
                    <?php } ?>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='3'>No records found</td></tr>";
    }
    ?>
</tbody>
                </tbody>
            </table>
        </div>
    </div>
                </div>
    </div>
            </div>
        </main>




    <!----------------- POP UP FORM NG PAG ADD NG BAGONG CLASS -------------->

        <div id="add-sem-popup" class="form-popup">
            <form method="post" class="form-container" id="add-sem-form" action="manageSemester.php">
                <h4>Add Class</h4>
                <label for="add-semester-name">Section Name:</label>
                <input type="text" name="semesterName" placeholder="Enter Semester name">
                <button type="submit">Add Semester</button>
            </form>
        </div>

   
    <!----------------- POP UP FORM PARA SA PAG EDIT NG ISANG CLASS -------------->

        <div id="edit-sem-popup" class="form-popup">
            <form method="post" class="form-container" id="edit-sem-form" action="admin-records_manageSemester.php">
                <h4>Edit Sem</h4>
                <input type="hidden" name="semesterID" id="edit-semesterID">
                <label for="edit-semesterName">Semester Name:</label>
                <input type="text" id="edit-semesterName" name="semesterName" required>
                <br><br>
                <div style="display: flex; justify-content: right;">
                <button type="submit">Update Section</button>
                <button type="button" class="cancel-button">Cancel</button>
                </div>
            </form>
        </div>

       
            
        <form id="deleteSemForm" action="admin-records_manageSemester.php" method="post">
                <input type="hidden" name="semesterID" id="semesterIDInput">
                <input type="hidden" name="deleteSemester" value="1">
         </form>             








    
     <!---------------------------------     JAVASCRIPT CODE ------------------------------------------>
    <script>

            // ---------------- JS PARA BUMUKAS YUNG POP UP FORM PARA SA PAG EDIT ---------------- //

            function editSemester(semesterID) {
                // Get the edit form elements
                var editSemPopup = document.getElementById('edit-sem-popup');
                var editSemForm = document.getElementById('edit-sem-form');
                var editSemesterID = document.getElementById('edit-semesterID');
                var editSemesterName = document.getElementById('edit-semesterName');

                // Set the semesterID value in the form
                editSemesterID.value = semesterID;

                // Get the current semester name from the table cell
                var semesterName = document.querySelector('td[data-semester="' + semesterID + '"]').textContent;

                // Set the current semester name in the form
                editSemesterName.value = semesterName;

                // Show the edit form
                editSemPopup.style.display = 'block';
            }

                 // Close the pop-up form
                function closeForm() {
                    document.getElementById("edit-sem-popup").style.display = 'none';
                }

                
                // Close the edit section pop-up form when the cancel button is clicked
                document.querySelector('#edit-sem-popup .cancel-button').addEventListener('click', () => {
                        document.getElementById('edit-sem-popup').style.display = 'none';
                    });





        // ---------------- JS PARA BUMUKAS YUNG POP UP FORM PARA SA PAG ADD NG BAGONG CLASS ---------------- //

                // Get the button element
                var addSemButton = document.getElementById('add-sem-button');

                // Get the popup form element
                var addSemPopup = document.getElementById('add-sem-popup');

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
</body>
</html>
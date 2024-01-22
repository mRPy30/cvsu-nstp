<?php
include 'db_connect.php';
session_start();

$selectedCourseID = "";
$selectedCourseName = "";

if (isset($_GET['courseID']) && isset($_GET['courseName'])) {
    $selectedCourseID = $_GET['courseID'];
    $selectedCourseName = $_GET['courseName'];

    $_SESSION['selectedCourseID'] = $selectedCourseID;
    $_SESSION['selectedCourseName'] = $selectedCourseName;
} elseif (isset($_SESSION['selectedCourseID']) && isset($_SESSION['selectedCourseName'])) {
    $selectedCourseID = $_SESSION['selectedCourseID'];
    $selectedCourseName = $_SESSION['selectedCourseName'];
}


$query = "SELECT sectionName FROM tbl_sections WHERE courseID = $selectedCourseID";
$sectionResult = mysqli_query($conn, $query);

$sections = array(); // Initialize an empty array to store sections

if ($sectionResult && mysqli_num_rows($sectionResult) > 0) {
    while ($section = mysqli_fetch_assoc($sectionResult)) {
        $sections[] = $section; 
    }
}

$query = "SELECT instructor.instructorImage, instructor.instructorName, instructor.id, tbl_sections.sectionName
            FROM instructor
            INNER JOIN tbl_course ON instructor.courseID = tbl_course.courseID
            INNER JOIN tbl_sections ON instructor.sectionID = tbl_sections.sectionID
            WHERE instructor.courseID = $selectedCourseID;";

$result = mysqli_query($conn, $query);
    
$instructors = array(); // Initialize an empty array to store instructor details

if ($result && mysqli_num_rows($result) > 0) {
    while ($instructor = mysqli_fetch_assoc($result)) {
        // Retrieve the individual values
        $instructorImage = $instructor['instructorImage'];
        $instructorName = $instructor['instructorName'];
        $sectionName = $instructor['sectionName'];
        $instructorID = $instructor['id'];

        // Store the instructor details in the array
        $instructors[] = array(
            'instructorImage' => $instructorImage,
            'instructorName' => $instructorName,
            'sectionName' => $sectionName,
            'instructorID' => $instructorID
        );
    }
}
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

                        <div class="upperbox">
                            <h3><?php echo $selectedCourseName; ?></h3>
                                <div class="searchbox">
                                    <i class="fa-solid fa-magnifying-glass"></i><input  type="text" class="form-control" aria-label="Text input with checkbox" id="searchInput" onkeyup="searchTable()" placeholder="Search section names...">
                                </div>

                                <div class="print">
                                    <i class="fa-solid fa-print" onclick="window.print()"></i>
                                </div>
                            <a href="admin-records_Instructor.php" class="go-back-button"><ion-icon name="arrow-back-circle-outline"></ion-icon></a>
                        </div>

                        <div class="add-box">
                            <button class="add-button" id="addInstructorButton">Add Instructor</button>
                        </div>
                        
                        <div class="align-tbl-instructor">
                            <div class="table-list-display">
                                <div class="course">
                                    <p><?php echo $selectedCourseName . ' <span>Instructors</span>' ; ?></p>
                                </div>

                                <?php if (!empty($instructors)): ?>
                                <table id="instructor-table">
                                    <thead>
                                        <tr>
                                            <th>Instructor Image</th>
                                            <th>Instructor ID</th>
                                            <th>Instructor</th>
                                            <th>Class Handled</th>
                                            <th class="col-2" colspan="2">Modify</th>
                                        </tr>   
                                    </thead>
                                    <tbody>
                                        <?php foreach ($instructors as $i   Instructor): ?>
                                            <tr>
                                    
                                            <td>
                                                <div class="image-container">
                                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($instructor['instructorImage']); ?>" alt="Instructor Image">
                                                </div>
                                            </td>
                                                <td><?php echo $instructor['instructorID']; ?></td>
                                                <td><?php echo $instructor['instructorName']; ?></td>
                                                <td><?php echo $instructor['sectionName']; ?></td>
                                                

                                                <td><button class="edit-button" onclick="openEditForm(<?php echo $instructor['instructorID']; ?>)" instructorID="<?php echo $instructor['instructorID']; ?>">Edit</button></td>
                                                <td><button class="delete-button" onclick="deleteInstructor(<?php echo $instructor['instructorID']; ?>)">Delete</button></td>
                                                    
                                            </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p class="p1">No instructors found with the provided course ID.</p>
                            <?php endif; ?>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </main>
    
    <!--pop up form for editting the instructor details-->

        <!-- Add instructor form (hidden by default) -->
        <div id="addForm" class="form-popup">
            <form action="admin-records_manageInstructor.php" method="POST" class="form-container" enctype="multipart/form-data">
                <h2>Add Instructor</h2>

                
                <label for="instructorImage"><b>Instructor Image</b></label>
                <input type="file" name="instructorImage" accept="image/*" required>

                <label for="instructorID"><b>Instructor ID</b></label>
                <input type="text" placeholder="Enter Instructor ID" name="instructorID" required>

                <label for="instructorName"><b>Instructor Name</b></label>
                <input type="text" placeholder="Enter Instructor Name" name="instructorName" required>

                <label for="sectionName"><b>Section Name</b></label>
                    <select type="select" name="sectionName" required>
                    <?php foreach ($sections as $section): ?>
                        <option value="<?php echo $section['sectionName']; ?>"><?php echo $section['sectionName']; ?></option>
                    <?php endforeach; ?>
                    </select>

                <label for="password"><b>Password</b></label>
                <input type="text" placeholder="Enter password" name="password" required>
                

                <button type="submit" class="btn" onclick="closeAddForm()">Add</button>
                <button type="button" class="btn cancel" onclick="closeAddForm()">Cancel</button>
         </form>
    </div>


<!-- Edit instructor form (hidden by default) -->
<div id="editForm" class="form-popup">
  <form action="admin-records_manageInstructor.php" method="POST" class="form-container" enctype="multipart/form-data">
    <h2>Edit Instructor</h2>

    <label for="instructorImage"><b>Instructor Image</b></label>
    <input type="file" name="instructorImage" accept="image/*">

    <label for="instructorID"><b>Instructor ID</b></label>
    <input type="text" placeholder="Enter Instructor ID" name="instructorID" id="instructorID" required>

    <label for="instructorName"><b>Instructor Name</b></label>
    <input type="text" placeholder="Enter Instructor Name" name="instructorName" id="instructorName" required>

    <label for="sectionName"><b>Section Name</b></label>
    <select name="sectionName" id="sectionName" required>
      <?php foreach ($sections as $section): ?>
        <option value="<?php echo $section['sectionName']; ?>">
          <?php echo $section['sectionName']; ?>
        </option>
      <?php endforeach; ?>
    </select>

    <label for="password"><b>Password</b></label>
    <input type="text" placeholder="Enter password" name="password" required>
    
    <br> <br>

    <button type="submit" class="btn" name="updateInstructor">Update</button>
    <button type="button" class="btn cancel" onclick="closeEditForm()">Cancel</button>
  </form>
</div>


<form id="deleteInstructorForm" action="admin-records_manageInstructor.php" method="post">
    <input type="hidden" name="instructorID" id="instructorIDInput">
    <input type="hidden" name="deleteInstructor" value="1">
</form>
<!-----End Main content------>        
        
<!-----End of Body------>
</section>

    <script>
        // ---------------------------------- adding instructor open js -------------------------------- //
        
        
                // Get the button element
                var addInstructorButton = document.getElementById('addInstructorButton');

                // Get the popup form element
                var addInstructorForm = document.getElementById('addForm');

                // Add an event listener to the button for the click event
                addInstructorButton.addEventListener('click', function(event) {
                // Prevent the default form submission behavior
                event.preventDefault();

                // Show the popup form
                addInstructorForm.style.display = 'block';
                });


                // Function to close the pop-up form
                function closeAddForm() {
                document.getElementById("addForm").style.display = "none";
                }

         // ------------------------- OPENING EDITING FORM --------------------------------//



            function openEditForm(instructorID) {
            var instructors = <?php echo json_encode($instructors); ?>;
            var instructorDetails = instructors.find(function (i) {
            return i.instructorID === instructorID;
            });

            if (instructorDetails) {
            document.getElementById("instructorID").value = instructorDetails.instructorID;
            document.getElementById("instructorName").value = instructorDetails.instructorName;
            document.getElementById("sectionName").value = instructorDetails.sectionName;
            // Populate other form fields as needed

            document.getElementById("editForm").style.display = "block";
                }
            }

            // Function to close the edit form
            function closeEditForm() {
                document.getElementById("editForm").style.display = "none";
            }

            // Get the button elements for edit buttons
            var editButtons = document.getElementsByClassName('edit-button');

            // Add event listeners to each "Edit" button
            Array.from(editButtons).forEach(function (editButton) {
                editButton.addEventListener('click', function (event) {
                var instructorID = event.target.getAttribute('instructorID');
                openEditForm(instructorID);
                });
            });


            
            
            function deleteInstructor(instructorID) {
                    if (confirm("Are you sure you want to delete this Instructor?")) {
                        document.getElementById('instructorIDInput').value = instructorID;
                        document.getElementById('deleteInstructorForm').submit();
                    }
                }












        // ------------ Search function for filtering the table ---------------------------- //
        
        function searchTable() {
            var input, filter, table, tbody, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("instructor-table");
            tbody = table.getElementsByTagName("tbody")[0];
            tr = tbody.getElementsByTagName("tr");

            // Loop through all table rows and hide those that don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Assuming the instructor name is in the second column

                if (td) {
                    txtValue = td.textContent || td.innerText;

                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }


         // ---------------------- Print function ---------------------------- //
         function printPage() {
            // Hide the unnecessary elements
            var elementsToHide = document.querySelectorAll('.upperbox, .lowerbox, .searchbox');
            for (var i = 0; i < elementsToHide.length; i++) {
                elementsToHide[i].style.display = 'none';
            }

            // Print the page
            window.print();

            // Show the hidden elements after printing
            for (var i = 0; i < elementsToHide.length; i++) {
                elementsToHide[i].style.display = '';
            }
        }
    </script>
</body>
</html>    



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

$sql = "SELECT * FROM tbl_sections WHERE courseID = '$selectedCourseID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sections = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $sections = array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----------TITLE------------>
    <link rel="shortcut icon" href="logo.png" type="">
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

<body>
    <!----Body----->
<section class="bg-section">
   <!---------Sidebar------------>
        <?php include('sidebar-admin.php');?>

        <!--Main Content-->
            <main class="pcoded-main-content">
                <div class="container">
                    <div class="col-lg-12">
                        <div class="rec-content print-container">
                    
                    <!-------------------------------------- UPPER PART PAGE --------------------------------------------->
                    
                    <div class="upperbox">
                            <h3><?php echo $selectedCourseName; ?></h3>
                            <div class="searchbox">
                            <i class="fa-solid fa-magnifying-glass"></i><input  type="text" class="form-control" aria-label="Text input with checkbox" id="searchInput" onkeyup="searchTable()" placeholder="Search section names...">
                            </div>
                            <div class="print">
                            <i class="fa-solid fa-print" onclick="window.print()"></i>
                            </div>
                            <a href="admin-records_Classes.php" class="go-back-button"><ion-icon name="arrow-back-circle-outline"></ion-icon></a>
                        </div>
                    
                    <!-------------------------------------- ADDITION BUTTON --------------------------------------------->
                    <div class="add-box">
                                <button id="add-course-button" class="btn">Add Section</button>
                            </div>

                        <!--------------------------------------TABLE CLASSES --------------------------------------------->
                        <div class="align-tbl">
                            <div class="tabledisplay">
                                <table id="course-table">
                                    <thead>
                                        <tr>
                                            <th>Section Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class="scrollable-tbody">
                                                <?php if (!empty($sections)): ?>
                                                    <?php foreach ($sections as $section): ?>
                                                        <tr>
                                                            <td><?php echo $section['sectionName']; ?></td>
                                                            <td>
                                                                <button onclick="openForm('<?php echo $section['sectionID']; ?>')" class="edit-button">Edit</button>
                                                            </td>
                                                            <td>
                                                                <a href="admin-records_manageClass.php?delete=<?php echo $section['sectionID']; ?>&courseID=<?php echo $selectedCourseID; ?>&courseName=<?php echo $selectedCourseName; ?>" class="delete-button">Delete</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                            <tr>
                                                <td colspan="3">No sections found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                            
                            
                        </div>
                    </div>
                </main>    





                    <!----------------- POP UP FORM ADDING CLASS -------------->

                        <div id="add-section-popup" class="form-popup">
                            <form method="post" class="form-container" id="add-section-form" action="admin-records_manageClass.php">
                                <h4>Add Class</h4>
                                <label for="add-sectionName">Section Name:</label>

                                <input type="text" name="sectionName" placeholder="Enter section name">

                                <label for="instructor"><b>Instructor:</b></label>
                                <select name="sectionName" required>
                                    <option>
                                        
                                    </option>
                                </select>
                                
                                <label for="room"><b>Room:</b></label>
                                <input type="text" placeholder="Enter Room No." name="room">

                                <button type="submit">Add Class</button>
                                <button type="button" class="cancel-button">Cancel</button>
                            </form>
                        </div>

                
                    <!----------------- POP UP FORM PARA SA PAG EDIT NG ISANG CLASS -------------->

                        <div id="edit-section-popup" class="form-popup">
                            <form method="post" class="form-container" id="edit-section-form" action="admin-records_manageClass.php">
                                <h4>Edit Course</h4>
                                <input type="hidden" name="sectionID" id="edit-sectionID">
                                <label for="edit-sectionName">Section Name:</label>
                                <input type="text" id="edit-sectionName" name="sectionName" required>
                                <br><br>
                                <button type="submit">Update Section</button>
                                <button type="button" class="cancel-button">Cancel</button>
                            </form>
                        </div>
                    










    
     <!---------------------------------     JAVASCRIPT CODE ------------------------------------------>
    <script>

            // ---------------- JS PARA BUMUKAS YUNG POP UP FORM PARA SA PAG EDIT ---------------- //

        function openForm(sectionID) {
            var section = <?php echo json_encode($sections); ?>;
            var sectionDetails = section.find(s => s.sectionID === sectionID);

            if (sectionDetails) {
                document.getElementById("edit-sectionID").value = sectionDetails.sectionID;
                document.getElementById("edit-sectionName").value = sectionDetails.sectionName;
                document.getElementById("edit-section-popup").style.display = 'block';
            }
        }

        // Close the pop-up form
        function closeForm() {
            document.getElementById("edit-section-popup").style.display = 'none';
        }

        
        // Close the edit section pop-up form when the cancel button is clicked
        document.querySelector('#edit-section-popup .cancel-button').addEventListener('click', () => {
                document.getElementById('edit-section-popup').style.display = 'none';
            });











        // ---------------- JS PARA BUMUKAS YUNG POP UP FORM PARA SA PAG ADD NG BAGONG CLASS ---------------- //

        // Get the button element
        var addCourseButton = document.getElementById('add-course-button');

        // Get the popup form element
        var editCoursePopup = document.getElementById('add-section-popup');
        

        // Add an event listener to the button for the click event
        addCourseButton.addEventListener('click', function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            // Show the popup form
            editCoursePopup.style.display = 'block';
        
         // Close the pop-up form
         function closeForm() {
            document.getElementById("edit-section-popup").style.display = 'none';
        }

        
        // Close the add section pop-up form when the cancel button is clicked
        document.querySelector('#add-section-popup .cancel-button').addEventListener('click', () => {
                document.getElementById('add-section-popup').style.display = 'none';
            });

        });



        // --------------------------------- JS PARA SA PAG SEARCH  ------------------------------- //

        function searchTable() {
            var input, filter, table, tbody, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("course-table");
            tbody = table.getElementsByTagName("tbody")[0];
            tr = tbody.getElementsByTagName("tr");

            // Loop through all table rows and hide those that don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0]; // Assuming the section name is in the first column

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

        // --------------------------------- JS PARA SA PAG PRINT  ------------------------------- //
        
        // Print function
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
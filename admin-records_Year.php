
<?php
include 'db_connect.php';

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

            <h3>Year List</h3>
            
       
            <a href="admin-records.php" class="go-back-button"><ion-icon
                                    name="arrow-back-circle-outline"></ion-icon></a>

     
        </div>
         <!--------------------------------------  PARA SA ADDITION BUTTON --------------------------------------------->
         <div class="add-box">
            <button id="add-year-button">Add Year</button>
        </div>
       
         <!--------------------------------------TABLE NG CLASSES --------------------------------------------->
        <div class="align-tbl-year">
        <div class="table-year-display">
            <table id="course-table">
                <thead>
                    <tr>
                        <th>School Year</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="scrollable-tbody">
                    <?php
                        $sql = "SELECT * FROM tbl_year";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $schoolyear = $row["yearName"];
                                $yearID = $row["yearID"];
                                ?>
                        <tr>
                            <td data-year="<?php echo $yearID; ?>"><?php echo $schoolyear; ?></td>
                            <td><button onclick="editYear('<?php echo $yearID; ?>')" class="edit-button">Edit</button></td>
                            <td><button class="delete-button" onclick="deleteYear(<?php echo $yearID; ?>)">Delete</button></td>  
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
                        <th>Year</th>
                        <th>Default</th>
                        <th>Set Default</th>
                    </tr>
                </thead>
                <tbody class="scrollable-tbody">
                    <?php
                    $sql = "SELECT * FROM tbl_year";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $yearName = $row["yearName"];
                            $yearID = $row["yearID"];
                            $isDefault = $row["isDefault"];
                            ?>
                            <tr>
                                <td><?php echo $yearName; ?></td>
                                <td><?php echo ($isDefault) ? 'Yes' : 'No'; ?></td>
                                <td>
                                    <?php if (!$isDefault) { ?>
                                        <form method="POST" action="setDefaultYear.php">
                                            <input type="hidden" name="yearID" value="<?php echo $yearID; ?>">
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
            </table>
        </div>
        </div>
        
    </div>
                </div>
            </div>
        </main>
     <!-----End Main content------>        
        





        
       
        





    <!----------------- POP UP FORM NG PAG ADD NG BAGONG CLASS -------------->

        <div id="add-year-popup" class="form-popup">
            <form method="post" class="form-container" id="add-year-form" action="admin-records_manageYear.php">
                <h4>Add School Year</h4>
                <input type="text" name="yearName" placeholder="Enter Year">
                <button type="submit">Add Year</button>
            </form>
        </div>

   
    <!----------------- POP UP FORM PARA SA PAG EDIT NG ISANG CLASS -------------->

        <div id="edit-year-popup" class="form-popup">
            <form method="post" class="form-container" id="edit-year-form" action="admin-records_manageYear.php">
                <h4>Edit Year</h4>
                <input type="hidden" name="yearID" id="edit-yearID">
                <label for="edit-yearName">Semester Name:</label>
                <input type="text" id="edit-yearName" name="yearName" required>
                <br><br>
                <div style="display: flex; justify-content: right;">
                <button type="submit">Update Section</button>
                <button type="button" class="cancel-button">Cancel</button>
                </div>
            </form>
        </div>
                    
       
            
        <form id="deleteYearForm" action="admin-records_manageYear.php" method="post">
                <input type="hidden" name="yearID" id="yearIDInput">
                <input type="hidden" name="deleteYear" value="1">
         </form>             







<!-----End of Body------>
</section>
    
     <!---------------------------------     JAVASCRIPT CODE ------------------------------------------>
    <script>

            // ---------------- JS PARA BUMUKAS YUNG POP UP FORM PARA SA PAG EDIT ---------------- //

            function editYear(yearID) {
                // Get the edit form elements
                var editYearPopup = document.getElementById('edit-year-popup');
                var editYearForm = document.getElementById('edit-year-form');
                var editYearID = document.getElementById('edit-yearID');
                var editYearName = document.getElementById('edit-yearName');

                // Set the yearID value in the form
                editYearID.value = yearID;

                // Get the current year name from the table cell
                var yearName = document.querySelector('td[data-year="' + yearID + '"]').textContent;

                // Set the current year name in the form
                editYearName.value = yearName;

                // Show the edit form
                editYearPopup.style.display = 'block';
            }

            // Close the pop-up form
            function closeForm() {
                document.getElementById("edit-year-popup").style.display = 'none';
            }

            // Close the edit section pop-up form when the cancel button is clicked
            document.querySelector('#edit-year-popup .cancel-button').addEventListener('click', () => {
                document.getElementById('edit-year-popup').style.display = 'none';
            });


        // ---------------- JS PARA BUMUKAS YUNG POP UP FORM PARA SA PAG ADD NG BAGONG CLASS ---------------- //

                // Get the button element
                var addYearButton = document.getElementById('add-year-button');

                // Get the popup form element
                var addYearPopup = document.getElementById('add-year-popup');

                // Add an event listener to the button for the click event
                addYearButton.addEventListener('click', function(event) {    
                    event.preventDefault();
                    addYearPopup.style.display = 'block';
                });


    //--------------------------- DELETE CONFIRMATION PROMPT ------------------------------//
    // Delete confirmation prompt
    function deleteYear(yearID) {
        if (confirm("Are you sure you want to delete this semester?")) {
            document.getElementById('yearIDInput').value = yearID;
            document.getElementById('deleteYearForm').submit();
        }
    }

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
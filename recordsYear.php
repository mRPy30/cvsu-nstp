
<?php
include 'topbar.php';
include 'db_connect.php';
include 'sidebar.php';







?>

<!DOCTYPE html>
<html>
<head>
    <style>
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
            width: 600px;
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


    </style>
</head>

<body>
    <div class="content print-container">
    
    <!-------------------------------------- UPPER PART NG PAGE --------------------------------------------->
    
        <div class="upperbox">

            <h3>Semester List</h3>
            
       
            <a href="records.php" class="go-back-button">Go Back</a>

     
        </div>

       
         <!--------------------------------------TABLE NG CLASSES --------------------------------------------->

        <div class="tabledisplay">
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


        <div class="tabledisplay">
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





        
        <!--------------------------------------  PARA SA ADDITION BUTTON --------------------------------------------->
        <div class="lowerbox">
            <button id="add-year-button" style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">Add Semester</button>
        </div>
    </div>





    <!----------------- POP UP FORM NG PAG ADD NG BAGONG CLASS -------------->

        <div id="add-year-popup" class="form-popup">
            <form method="post" class="form-container" id="add-year-form" action="manageYear.php">
                <h4>Add Class</h4>
                <label for="add-year-name">School Year:</label>
                <input type="text" name="yearName" placeholder="Enter Semester name">
                <button type="submit">Add Semester</button>
            </form>
        </div>

   
    <!----------------- POP UP FORM PARA SA PAG EDIT NG ISANG CLASS -------------->

        <div id="edit-year-popup" class="form-popup">
            <form method="post" class="form-container" id="edit-year-form" action="manageYear.php">
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

       
            
        <form id="deleteYearForm" action="manageYear.php" method="post">
                <input type="hidden" name="yearID" id="yearIDInput">
                <input type="hidden" name="deleteYear" value="1">
         </form>             








    
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
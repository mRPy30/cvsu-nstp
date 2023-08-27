<?php

include 'db_connect.php'; 

// Active Sidebar Page

$directoryURI = $_SERVER['REQUEST_URI'];

$path = parse_url($directoryURI, PHP_URL_PATH);

$components = explode('/', $path);

$page = $components[2];






$coordinators = array(); // Initialize an empty array


// Include your SQL query to retrieve coordinator details
$query = "SELECT * FROM coordinator"; 
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Retrieve the individual values
        $coordinatorImage = $row['coordinatorImage'];
        $name = $row['CoorName'];
        $email = $row['email'];
        $facebook = $row['facebook'];
        $password = $row['password'];
        $id = $row['id'];

        // Create an object for each coordinator
        $coordinator = array(
            'coordinatorImage' => $coordinatorImage,
            'CoorName' => $name,
            'email' => $email,
            'facebook' => $facebook,
            'password' => $password,
            'id' => $id
        );

        // Add the coordinator to the array
        $coordinators[] = $coordinator;
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
<style>
.formbox-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Use 100vh to center the form vertically on the screen */
}

.formbox {
 
    width: 350px;
    background-color: white;
    border-radius: 10px;
    padding: 20px;
    display:none;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: auto;
    position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); 
    

}

.form-container button[type="button"] {
                background-color: white;
                color: black;
                border: none;
                cursor: pointer;
                width: 30%;
                padding: 3px;
                margin-top: 20px;
                border: solid 1px black;
                border-radius: 3px;
                
                }





    </style>
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
                        <div class="rec-content">
                            <!-- Add your main content here -->
                            <div class="upperbox">
                                <h4> COORDINATOR RECORDS </h4>
                                <a href="admin-records.php" class="go-back-button"><ion-icon name="arrow-back-circle-outline"></ion-icon></a>
                            </div>
                            
                         
          <!--------------------------------------TABLE NG CLASSES --------------------------------------------->
                        <div class="add-box">
                            <button class="add-button" id="addCoordinatorButton">Add Coordinator</button>
                        </div>

                        <div class="align-tbl-course"style="margin-left: 120px;">
                            <div class="tabledisplay"style="width:900px; margin-left: 0px;">
                                <table id="course-table" style="width:850px; margin-left: 0px;">
                                    <!-- Table header -->
                                    <thead>
            <tr>
                <th>Coordinator Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Facebook</th>
                <th>Password</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="scrollable-tbody">
            <?php foreach ($coordinators as $coordinator): ?>
                <tr>
                    <td><img src="data:image/jpeg;base64,<?php echo base64_encode($coordinator['coordinatorImage']); ?>" alt="Coordinator Image" width="50"></td>
                    <td><?php echo $coordinator['CoorName']; ?></td>
                    <td><?php echo $coordinator['email']; ?></td>
                    <td><?php echo $coordinator['facebook']; ?></td>
                    <td><?php echo $coordinator['password']; ?></td>
                    <td><button class="edit-button" onclick="openEditForm(<?php echo $coordinator['id']; ?>)" data-coordinator-id="<?php echo $coordinator['id']; ?>">Edit</button></td>
                    <td><button class="delete-button" onclick="deleteCoordinator(<?php echo $coordinator['id']; ?>)">Delete</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
                                </table>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </main>


                            </div>
                        </div>
                </div>
            </div>
        </main>
     <!-----End Main content------>        
        
     <div class="formbox" id="addCoordinatorForm">
    <div class="form-container" style="height: 100%;">
        <h4>Add New Coordinator</h4>
        <form method="POST" id="add-coordinator-form" action="admin-manageCoordinator.php" enctype="multipart/form-data">
            <label for="coordinator"><b>Instructor Image</b></label>
            <input style="margin-left: 8px; margin-bottom: 5px; border-radius: 0px" type="file" name="instructorImage" accept="image/*" required>

            <label for="coordinatorID">Coordinator ID:</label>
            <input type="text" id="id" name="id" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="facebook">Facebook:</label>
            <input type="text" id="facebook" name="facebook" required>

            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required>
            
            <button type="submit">Add Coordinator</button>
            <button type="button" id="cancelButton">Cancel</button>
        </form>
    </div>
</div>









<div class="formbox" id="editCoordinatorForm">
    <div class="form-container" style="height: 100%;">
        <h4>Edit Coordinator</h4>
        <form method="POST" id="edit-coordinator-form" action="admin-editCoordinator.php" enctype="multipart/form-data">
            <input type="hidden" id="editId" name="editId">

            <label for="editInstructorImage"><b>Instructor Image</b></label>
            <input style="margin-left: 8px; margin-bottom: 5px; border-radius: 0px" type="file" name="editInstructorImage" accept="image/*">

            <label for="editName">Name:</label>
            <input type="text" id="editName" name="editName" required>
            
            <label for="editEmail">Email:</label>
            <input type="text" id="editEmail" name="editEmail" required>

            <label for="editFacebook">Facebook:</label>
            <input type="text" id="editFacebook" name="editFacebook" required>

            <label for="editPassword">Password:</label>
            <input type="text" id="editPassword" name="editPassword" required>
            
            <button type="submit">Update Coordinator</button>
            <button type="button" id="cancelEditButton">Cancel</button>
        </form>
    </div>
</div>
<!-----End of Body------>
</section>















<script>
  var coordinators = <?php echo json_encode($coordinators); ?>;
    console.log("Coordinators Array:", coordinators);

    // Function to show the popup form
    function showAddForm() {
        var addInstructorForm = document.querySelector('.formbox');
        addInstructorForm.style.display = 'block';
    }

    var cancelButton = document.getElementById('cancelButton');
    var addCoordinatorForm = document.getElementById('addCoordinatorForm');

    cancelButton.addEventListener('click', function() {
        addCoordinatorForm.style.display = 'none';
    });

    // Add an event listener to the button for opening the form
    var addCoordinatorButton = document.getElementById('addCoordinatorButton');
    addCoordinatorButton.addEventListener('click', function(event) {
        event.preventDefault();
        showAddForm();
    });

    document.addEventListener("DOMContentLoaded", function () {
        // Event listener for all "Edit" buttons with class "edit-button"
        document.querySelectorAll(".edit-button").forEach(function (button) {
            button.addEventListener("click", function () {
                // Extract the coordinatorID from the data attribute
                var coordinatorID = button.dataset.coordinatorID;

                // Call the openEditCoordinatorForm function with the coordinatorID
                openEditCoordinatorForm(coordinatorID);
            });
        });

        function openEditCoordinatorForm(coordinatorID) {
            var coordinator = coordinators.find(function(coordinator) {
                return coordinator.id === coordinatorID;
            });

            if (coordinator) {
                document.getElementById("editId").value = coordinator.id;
                document.getElementById("editName").value = coordinator.name;
                document.getElementById("editEmail").value = coordinator.email;
                document.getElementById("editFacebook").value = coordinator.facebook;
                document.getElementById("editPassword").value = coordinator.password;

                document.getElementById("editCoordinatorForm").style.display = "block";
            }
        }

        // Update the event listener for the "Cancel" button
        document.getElementById("cancelEditButton").addEventListener("click", closeEditForm);

        function closeEditForm() {
            document.getElementById("editCoordinatorForm").style.display = "none";
        }
    });
</script>
</body>
</html>    
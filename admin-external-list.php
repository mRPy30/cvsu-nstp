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


$query = "SELECT tbl_activities.activityImage, tbl_activities.activityTitle, tbl_activities.activityID 
            FROM tbl_activities" ;

$result = mysqli_query($conn, $query);

$external = array(); // Initialize an empty array to store external details

if ($result && mysqli_num_rows($result) > 0) {
    while ($externals = mysqli_fetch_assoc($result)) {
        // Retrieve the individual values
        $activityImage = $externals['activityImage'];
        $activityTitle = $externals['activityTitle'];
        $activityid = $externals['activityID'];

        // Store the external array
        $external[] = array(
            'activityImage' => $activityImage,
            'activityTitle' => $activityTitle,
            'activityID' => $activityid
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
                        <div class="upperbox">
                            <h3>NSTP ACTIVITIES</h3>
                            <div class="addbox">
                            <button type="submit" class="add-button" id="external-Button">Add Activity</button>
                        </div>
                            <a href="admin-external-prog.php" class="go-back-button"><ion-icon name="arrow-back-circle-outline"></ion-icon></a>  
                        </div>

                        <div class="align-tbl-external">
                            <div class="tabledisplay-external">
                            <div class="course-and-section">
                                    <p>
                                        <?php echo $selectedCourseName; ?>
                                    </p>
                                </div>

                                <table id="program-table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th scope="col" class="col-3">Modify</th>
                                        </tr>
                                    </thead>
                                    <tbody class="scrollable-tbody">
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td class="modify">
                                                    <button class="edit-button" onclick="openEditForm()">Edit</button>
                                                    <button class="delete-button" onclick="deleteExpense()">Delete</button>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            </div>
                        </div>

            
           
                 <!----------------------------- Add external form (hidden by default) ------------------------>


                <div id="externalForm" class="form-popup">
                    <form action="admin-manageExternal.php" method="POST" class="form-container" enctype="multipart/form-data">
                        <h2>Add External</h2>

                
                        <label for="activityImage"><b>Activity Image</b></label>
                        <input type="file" name="instructorImage" accept="image/*" required>

                        <label for="activityID"><b>Activity ID</b></label>
                        <input type="text" placeholder="Enter actvity ID" name="instructorID" required>

                        <label for="activityTitle"><b>Activity Title</b></label>
                        <input type="text" placeholder="Enter activity Name" name="instructorName" required>

                        <button type="submit" class="btn" onclick="closeAddForm()">Add</button>
                        <button type="button" class="btn cancel" onclick="closeAddForm()">Cancel</button>
                    </form>
                </div>


                </div>
            </div>
        </main>
                    <!-----End Main content------>        
<!-----End of Body------>
</section>
<script>
        // ---------------------------------- adding external open js -------------------------------- //

                // Get the button element
                var ExternalButton = document.getElementById('external-Button');

                // Get the popup form element
                var externalPopup = document.getElementById('externalForm');

                // Add an event listener to the button for the click event
                ExternalButton.addEventListener('click', function(event) {
                // Prevent the default form submission behavior
                event.preventDefault();

                // Show the popup form
                externalPopup.style.display = 'block';
                });


                // Function to close the pop-up form
                function closeAddForm() {
                document.getElementById("externalForm").style.display = "none";
                }  
         </script>
</body>
</html>    

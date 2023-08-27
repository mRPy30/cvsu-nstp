<?php
include 'db_connect.php';
// Fetch courses from the database
$sql = 'SELECT courseID, courseName FROM tbl_course';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $courses = $result->fetch_all(MYSQLI_ASSOC);

    // Set the session courseID based on the first course in the array
    session_start();
    $_SESSION['courseID'] = $courses[0]['courseID'];
} else {
    $courses = [];
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
                        <!-------------------------------------- UPPER PART NG PAGE --------------------------------------------->
                        <div class="upperbox">
                                <h4>TRAINING PROGRAM RECORDS</h4>
                                <a href="admin-records.php" class="go-back-button"><ion-icon name="arrow-back-circle-outline"></ion-icon></a>
                        </div>

                        <!-- Add New Course Form -->
                        <div class="formbox">
                            <div class="form-container">
                                <h4>Add New Programs</h4>
                                <form method="post" id="add-course-form" action="admin-records_manageCourses.php">
                                    <label for="courseName">Training Program Name:</label>
                                    <input type="text" id="courseName" name="courseName" required>
                                    
                                    <button type="submit">Add Course</button>
                                </form>
                            </div>

          <!--------------------------------------TABLE NG CLASSES --------------------------------------------->
        <!-- Render the course table -->
                        <div class="align-tbl-course">
                            <div class="tabledisplay">
                                <table id="course-table">
                                    <!-- Table header -->
                                    <thead>
                                        <tr>
                                            <th>Training Program Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <!-- Table body -->
                                    <tbody>
                                            <?php if (!empty($courses)): ?>
                                                <?php foreach ($courses as $course): ?>
                                                    <tr>
                                                            <td><?php echo $course['courseName']; ?></td>
                                                        <td>
                                                            <button class="edit-button" onclick="openForm('<?php echo $course['courseID']; ?>')" >Edit</button>
                                                        </td>
                                                        <td>
                                                            <button class="delete-button" onclick="deleteCourse(<?php echo $course['courseID']; ?>)">Delete</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="3">No courses found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </main>

    <!----------------- POP UP FORM PARA SA PAG EDIT NG COURSE -------------->


        <div id="edit-course-popup" class="form-popup">
            <form method="post" class="form-container" id="edit-course-form" action="admin-records_manageCourses.php">
                <h4>Edit Course</h4>
                <input type="hidden" name="courseID" id="edit-courseID">
                <label for="edit-courseName">Course Name:</label>
                <input type="text" id="edit-courseName" name="courseName" required>
                <button type="submit">Update Course</button>
            </form>
        </div>
    
            
    <!----------------- POP UP FORM PARA SA PAG DELETE NG COURSE -------------->

        <form id="deleteCourseForm" action="admin-records_manageCourses.php" method="post">
            <input type="hidden" name="courseID" id="courseIDInput">
            <input type="hidden" name="deleteCourse" value="1">
        </form>









      <!---------------------------------     JAVASCRIPT CODE ------------------------------------------>    

    <script>

        // ---------------- JS PARA BUMUKAS YUNG POP UP FORM PARA SA PAG EDIT ---------------- //

        // Open the pop-up form and set the course details
        function openForm(courseID) {
            var course = <?php echo json_encode($courses); ?>;
            var courseDetails = course.find(c => c.courseID === courseID);

            if (courseDetails) {
                document.getElementById("edit-courseID").value = courseDetails.courseID;
                document.getElementById("edit-courseName").value = courseDetails.courseName;
                document.getElementById("edit-course-popup").classList.add("show");
            }
        }

        // Close the pop-up form
        function closeForm() {
            document.getElementById("edit-course-popup").classList.remove("show");
        }



          //--------------------------- DELETE CONFIRMATION PROMPT ------------------------------//
    
        function deleteCourse(courseID) {
                if (confirm("Are you sure you want to delete this course?")) {
                    document.getElementById('courseIDInput').value = courseID;
                    document.getElementById('deleteCourseForm').submit();
                }
            }




    </script>



</body>
</html>
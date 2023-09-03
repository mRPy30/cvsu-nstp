<?php



session_start();

$programID = $_GET['programID'];

    // Store the program ID in a session variable
    $_SESSION['programID'] = $programID;



include 'db_connect.php';

// Active Sidebar Page

$directoryURI = $_SERVER['REQUEST_URI'];

$path = parse_url($directoryURI, PHP_URL_PATH);

$components = explode('/', $path);

$page = $components[2];




// Fetch course data from the database
$query = "SELECT courseID, courseName FROM tbl_course";
$result = mysqli_query($conn, $query);
$courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Fetch section data from the database
$query = "SELECT sectionID, sectionName FROM tbl_sections";
$result = mysqli_query($conn, $query);
$sections = mysqli_fetch_all($result, MYSQLI_ASSOC);



include 'db_connect.php';

// Check if the programID is set in the URL
if (isset($_GET['programID'])) {
    // Get the programID value from the URL
    $selectedProgramID = $_GET['programID'];

    // Store the selected program ID in a session variable
    $_SESSION['selectedProgramID'] = $selectedProgramID;

    // Prepare and execute the query to fetch the program name based on program ID
    $programQuery = "SELECT programName FROM tbl_program WHERE programID = $selectedProgramID";
    $result = $conn->query($programQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch the row
        $programName = $row['programName']; // Store the program name in a variable
    } else {
        $programName = "Program Not Found"; // Default value if program name is not found
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
    <title><?php echo "Student Page"; ?></title>

     <!----------CSS------------>
    <link rel="stylesheet" href="style_student.css">

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


     <!---Inner topbar--->
     <?php include('topbar.php');?>
</head>
<!----Body----->
<body>

   <!---------Sidebar------------>
   

   <section class="bg-section">
   <?php include('sidebar-student.php');?>
    <!---------End Sidebar--------->
<br>

<main class="pcoded-main-content">
            <div class="container">
                <div class="col-lg-12">                
                    <div class="upperbox">
                        <h4>NSTP PROGRAMS / FEEDING PROGRAM</h4>
                            <a href="student-programs.php" class="go-back-button"><ion-icon
                                    name="arrow-back-circle-outline"></ion-icon></a>
                    </div>
                    <div class="feed">
                        <div class="inner_feed">
                            <h1>FEEDING PROGRAM</h1>
                        </div>

                        <div class="inner_feed-2">
                            <h1>PROGRAM DESCRIPTION</h1>
                        </div>

                        <div class="inner_feed-3">
                            <h1>Armand G. Aton</h1>
                            <p>Assigned Instructor</p>
                            <img src="instructors_folder/Aton.jpg" class="rounded-img" alt="">
                        </div>

                        <div class="inner_feed-4">
                            <h1>7AM - 12PM</h1>
                            <p>Time</p>
                            <i class="fa-regular fa-clock"></i>
                        </div>

                        <div class="inner_feed-4">
                            <h1>August 30, 2023</h1>
                            <p>Date</p>
                            <i class="fa-regular fa-calendar"></i>
                        </div>

                        <div class="inner_feed-5">
                            <h1>Brgy. Buhay na Tubig</h1>
                            <p>Location</p>
                            <i class="fa-solid fa-location-dot"></i>
                            <button type="submit" class="btn" id="volunteer-button">+ VOLUNTEER NOW</button>
                        </div>
                        
                    </div>

                    <!----------------- Popup form in Volunteer -------------->

                    <div id="volunteer-popup" class="form-popup">
            <form method="post" class="form-container" id="volunteer-form" action="admin-manageVolunteer.php">
                <h4>Volunteer Registration</h4>

                <label for="add-volunteer">Enter your Name:</label>
                <input type="text" name="name" placeholder="Please Enter Your Full name">

                <label for="email-volunteer">Email:</label>
                <input type="text" name="email" placeholder="Please Enter Your Email add">
                
                <div class="form-control-1">
                    <label for="studentID">Student Number:</label>
                    <input name='studentID' id="studentId"></input>
                    
                    <label for="course">Training Program:</label>
                    <select name='course' id="course">
                        <?php foreach ($courses as $course): ?>
                            <option value="<?php echo $course['courseID']; ?>"><?php echo $course['courseName']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-control-2">
                    <label for="number">Contact Number:</label>
                    <input name="number" id="number"></input>

                    <label for="section">Section:</label>
                    <select name="section" id="section">
                        <?php foreach ($sections as $section): ?>
                            <option value="<?php echo $section['sectionID']; ?>"><?php echo $section['sectionName']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Hidden input field to store programID from the session -->
                <input type="hidden" name="programID" value="<?php echo $_SESSION['programID']; ?>">

                <div class="form-control-1"></div>
                <div class="form-control-2"></div>

                <button type="submit" onclick="closeAddForm()">Signup</button>
                <button type="button" onclick="closeAddForm()">Cancel</button>
            </form>

        </div>

                </div>
            </div>
</main>
</section>

    <script>

              // JavaScript code to populate the section dropdown dynamically

        // Define an object to store the sections for each course
        var sections = {
            <?php
            // Fetch section data from the database based on courses
            $query = "SELECT courseID, sectionName FROM tbl_sections";
            $result = mysqli_query($conn, $query);
            $sections = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Organize the sections by course ID
            $sectionsByCourse = [];
            foreach ($sections as $section) {
                $courseId = $section['courseID'];
                $sectionName = $section['sectionName'];

                if (!isset($sectionsByCourse[$courseId])) {
                    $sectionsByCourse[$courseId] = [];
                }

                $sectionsByCourse[$courseId][] = $sectionName;
            }

            // Output the sections as JavaScript object
            foreach ($sectionsByCourse as $courseId => $courseSections) {
                echo "$courseId: [";
                foreach ($courseSections as $index => $section) {
                    if ($index !== 0) {
                        echo ", ";
                    }
                    echo "'$section'";
                }
                echo "], ";
            }
            ?>
        };

        // Get reference to the section dropdown
        var sectionDropdown = document.getElementById('section');

        // Add an event listener to the course dropdown
        document.getElementById('course').addEventListener('change', function () {
            // Clear the section dropdown
            sectionDropdown.innerHTML = '';

            // Get the selected course ID
            var selectedCourseId = this.value;

            // Retrieve the sections for the selected course
            var selectedCourseSections = sections[selectedCourseId];

            // Populate the section dropdown based on the selected course
            selectedCourseSections.forEach(function (section) {
                var option = document.createElement('option');
                option.textContent = section;
                sectionDropdown.appendChild(option);
            });
        });

        // Trigger the change event initially to populate the section dropdown
        document.getElementById('course').dispatchEvent(new Event('change'));

    // Get the button element
    var volunteerButton = document.getElementById('volunteer-button');

    // Get the popup form element
    var volunteerPopup = document.getElementById('volunteer-popup');

    // Add an event listener to the button for the click event
    volunteerButton.addEventListener('click', function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Show the popup form
        volunteerPopup.style.display = 'block';
    });

    // Function to close the pop-up form
    function closeAddForm() {
        document.getElementById("volunteer-popup").style.display = "none";
    }



  
    </script>

</body>
</html>
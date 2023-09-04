<?php
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
                            <h1>September 5, 2023</h1>
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
            <form method="post" class="form-container" id="volunteer-form" action="">
                <h4>Volunteer Registration</h4>

                <label for="add-volunteer">Enter your Name:</label>
                <input type="text" name="Name" placeholder="Please Enter Your Full name">

                <label for="email-volunteer">Enter your Email Address:</label>
                <input type="text" name="Name" placeholder="Please Enter Your Email add">
                
                    <div class="form-control-1">
                        <label for="studentID">Student Number:</label>
                        <input name='studentID' id="studentId">
                                        
                        </input>
                        
                    <label for="course-volunteer">Training Program:</label>
                    <select type="select" name="select">
                        <option></option>
                        <option>
                            Civil Welfare Training Service
                        </option>
                        <option>
                            Reserve Officer Training Corps
                        </option>
                    </select>
                    </div>
                    <div class="form-control-2">
                        <label for="number">Contact Number:</label>
                        <input name="section" id="section">

                        </input>

                        <label for="section-volunteer">Section:</label>
                    <select type="select" name="select">
                        <option></option>
                        <option>
                            BSCS - 1C
                        </option>
                        <option>
                            BSIT - 1A
                        </option>
                    </select>
                    </div>


                <div class="form-control-1">
                    
                </div>
                <div class="form-control-2">

                </div>

                <button type="submit" onclick="closeAddForm()">Signup</button>
                <button type="button" onclick="closeAddForm()">Cancel</button>
            </form>
        </div>

                </div>
            </div>
</main>
</section>

    <script>
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
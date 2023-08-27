<?php
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = $_POST["name"];
    $id = $_POST["id"];
    $course = $_POST["course"];
    $section = $_POST["section"];
    $password = $_POST["password"];

    // Check if the ID already exists in the database
    $checkQuery = "SELECT * FROM student WHERE id = '$id'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        echo "Duplicate ID";
    } else {
        // Get the default year ID
        $yearQuery = "SELECT yearID FROM tbl_year WHERE isDefault = 1";
        $yearResult = mysqli_query($conn, $yearQuery);
        $yearID = mysqli_fetch_assoc($yearResult)['yearID'];

        // Get the default semester ID
        $semesterQuery = "SELECT semesterID FROM tbl_semester WHERE isDefault = 1";
        $semesterResult = mysqli_query($conn, $semesterQuery);
        $semesterID = mysqli_fetch_assoc($semesterResult)['semesterID'];

        // Get the section ID from the selected section value
        $sectionIDQuery = "SELECT sectionID FROM tbl_sections WHERE sectionName = '$section'";
        $sectionIDResult = mysqli_query($conn, $sectionIDQuery);
        $sectionID = mysqli_fetch_assoc($sectionIDResult)['sectionID'];

        // Prepare and execute the SQL statement to insert data into the student table
        $sql = "INSERT INTO student (name, id, course, sectionID, password, yearID, semesterID)
                VALUES ('$name', '$id', '$course', '$sectionID', '$password', '$yearID', '$semesterID')";

        if (mysqli_query($conn, $sql)) {
            echo "Sign up successful!";
            // Redirect to the login page after successful sign up
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Fetch course data from the database
$query = "SELECT courseID, courseName FROM tbl_course";
$result = mysqli_query($conn, $query);
$courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Fetch section data from the database
$query = "SELECT sectionID, sectionName FROM tbl_sections";
$result = mysqli_query($conn, $query);
$sections = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!---------title-------------->
    <link rel="short icon" href="logo-shortcut-icon.png" type="">
    <title>Signup Student</title>

    <!---------Css link------------>
    <link rel="stylesheet" href="style_log-in_&_signup.css">

    <!-----------bootsrap------------>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--------font link----------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abel&family=Inter:wght@500;800&family=Poppins:wght@400;600&display=swap"
        rel="stylesheet">

    <!--------icons--------->
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>

    <!-------popup modal js------>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <!-----main content----->
    <div class="bg-signup">
        <img src="background-signup.jpg" alt="cvsucover">
    </div>
    <div class="signup-section signup">
        <div class="container signup_container">
            <div class="row">
                <div class="col text-align ">
                    <img src=logo-nstp.png>
                    <div class="body_logo">
                        <p> CvSU-IMUS CAMPUS</p>
                    </div>
                    <div class="body-title">
                        <h1>NSTP PORTAL</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-----signup section----->
    <aside class="form-signup">
        <div class="container">
            <div class="box">
                <div class="form-group">
                    <div class="login-title">
                        <h3>CREATE ACCOUNT</h3>
                    </div>
                    <!----F O R M---->
                    <form method="POST">
                        <div class="form-control">
                            <label class="enter" for="name">Name:</label>

                            <input type="text" class="form-control" id='name' name="name">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error</small>
                        </div>
                        <div class="form-control">
                            <label for="id">Student ID:</label>

                            <input type="text" id='id' class="form-control" name="id" required>
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error</small>
                        </div>
                        <div class="form-control">
                            <div class="box-control">
                                <div class="form-control-1">
                                    <label for="course">Training Program:</label>
                                    <select name='course' id="course">
                                        <?php foreach ($courses as $course): ?>
                                            <option value="<?php echo $course['courseID']; ?>"><?php echo $course['courseName']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-control-2">
                                    <label for="section">Section:</label>
                                    <select name="section" id="section">
                                        <?php foreach ($sections as $section): ?>
                                            <option value="<?php echo $section['sectionID']; ?>"><?php echo $section['sectionName']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-control">
                            <label for="password">Password:</label>

                            <input type="password" class="form-control" id='password' name="password">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error</small>
                        </div>
                        <div class="form-control">
                            <button class="btn btn-lg btn-block" type="submit" value="Submit">SIGNUP</button>
                        </div>
                        <div class="login">
                            <p>Already have an account? <a href="login.php"> Login now</a></p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        </div>
    </aside>



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


        // ------------------- JAVASCRIPT code for form validation -----------------------//

        // JavaScript code for form validation

        const form = document.querySelector('form');
        const name = document.getElementById('name');
        const id = document.getElementById('id');
        const password = document.getElementById('password');

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            if (validate()) {
                form.submit(); // Submit the form if validation succeeds
            }
        });

        const namePattern = /^[a-zA-Z ]+$/;

        function validate() {
            const nameVal = name.value.trim();
            const idVal = id.value.trim();
            const passwordVal = password.value.trim();

            let isValid = true; // Track the validation result

            // Name validation
            if (nameVal === '') {
                setErrorMsg(name, 'Name cannot be blank');
                isValid = false;


            } else if (/\d/.test(nameVal)) {
                setErrorMsg(name, 'Names should have no numeric characters');
                isValid = false;

            } else if (!namePattern.test(nameVal)) {
                setErrorMsg(name, 'Names should only contain letters and spaces');
                isValid = false;

            } else {
                setSuccessMsg(name);
            }

            // ID validation
            if (idVal === '') {
                setErrorMsg(id, 'ID cannot be blank');
                isValid = false;
            } else if (!/^\d+$/.test(idVal)) {
                setErrorMsg(id, 'ID should only contain numbers');
                isValid = false;
            } else if (idVal.length !== 9) {
                setErrorMsg(id, 'ID should have exactly 9 digits');
                isValid = false;
            } else {
                setSuccessMsg(id);
            }

            // Password validation
            if (passwordVal === '') {
                setErrorMsg(password, 'Password cannot be blank');
                isValid = false;
            } else if (passwordVal.length < 8) {
                setErrorMsg(password, 'Password should have at least 8 characters');
                isValid = false;
            } else if (!/[A-Z]/.test(passwordVal)) {
                setErrorMsg(password, 'Password should contain at least 1 uppercase letter');
                isValid = false;
            } else if (!/[a-z]/.test(passwordVal)) {
                setErrorMsg(password, 'Password should contain at least 1 lowercase letter');
                isValid = false;
            } else if (!/\d/.test(passwordVal)) {
                setErrorMsg(password, 'Password should contain at least 1 numeric character');
                isValid = false;
            } else {
                setSuccessMsg(password);
            }

            return isValid; // Return the overall validation result
        }


        function setErrorMsg(input, errorMsg) {
            const formControl = input.parentElement;
            const small = formControl.querySelector('small');
            formControl.className = 'form-control error';
            small.innerText = errorMsg;
            small.style.display = 'block'; // Change visibility to display
        }

        function setSuccessMsg(input) {
            const formControl = input.parentElement;
            formControl.className = 'form-control success';
            const small = formControl.querySelector('small');
            small.style.display = 'none'; // Change visibility to display
        }
    </script>
</body>

</html>
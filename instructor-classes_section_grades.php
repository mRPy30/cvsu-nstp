<?php
include 'db_connect.php';


// Start the session
session_start();

// Fetch section info
$selectedsectionID = $_SESSION['selectedsectionID'];
$selectedsectionName = $_SESSION['selectedsectionName'];


$sql = "SELECT * FROM tbl_sections WHERE sectionID = '$selectedsectionID'";
$result = $conn->query($sql);



// Initialize an empty array to hold student data
$students = array();

if ($result->num_rows > 0) {
    $sectionData = $result->fetch_assoc();
    $courseID = $sectionData['courseID'];
    
    // Fetch name and student id
    $sql = "SELECT id, name, finalGrade FROM student WHERE sectionID = '$selectedsectionID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $students = $result->fetch_all(MYSQLI_ASSOC);
    }
}

  

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
    <title><?php echo "Instructor Page"; ?></title>

     <!----------CSS------------>
    <link rel="stylesheet" href="style_instructors.css">

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!---Inner topbar--->
     <?php include('topbar.php');?>
        
</head>

<!----Body----->

<body>
    <section class="bg-section">
        <!---------Sidebar------------>
        <?php include('sidebar-instructor.php');?>
         
        <!---------End Sidebar--------->

        <!--------MAIN CONTENT-------->
            <main class="pcoded-main-content">
                <div class="container pt-4">
                    <div class="col-lg-12">
                        <div class="box-top">
                            <h5><?php echo " $selectedsectionName" ?></h5>
                                <a href="instructor-classes.php">
                                <ion-icon name="arrow-back-circle-outline"></ion-icon>
                                </a>
                            </div>               
                        <div class="class_navs">
                            <ul class="nav nav-underline">
                                <li class="nav-item">
                                  <a class="nav-link" href="instructor-classes_section.php?sectionID=<?php echo $selectedsectionID; ?>&sectionName=<?php echo $selectedsectionName; ?>">Masterlist</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link active" href="#">Grades</a>
                                </li>
                              </ul>
                        </div>
                        <div class="acads_info">
                            <p>ACADEMIC YEAR : 2022 - 2023 | SEMESTER: SECOND</p>
                        </div>
                        <div class="tbl_grades">
                        <form action="instructor-manageGrades.php" id="gradesForm">
                        <table class="table table-hover" method="post">
                            <thead class="title bar">
                                <tr>
                                    <th scope="col" class="col-3">Student Number</th>
                                    <th scope="col" class="col-5">Name</th>
                                    <th scope="col" class="col-3">Final Grade</th>
                                </tr>
                            </thead>
                            <tbody class="scrollable-tbody">
                            <tbody class="scrollable-tbody">
                            <?php foreach ($students as $student): ?>
                                    <tr>
                                        <td><?php echo $student['id']; ?></td>
                                        <td><?php echo $student['name']; ?></td>
                                        <td>
                                            <input type="hidden" name="studentIDs[]" value="<?php echo $student['id']; ?>">
                                            <input type="number" name="grades[]" min="0" max="100" step="0.1">
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </main>      
        <!-----End Main content------>
</section>
<script>
  // Function to show success message using SweetAlert
  function showSuccessMessage() {
    Swal.fire({
      title: 'Submission Successful',
      text: 'Final Grades have been submitted successfully.',
      icon: 'success',
    });
  }
  // Attach event listener to the form submission
  document.addEventListener('DOMContentLoaded', () => {
    const gradesForm = document.querySelector('#gradesForm');
    gradesForm.addEventListener('submit', async (event) => {
      event.preventDefault();

      const formData = new FormData(gradesForm);

      // Validate form data before submission
      let hasErrors = false;
      formData.getAll('studentIDs[]').forEach((studentId, index) => {
        const gradeInput = formData.getAll('grades[]')[index];
        if (studentId === '' || gradeInput === '') {
          hasErrors = true;
        }
      });

      if (hasErrors) {
        showErrorMessage('Please provide both student numbers and grades.');
        return;
      }

      // Submit the form using AJAX or regular form submission
      const response = await fetch(gradesForm.action, {
        method: 'POST',
        body: formData,
      });

      if (response.ok) {
        showSuccessMessage();
      } else {
        showErrorMessage('An error occurred. Please try again.');
      }
    });
  });
</script>

</body>
</html>
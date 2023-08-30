<?php

include "db_connect.php";

session_start();
$accountID = $_SESSION['id'];

$select_data = mysqli_query($conn, "SELECT * FROM student WHERE id= '$accountID'");
while ($student = mysqli_fetch_array($select_data)) {
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
    <title>
        <?php echo "Student Page"; ?>
    </title>

    <!----------CSS------------>
    <link rel="stylesheet" href="style_student.css">

    <!----------BOOTSTRAP------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!----------FONTS------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abel&family=Inter:wght@400;800&family=Poppins:wght@400;500&display=swap"
        rel="stylesheet">

    <!----------ICONS------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>

    <!---Inner topbar--->
    <?php include('topbar.php'); ?>
</head>
<!----Body----->

<body>

    <!---------Sidebar------------>


    <section class="bg-section">
        <?php include('sidebar-student.php'); ?>
        <!---------End Sidebar--------->


        <!--Main Content-->

        <main class="pcoded-main-content">
            <div class="container pt-4 ">
                <div class="col-lg-12">
                    <div class="upperbox">
                        <div class="print">
                            <i class="fa-solid fa-print" onclick="printSection('container')"></i>
                        </div>
                        <a href="student-classes.php" class="go-back-button"><ion-icon
                                name="arrow-back-circle-outline"></ion-icon></a>
                    </div>
                    <div class="tbl_grades">
                        <form method="post">
                            <table class="table table-hover ">
                                <thead class="title">
                                    <tr>
                                        <th scope="col" class="col-2">School Year</th>
                                        <th scope="col" class="col-2">Program</th>
                                        <th scope="col" class="col-2">Student No.</th>
                                        <th scope="col" class="col-2">Name</th>
                                        <th scope="col" class="col-2">Final Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo $student['yearID'] ?>
                                        </td>
                                        <td>
                                            <?php echo $student['course'] ?>
                                        </td>
                                        <td>
                                            <?php echo $student['id'] ?>
                                        </td>
                                        <td>
                                            <?php echo $student['name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $student['finalGrade'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </main>

        <!-----End Main content------>
    </section>

    <!--------Print Final Gardes----->

    <script type="text/javascript">
        function printSection(el) {
            var getFullContent = document.body.innerHTML;
            var printsection = document.getElementById(el).innerHTML;
            document.body.innerHTML = printsection;
            window.print();
            document.body.innerHTML = getFullContent;
        }
    </script>

    <div onclick="print()">
        <div class="container">
            <form method="post" id="container">
                <center>
                    <img src="logo-shortcut-icon.png"
                        style="width: 70px; height: 70px; position: absolute; margin-left: -320px; margin-top:-10px;">
                    <img src="logo.png"
                        style="width: 80px; height: 80px; position: absolute; margin-left: -410px; margin-top:-10px;">
                    <h3 style="margin-top: 30px; margin-bottom: 10px;">Cavite State University-IMUS CAMPUS</h3>
                    <h3 style="margin-top: 10px; margin-bottom: 10px;">NSTP Program</h3>
                    <h3 style="margin-top: 10px; margin-bottom: 10px;">Final Grade</h3>
                    <hr>
                </center>

                <table class="table table-hover " style="margin-top:30px;">
                    <thead class="title">
                        <tr>
                            <th scope="col" class="col-2">School Year</th>
                            <th scope="col" class="col-2">Program</th>
                            <th scope="col" class="col-2">Student No.</th>
                            <th scope="col" class="col-2">Name</th>
                            <th scope="col" class="col-2">Final Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $student['yearID'] ?>
                            </td>
                            <td>
                                <?php echo $student['course'] ?>
                            </td>
                            <td>
                                <?php echo $student['id'] ?>
                            </td>
                            <td>
                                <?php echo $student['name'] ?>
                            </td>
                            <td>
                                <?php echo $student['finalGrade'] ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <!-------- End of Print Final Gardes----->

    <!-----End of Body------>
</body>

</html>
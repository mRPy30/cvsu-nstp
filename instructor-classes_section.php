<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----------TITLE------------>
    <link rel="shortcut icon" href="logo.png" type="">
    <title><?php echo "Instructor Page"; ?></title>

     <!----------CSS------------>
    <link rel="stylesheet" href="style_instructor.css">

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
        <?php include('sidebar-instructor.php');?>
         
        <!---------End Sidebar--------->
        <!--------Main Content------->
            <main class="pcoded-main-content">
                <div class="container pt-4">
                    <div class="col-lg-12">
                        <a href="instructor-classes.php">
                            <ion-icon name="arrow-back-circle-outline"></ion-icon>
                        </a>                  
                        <div class="section_name">
                            <h1>bsit1-c</h1>
                            <p>2023 : May: 15 12: 30: 27</p>
                        </div>
                        <div class="class_navs">
                            <ul class="nav nav-underline">
                                <li class="nav-item">
                                  <a class="nav-link active" href="#">Masterlist</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="instructor-classes_section_grades.php">Grades</a>
                                </li>
                                <button type="button" type="submit" class="btn" value="submit">Submit</button>
                              </ul>
                        </div>
                        <div class="tbl_masterlist">
                            <table class="table table-hover">
                                <thead class="title bar">
                                <tr>
                                    <th scope="col" class="col-3">Student Number</th>
                                    <th scope="col" class="col-5">Name</th>
                                    <th scope="col" class="col-2"> Total Attendance</th>
                                </tr>
                                </thead>
                                    <tbody>
                                        <tr>
                                            <td>202110115</td>
                                            <th>Agustine Cuevas</th>
                                            <td><input type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>202110116</td>
                                            <th>Bianca Bautista</th>
                                            <td><input type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>202110117</td>
                                            <th>Agustine Cuevas</th>
                                            <td><input type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>202110118</td>
                                            <th>Bianca Bautista</th>
                                            <td><input type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>202110119</td>
                                            <th>Nicole Masigasig</th>
                                            <td><input type="text"></td>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>      
        <!-----End Main content------>
</section>


</body>
</html>
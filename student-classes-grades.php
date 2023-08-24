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
    <link rel="shortcut icon" href="logo.png" type="">
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


        <!--Main Content-->
        <main class="pcoded-main-content">
            <div class="container pt-4 ">
                <div class="col-lg-12">
                <div class="tbl_grades">
                        <form method="post">
                            <table class="table table-hover ">
                                <thead class="title">
                                <tr>
                                    <th scope="col" class="col-3">Student Number</th>
                                    <th scope="col" class="col-3">Name</th>
                                    <th scope="col" class="col-3">Overall grade</th>
                                    <th scope="col" class="col-3">Remarks</th>
                                </tr>
                                </thead>
                                    <tbody>
                                        <tr>
                                            <td>202110115</td>
                                            <td>Ariel Hementera</td>
                                            <td><input type="text" form-control></td>
                                            <td>
                                                <ion-icon class="valid" name="checkmark-circle-outline" id="check-icon"></ion-icon>
                                                <ion-icon class="invalid" name="close-circle-outline" id="error-icon"></ion-icon>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>202110116</td>
                                            <td>Agustine Cuevas</td>
                                            <td><input type="text"></td>
                                            <td><ion-icon class="invalid" name="close-circle-outline"></ion-icon></td>
                                        </tr>
                                        <tr>
                                            <td>202110117</td>
                                            <td>Bianca Bautista</td>
                                            <td><input type="text"></td>
                                            <td><ion-icon class="invalid" name="close-circle-outline"></ion-icon></td>
                                        </tr>
                                        <tr>
                                            <td>202110118</td>
                                            <td>Agustine Cuevas</td>
                                            <td><input type="text"></td>
                                            <td><ion-icon class="valid" name="checkmark-circle-outline"></ion-icon></td>
                                        </tr>
                                        <tr>
                                            <td>202110119</td>
                                            <td>Bianca Bautista</td>
                                            <td><input type="text"></td>
                                            <td><ion-icon class="valid" name="checkmark-circle-outline"></ion-icon></td>
                                        </tr>
                                    </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary" name="submitAttendance">Submit</button>
                        </form>
                </div>
            </div>      
            </div>
            </div>
        </main>     

    <!-----End Main content------>        
    </section>

    
<!-----End of Body------>
</body>
</html>
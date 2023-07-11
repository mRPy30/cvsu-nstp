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

        <!--------MAIN CONTENT-------->
            <main class="pcoded-main-content">
                <div class="container pt-4">
                    <div class="col-lg-12">
                        <div class="box-top">
                            <h5>BSIT1-C</h5>
                                <a href="instructor-classes.php">
                                <ion-icon name="arrow-back-circle-outline"></ion-icon>
                                </a>
                            </div>               
                        <div class="class_navs">
                            <ul class="nav nav-underline">
                                <li class="nav-item">
                                  <a class="nav-link" href="instructor-classes_section.php">Masterlist</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link active" href="#">Grades</a>
                                </li>
                                <button type="button" type="submit" class="btn" value="submit">Submit</button>
                              </ul>
                        </div>
                        <div class="acads_info">
                            <p>ACADEMIC YEAR : 2022 - 2023 | SEMESTER: SECOND SEMESTER</p>
                        </div>
                        <div class="tbl_grades">
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
                        </div>
                    </div>
                </div>
            </main>      
        <!-----End Main content------>
</section>

<script>
   const password = document.getElementById('password');

   form.addEventListener('submit', (event) => {
            event.preventDefault();
            if (validate()) {
                form.submit(); // Submit the form if validation succeeds
            }
        });

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
        


            function setErrorMsg(input, errorMsg) {
            const formControl = input.parentElement;
            const small = formControl.querySelector('small');
            formControl.className = 'form-control .valid-icon';
            small.innerText = errorMsg;
            small.style.display = 'block'; // Change visibility to display
        }

        function setSuccessMsg(input) {
            const formControl = input.parentElement;
            formControl.className = 'form-control error-icon';
            const small = formControl.querySelector('small');
            small.style.display = 'none'; // Change visibility to display
        }
    </script>
            
</script>

</body>
</html>
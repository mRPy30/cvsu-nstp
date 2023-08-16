<?php
// CONNECTION
include 'db_connect.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $username = $_POST['id'];
        $password = $_POST['password'];
        $Result = mysqli_query($conn, "SELECT id, password, 'instructor' as role FROM instructor WHERE id ='$username' AND password='$password'
		UNION
		SELECT id, password, 'student' as role FROM student WHERE id ='$username' AND password='$password'
		UNION
		SELECT id, password, 'admin' as role FROM coordinator WHERE id ='$username' AND password='$password'");

        if (!$Result) {
            // Query execution failed
            die("Query failed: " . mysqli_error($conn));
        }

        $matchedRows = mysqli_num_rows($Result);

        if ($matchedRows > 0) {
            $row = mysqli_fetch_assoc($Result);
            $id = $row['id'];
            $role = $row['role'];

            $_SESSION['name'] = $username;
            $_SESSION['id'] = $id;

            if ($role == 'admin') {
                Header("location: adminpage.php?id=$id");
                exit();
            } elseif ($role == 'student') {
                Header("location: studentpage.php?id=$id");
                exit();
            } elseif ($role == 'instructor') {
                Header("location: instructorpage.php?id=$id");
                exit();
            }
        } else {
            // No matching user found
            echo ("no data matched");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!---------TITLE-------------->
    <link rel="short icon" href="logo.png" type="">
    <title>LOGIN PAGE</title>
    
    <!---------CSS LINK------------>
    <link rel="stylesheet" href="style_log-in_&_sign-up.css">
   
     <!----------BOOTSTRAP------------>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!--------FONT LINK----------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Inter:wght@500;800&family=Poppins:wght@400;600&display=swap"
        rel="stylesheet">

    <!--------ICONS--------->
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

</head>

<body>

    <!------navbar------>
    <nav class="navbar-login_signup login-header-section sticky-top  header-section-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 logo">
                    <div class="p1">
                        <p>NSTP PROGRAM</p>
                    </div>
                    <div class="col-4 home">
                        <a href="homepage.php" class="home-link "><i class="fa-solid fa-house"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!------End navbar------>

    <!-----main content----->
    <div class="bg">
        <img src="background-login.jpg" alt="cvsucover">
    </div>

    <div class="login-section login">
        <div class="container logout_container">
            <div class="row">
                <div class=" col text-align ">
                    <img src=logo.png>
                    <div class="body_logo ">
                        <p> CAVITE STATE UNIVERSITY</p>
                    </div>
                    <div class="body-title">
                        <h1>IMUS CAMPUS</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <!--login section-->
            <aside class="form-login">
                <div class="container">
                    <div class="box">   
                        <div class="form-group">
                            <div class="login-title">
                                <h3>Login to your account</h3>
                            </div>
                            <form class="form-login needs-validation" method="POST">
                                <label class="enter" for="id">Enter your ID:</label>
                                <input type="text is-valid" class="form-control" placeholder="Enter your Id" name="id" required>
                                <label class="pass log" for="password">Password:</label>
                                <input type="password is-valid" class="form-control" placeholder="Enter your Password" name="password" id="password" required onclick="togglePasswordVisibility()">
                                <span class="password-toggle" onclick="togglePasswordVisibility()"><i class="fa-solid fa-eye"></i></span>
                                <span class="error" id="passwordError"></span>
                                    <button class="btn btn-lg btn-block" type="submit" name="submit" value="Submit">LOGIN</button>
                            </form>
                            <div class="signup">
                                <p>Don't have an account yet? <a href="signup.php"> Signup Here </a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!--End login section-->

            <!--password validation and view hide-->
            <script>function togglePasswordVisibility() {
                var passwordInput = document.getElementById("password");
                var passwordToggle = document.querySelector(".password-toggle");

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    passwordToggle.innerHTML = '<i class="fa-solid fa-eye"></i>';
                    passwordToggle.querySelector("i").classList.add("active");
                } else {
                    passwordInput.type = "password";
                    passwordToggle.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
                }

                }
            </script>
    <!----End main content----->
</body>
</html>
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
    <title>
        <?php echo "Instructor Page"; ?>
    </title>

    <!----------CSS------------>
    <link rel="stylesheet" href="style_instructors.css">

    <!----------BOOTSTRAP------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

    <!----------ALERTS-------------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!---Inner topbar--->
    <?php include('topbar.php'); ?>

</head>

<!----Body----->

<body>
    <section class="bg-section">
        <!---------Sidebar------------>
        <?php include('sidebar-instructor.php'); ?>

        <!---------End Sidebar--------->

        <!--Main Content-->
        <main class="pcoded-main-content">
          <div class="container pt-4">
            <div class="col-lg-12">
            <div class="centered">
                
                <div class="student_prog">
                    <h1>NSTP PROGRAMS / FEEDING PROGRAM</h1>
                </div>
            </div>
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

            <div class="inner_feed-5">
                <h1>Brgy. Buhay na Tubig</h1>
                <p>Location</p>
                <i class="fa-solid fa-location-dot"></i>
                <button type="submit" class="btn btn-primary">+ VOLUNTEER NOW</button>
            </div>
        </div>
          </div>       
        </main>     
    </section>
            <!-----End Main content------>
             <!-----End of Body------>
</body>
</html>
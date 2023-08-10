<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!----------TITLE------------>
<link rel="shortcut icon" href="logo.png" type="">
    <title>
        <?php echo "Admin Page"; ?>
    </title>

    <!----------CSS------------>
    <link rel="stylesheet" href="style_admin.css">

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

    <!----------ALERTS-------------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!---Inner topbar--->
<?php include('topbar.php');?>

</head>

<!----Body----->
<body>
<section class="bg-section">
   <!---------Sidebar------------>
        <?php include('sidebar-admin.php');?>

        <!--Main Content-->
        <main class="pcoded-main-content">
            <div class="container">
                <div class="col-lg-12">
        <div class="admin_external">
            <h1>NSTP ACTIVITIES</h1>
        </div>
    </div>
</div>

<div class="cwtsclass">
    <div class="inner_cwtsclass">
        <h1>Civil Welfare Training Service Classes</h1>
    </div>

    <div class="cwtsclass-2">
        <button type="submit" class="btn btn-primary">+ NEW ACTIVITIES</button>
    </div>
</div>
</div>
            </div>
        </main>
                    <!-----End Main content------>        
        
<!-----End of Body------>
</section>
</body>
</html>    
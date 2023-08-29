<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----------TITLE------------>
    <link rel="short icon" href="logo-shortcut-icon.png" type="">
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

    <!----------ICONS------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>

    <!---Inner topbar--->
    <?php include('topbar.php'); ?>

</head>

<!----Body----->

<body>
    <section class="bg-section">
        <!---------Sidebar------------>
        <?php include('sidebar-admin.php'); ?>

        <!---------End Sidebar--------->

        <!--Main Content-->
        <div class="pcoded-main-content">
            <div class="container pt-4">
                <div class="col-sm-12">
                    <div class="compliance2-title">
                        <div class="compliance-items">
                            <h2>How much time is needed to complete the NSTP?</h2>
                        </div>
                        <div class="compliance2-middle-box">
                            <p>Each of the NSTP program components shall be undertaken for an academic period of two
                                semesters (NSTP 1 and 2) or an equivalent one-semester integrated (NSTP 1-2) course. The
                                allotted time for NSTP classes per semester is 54 – 90 hours.</p>
                            <p> The whole NSTP program weighs six units and should be taken for two semesters, three
                                units each semester.</p>
                        </div>
                        <div class="compliance2-button">
                            <a href="admin-compliance.php">
                                <ion-icon name="arrow-back-circle-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
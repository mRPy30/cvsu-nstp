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
                    <div class="compliance3-title">
                        <h4>Government Mandate</h4>
                        <div class="compliance3-button">
                            <a href="admin-compliance.php">
                                <ion-icon name="arrow-back-circle-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                    <div class="images-gov">
                        <div class="inner-content1">
                            <div class="col-sm-4">
                                <img src="compliance_law1.png">
                            </div>
                        </div>
                        <div class="inner-content1">
                            <div class="col-sm-4">
                                <img src="compliance_law2.png">
                            </div>
                        </div>
                        <div class="inner-content1">
                            <div class="col-sm-4">
                                <img src="compliance_law3.png">
                            </div>
                        </div>

                    </div>

                    <div class="content-link">
                        <div class="inner-link">
                            <p>View PDF file <a
                                    href="https://www.officialgazette.gov.ph/downloads/2021/11nov/20211123rev-IRR-RA-9163-RRD.pdf">Click
                                    Here</a>.
                            </p>
                        </div>
                        <div class="inner-link">
                            <p>View PDF file <a
                                    href="https://hrep-website.s3.ap-southeast-1.amazonaws.com/legisdocs/basic_19/HB03513.pdf">Click
                                    Here</a>.
                            </p>
                        </div>
                        <div class="inner-link">
                            <p>View PDF file <a href="https://legacy.senate.gov.ph/lisdata/3181428674!.pdf">Click
                                    Here</a>.
                            </p>
                        </div>
                    </div>

                    <div class="list-content">
                        <div class="Govermentlink">
                            <ul>
                                <li class="gov-link"><a href="">National Service Training Program (NSTP) Act of 2001</a>
                                </li>
                                <li class="gov-link"><a href="">National Service Law</a></li>
                                <li class="gov-link"><a href="">Citizen Armed Force or Armed Forces of the Philippines
                                        Reservist Act</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>

</body>

</html>
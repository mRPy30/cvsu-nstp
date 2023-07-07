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
    <link rel="stylesheet" href="style_students.css">

     <!----------BOOTSTRAP------------>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     
     <!----------FONTS------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Inter:wght@400;800&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <!----------ICONS------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>


     
<!---Inner topbar--->
<?php include('topbar.php');?>

</head>

<!----Body----->
<body>
    <section class="bg-section">
   <!---------Sidebar------------>
   <?php include('sidebar-student.php');?>
    <!---------End Sidebar--------->
        
        <!--Main Content-->
        <div class="pcoded-main-content">
            <div class="container pt-4">
                <div class="col-lg-12">
                    <div class="homepage-title">
                        <h1>PRE PRE PRE</h1>
                    </div>
                    <!----box--->
                        <div class="col">
                            <div class="box">
                                <div class="content-box">
                                    <h3>NSTP 1</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="box-small">
                                <div class="content-box">
                                    <h3>NSTP 1</h3>
                                </div>
                            </div>
                        </div>    
                        <div class="col-8">
                            <div class="box-small">
                                <div class="content-box">
                                    <h3>NSTP 1</h3>
                                </div>
                            </div>
                        </div>        
                </div>
            </div>
        </div> 
              
    <!-----End Main content------>        
    </section>
<!-----End of Body------>
</body>
</html>
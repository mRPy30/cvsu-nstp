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
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>

    <!---Inner topbar--->
     <?php include('topbar.php');?>
        
</head>

<!----Body----->

<body>
    <main class="bg-section">
        <!---------Sidebar------------>
        <?php include('sidebar-instructor.php');?>
         
        <!---------End Sidebar--------->

        <!--Main Content-->
    <div class="instructor-desc">
        <div class="container">
            <div class="row ">
                <div class="col-md-9 description1">
                    <h4>National Service Training Program 1</h4>
                    <p>                The course mandated by Republic Act No. 9163, otherwise known as the National Service Training Act of 2001, aims to enhance the civic consciousness of the students “by developing the ethics of service and patriotism” while undergoing Civic Welfare Training Service (CWTS). NSTP1 covers topics through big sessions in campus that will tap on the students’ enthusiasm and idealism for nation-building, leadership and civic involvement. Combining active reflection in a creative dynamic learning environment, it prepares the students into actual community service in NSTP 2.</p>
                </div>
                <div class="col-md-9 description2">
                    <h4>National Service Training Program 2</h4>
                    <p>This course is the natural follow through of the Civic Welfare Training Service (CWTS) the students underwent in NSTP 1. It includes the programs and activities highlighted by the community service/immersion that are contributory to the welfare and the betterment of the life of the members of the community. Among the areas where the students can make their contribution through CWTS 2 are education, environment, entrepreneurship, health and safety and the moral development of the members of the community where they render service. It is hoped that this course will point them to a clearer life-long engagement in service and volunteerism. </p>
                </div>
            </div>
        </div>
    </div>
        <!-----End Main content------>
    </main>
    <!-----End of Body------>
</body>

</html>
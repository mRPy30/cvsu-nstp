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
              <div class="tbl-volunteer">
                <h5>Volunteer List</h5>
                <button type="button" type="submit" class="btn" value="submit">Submit</button>
                <table class="table table-hover ">
                    <thead class="title">
                      <tr>
                        <th scope="col" >Student Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total Attendance</th>
                      </tr>
                    </thead>
                    <tbody class="overflow-y-auto">
                      <tr>
                        <th>Agustine Cuevas</th>
                        <td>03/12/2023</td>
                        <td><input type="text"></td>
                      </tr>
                      <tr>
                        <th>Agustine Cuevas</th>
                        <td>03/12/2023</td>
                        <td><input type="text"></td>
                      </tr>
                      <tr>
                        <th>Agustine Cuevas</th>
                        <td>03/12/2023</td>
                        <td><input type="text"></td>
                      </tr>
                      <tr>
                        <th>Agustine Cuevas</th>
                        <td>03/12/2023</td>
                        <td><input type="text"></td>
                      </tr>
                      <tr>
                        <th >Bianca Bautista</th>
                        <td>03/12/2023</td>
                        <td><input type="text"></td>
                      </tr>
                      <tr>
                        <th>Agustine Cuevas</th>
                        <td>03/12/2023</td>
                        <td><input type="text"></td>
                      </tr>
                      <tr>
                        <th >Bianca Bautista</th>
                        <td>03/12/2023</td>
                        <td><input type="text"></td>
                      </tr>
                    </tbody>
                </table>
              </div>



              <div class="tbl-volunteer">
                <h5>Upcoming Events</h5>
                <table class="table table-hover overflow-scroll">
                    <thead class="title">
                      <tr>
                        <th scope="col">Program Name</th>
                        <th scope="col">Location</th>
                        <th scope="col">Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>Feeding Program</th>
                        <td>Dulong Bayan Imus City</td>
                        <td>09/15/2023</td>
                      </tr>
                      <tr>
                        <th>First Aid program</th>
                        <td>Buhay na Tubig Imus Cavite </td>
                        <td>10/27/2023</td>
                      </tr>
                      <tr>
                        <th>Blood Donation Program</th>
                        <td>Habay Bacoor City Cavite </td>
                        <td>11/05/2023</td>
                      </tr>
                    </tbody>
                </table>
              </div>  
              
          </div>       
        </main>     
    </section>
            <!-----End Main content------>
             <!-----End of Body------>
</body>
</html>
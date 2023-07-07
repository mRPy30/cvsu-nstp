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
    <link rel="stylesheet" href="style_instructor.css">

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
    <main class="bg-section">
        <!---------Sidebar------------>
        <?php include('sidebar-instructor.php'); ?>

        <!---------End Sidebar--------->

        <!--Main Content-->
        <div class="tbl-volunteer">
    <div class="container">
        <div class="row">
            <div class="tbl-volunteer-title">
                <h5>VOLUNTEER LIST :</h5>
            </div>
            <table class="table">
                <thead class="title">
                  <tr>
                    <th scope="col" >Student Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Attendance</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="vul-line1">
                    <td></td>
                    <td></td>
                    <td>Present Absent</td>
                  </tr>
                  <tr>
                    <th>Agustine Cuevas</th>
                    <td>03/12/2023</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th >Bianca Bautista</th>
                    <td>03/12/2023</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Agustine Cuevas</th>
                    <td>03/12/2023</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th >Bianca Bautista</th>
                    <td>03/12/2023</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
        </div>

        <div class="">

        </div>


        <div class="row">
          <div class="tbl-volunteer-title">
              <h5>UPCOMING EVENTS :</h5>
          </div>
          <table class="table">
              <thead class="title">
                <tr>
                  <th scope="col" >Program Name</th>
                  <th scope="col">Location</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody>
                <tr class="vul-line1">
                  <td></td>
                  <td></td>
                  <td>Absent</td>
                </tr>
                <tr>
                  <th>Agustine Cuevas</th>
                  <td>03/12/2023</td>
                  <td></td>
                </tr>
                <tr>
                  <th >Bianca Bautista</th>
                  <td>03/12/2023</td>
                  <td></td>
                </tr>
              </tbody>
            </table>
      </div>

    </div>
</div>
        <!-----End Main content------>
    </main>
    <!-----End of Body------>
</body>

</html>
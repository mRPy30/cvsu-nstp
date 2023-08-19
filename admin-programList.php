<?php
include 'db_connect.php';

$programs = array(); // Initialize an empty array to store program details

$sql = "SELECT p.*, i.instructorName
        FROM tbl_program p
        JOIN instructor i ON p.instructorID = i.id";
$result_program = $conn->query($sql);

if ($result_program->num_rows > 0) {
    while ($row = $result_program->fetch_assoc()) {
        // Store the program details in the array
        $programs[] = array(
            'programID' => $row["programID"],
            'programName' => $row["programName"],
            'programLocation' => $row["programLocation"],
            'description' => $row["description"],
            'instructorID' => $row["instructorID"],
            'volunteers' => $row["volunteers"],
            'instructorName' => $row["instructorName"],
            'scheduleDate' => $row["scheduleDate"],
            'start_time' => $row["start_time"],
            'end_time' => $row["end_time"]

        );
    }
} else {
    echo "<tr><td colspan='9'>No records found</td></tr>";
}

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
        <?php echo "Coordinator Page"; ?>
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

    <!----------ALERTS-------------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




    <!---Inner topbar--->
    <?php include('topbar.php'); ?>

</head>

<!----Body----->

<body>
    <section class="bg-section">
        <!---------Sidebar------------>
        <?php include('sidebar-admin.php'); ?>

        <!--Main Content-->
        <main class="pcoded-main-content">
            <div class="container">
                <div class="col-lg-12">
                    <div class="rec-content">
                        <!-- Add your main content here -->
                        <div class="upperbox">
                            <h4> PROGRAMS </h4>
                        </div>
                        <div class="align-tbl-programs">
                            <div class="tabledisplay-program">
                                <table id="program-table">
                                    <tr>
                                        <th>PROGRAM</th>
                                        <th>INSTRUCTOR</th>
                                        <th>REGISTERED VOLUNTEERS</th>
                                    </tr>
                                    <?php
                                    // Assuming you have fetched data from the database into an array called $programs
                                    foreach ($programs as $program) {
                                        $programName = $program['programName'];
                                        $instructorName = $program['instructorName']; // Assuming you fetch instructorName along with program data
                                        $volunteerCount = $program['volunteers'];
                                        $programID = $program['programID'];

                                        echo "<tr class='clickable-row' data-href='programDetails.php?programID={$programID}'>";
                                        echo "<td>$programName</td>";
                                        echo "<td>$instructorName</td>";
                                        echo "<td>$volunteerCount</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    <!-- Add more rows as needed -->
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
        </main>
    </section>


    <script>
        // Add click event listener to all rows with class 'clickable-row'
        var rows = document.querySelectorAll(".clickable-row");
        rows.forEach(function (row) {
            row.addEventListener("click", function () {
                var href = row.getAttribute("data-href");
                if (href) {
                    window.location.href = href;
                }
            });
        });
    </script>
    </script>
</body>

</html>
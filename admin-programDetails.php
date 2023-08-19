<?php
include 'db_connect.php';

if (isset($_GET['programID'])) {
    // Retrieve the programID value from the URL and sanitize it
    $programID = filter_input(INPUT_GET, 'programID', FILTER_SANITIZE_NUMBER_INT);
}

$programs = array(); // Initialize an empty array to store program details

$sql = "SELECT p.*, i.instructorName
        FROM tbl_program p
        JOIN instructor i ON p.instructorID = i.id
        WHERE programID = $programID";


$result_program = $conn->query($sql);
if ($result_program->num_rows > 0) {
    while ($row = $result_program->fetch_assoc()) {
        // Format the scheduleDate to "month day, year" format
        $formattedScheduleDate = date('F j, Y', strtotime($row["scheduleDate"]));

        // Store the program details in the array
        $programs[] = array(
            'programName' => $row["programName"],
            'programLocation' => $row["programLocation"],
            'description' => $row["description"],
            'instructorID' => $row["instructorID"],
            'volunteers' => $row["volunteers"],
            'instructorName' => $row["instructorName"],
            'formattedScheduleDate' => $formattedScheduleDate, // Store the formatted date
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
<html>
<head>
    <style>
        /* CSS for topbar */
        .topbar {
            background-color: #6FBB76;
            color: #fff;
            padding: 20px;
        }

        .topbar .logout {
            float: right;
            color: #fff;
            text-decoration: none;
        }

        /* CSS for sidebar */
        .sidebar {
            background-color: #f1f1f1;
            float: left;
            width: 200px;
            height: 100vh;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px;
            background-color: #ddd;
            cursor: pointer;
        }

        .sidebar ul li:hover {
            background-color: #ccc;
        }

        /* CSS for content */
        .content {
            margin-left: 200px; /* Adjust this value to match the width of the sidebar */
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .records_box {
            height: 75px;
            width: 300px;
            border: solid black 1px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            padding: 10px;
            margin: 10px;
            border-radius: 12px;
            margin-top: 0;
        }

        h1 {
            margin: 0; /* Reset the margin for the h1 element */
            margin-left: 50px;
        }

        p {
            font-size: 20px;
            color: black;
            margin: 0; /* Reset the margin for the p element */
            margin-bottom: 10px;
        }

        .upperbox { 
            border-bottom: solid black 1px;
            height: 50px;
            width: 100%;
            display: flex;
            margin-bottom: 20px;
        }

        .upperbox h4 {
            margin-left: 15px;
        }
        
        .upperbox .go-back-button {
            margin-left: 850px;
            display: inline-block;
            padding: 10px 20px;
            height: 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }
        .middlebox {
            padding: 5px;
            margin: 5px;
            width: 1150px;
            height: 550px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-content: flex-start;
            margin-left: px;
            padding-top: 20px;
            margin-top: 20px;
            border: solid 1px black;
            justify-content: space-evenly;
        }

        .new-program {
            height: 75px;
            width: 300px;
            border: solid black 1px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            padding: 10px;
            margin: 10px;
            border-radius: 12px;
            margin-top: 0;
        }

        .program-list{
            height: 75px;
            width: 300px;
            border: solid black 1px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            padding: 10px;
            margin: 10px;
            border-radius: 12px;
            margin-top: 0;
        }

        /* Style for the three-column table */
        .three-column-table {
            width: 80%;
            border-collapse: collapse;
            border: 1px solid #e0e0e0;
            margin: 20px 0;
        }

        /* Style for table headers */
        .three-column-table th {
            background-color: #f5f5f5;
            border: 1px solid #e0e0e0;
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }

        /* Style for table data cells */
        .three-column-table td {
            border: 1px solid #e0e0e0;
            padding: 10px;
        }

        /* Style for alternating row colors */
        .three-column-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }


        .info-box{
            border: 1px solid black;
            padding: 10px;
            display: flex;
            width: 1100px;
            justify-content: space-evenly;
        }

        
        .table-box{
            border: 1px solid black;
            padding: 10px;
            display: flex;
            width: 1100px;
            justify-content: space-evenly;
            margin-top: 5px;
        }

        .box{
            border: 1px solid black;
            height: 100px;
            width: 400px;
            border-radius:10px;
            margin: 5px;
        }



    </style>
</head>
<body>
    <!-- Topbar -->
    <div class="topbar">
        <a class="logout" href="log-in.php">Logout</a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul>
            <li><a href="adminpage.php">Home</a></li>
            <li><a href="records.php">Records</a></li>
            <li><a href="schedule.php">Schedule</a></li>
            <li><a href="programs.php">Programs</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="compliance.php">Compliance</a></li>
        </ul>
    </div>

    

    <!-- Main content -->
    <div class="content">

        <div class="upperbox">
            <h4><?php echo $programs[0]['programName']; ?></h4>
            <a href="programs.php" class="go-back-button">Go Back</a>
        </div>


                
        <div class="middlebox">

            <div class="info-box">

                <div class="box">
                    <h4><?php echo $programs[0]['programLocation']; ?></h4>
                </div>

                <div class="box">
                    <h4><?php echo $programs[0]['instructorName']; ?></h4>
                </div>
                
                <div class="box">
                    <h4><?php echo $programs[0]['formattedScheduleDate']; ?></h4>
                </div>

            </div>

            <div class="table-box">

                <div class="tabledisplay">
                    <table class="three-column-table">
                        <tr>
                            <th>Student Name</th>
                            <th>Section </th>
                            <th>Traning Program</th>
                        </tr>
                     </table>
                </div>

            </div>


        





















        </div>











        </div>
        



    </script>
</body>
</html>

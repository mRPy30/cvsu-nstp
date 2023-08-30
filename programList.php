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

        .middlebox {
            padding: 5px;
            margin: 5px;
            width: 800px;
            height: 550px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-content: flex-start;
            margin-left: 200px;
            padding-top: 20px;
            margin-top: 20px;
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
            width: 800px;
            height: 550px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-content: flex-start;
            margin-left: 200px;
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
            <h4>PROGRAMS</h4>
            <a href="programs.php" class="go-back-button">Go Back</a>
        </div>
<div class="middlebox">

<table class="three-column-table">
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
        


        <script>
    // Add click event listener to all rows with class 'clickable-row'
    var rows = document.querySelectorAll(".clickable-row");
    rows.forEach(function(row) {
        row.addEventListener("click", function() {
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

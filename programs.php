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
            <a href="records.php" class="go-back-button">Go Back</a>
        </div>

        <div class="middlebox">

            <div class="new-program">
                <h3> <a href="createProgram.php">Create Program</a> </h3>
            </div>  

            <div class="program-list">
               <h3> <a href="programList.php">Program List</a> </h3>
            </div>

        </div>











        </div>
        



    </script>
</body>
</html>

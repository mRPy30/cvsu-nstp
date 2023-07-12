<?php
include 'topbar.php';
include 'db_connect.php';
include 'sidebar.php';

session_start();



$selectedsectionID = "";
$selectedsectionName = "";
$selectedCourseName = "";

if (isset($_GET['sectionID']) && isset($_GET['sectionName'])) {
    $selectedsectionID = $_GET['sectionID'];
    $selectedsectionName = $_GET['sectionName'];

    $_SESSION['selectedsectionID'] = $selectedsectionID;
    $_SESSION['selectedsectionName'] = $selectedsectionName;

} elseif (isset($_SESSION['selectedsectionID']) && isset($_SESSION['selectedsectionName'])) {
    $selectedsectionID = $_SESSION['selectedsectionID'];
    $selectedsectionName = $_SESSION['selectedsectionName'];
}








// Fetch section details from the database
$sql = "SELECT * FROM tbl_sections WHERE sectionID = '$selectedsectionID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sectionData = $result->fetch_assoc();
    $courseID = $sectionData['courseID'];

    // Fetch course name from the database
    $sql = "SELECT courseName FROM tbl_course WHERE courseID = '$courseID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $courseData = $result->fetch_assoc();
        $selectedCourseName = $courseData['courseName'];
    }
}



$sql = "SELECT id, name FROM student WHERE sectionID = '$selectedsectionID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $students = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $students = array();
}
?>



<!DOCTYPE html>
<html>
<head>
    <style>


<!DOCTYPE html>
<html>
<head>
    <style>
         /* CSS styles for the table display */
         .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            position
            
        }
        #course-table {
            width: 500px;
            margin: 10px;
            
        }
        
        #course-table th, #course-table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        
        #course-table th {
            text-align: left;
        }
        
        #course-table tbody tr:hover {
            background-color: #f5f5f5;
        }
        
        #course-table .edit-button, #course-table .delete-button {
            padding: 6px 10px;
            border: none;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }
        
        #course-table .edit-button {
            background-color: #2196F3;
            border-radius:4px;
        }
        
        #course-table .delete-button {
            background-color: #f44336;
            border-radius:4px;
        }

        .upperbox {
            border-bottom: solid black 1px;
            height: 50px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .searchbox {
            display: flex;
            align-items: center;
            margin-left: auto; /* Adjust the margin as needed */
            margin-right: 20px; /* Adjust the margin as needed */
            
        }

        .searchbox input[type="text"] {
            width: 300px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            height: 38px;
        }

        .print button {
            background-color: white;
            border: 1px solid black;
            border-radius: 3px;
            padding: 5px 10px;
            color: black;
            cursor: pointer;
            height: 38px;
            margin-right: 15px;
        }

        .upperbox .go-back-button {
            padding: 10px 20px;
            height: 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }

        .upperbox .go-back-button:hover {
            background-color: #45a049;
        }

        .tabledisplay {
            width: 300px;
            border: solid black 1px;
            display: flex;
            justify-content: center;
            overflow: hidden;
            flex-direction: column;
            

        }

        #course-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        #course-table th,
        #course-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        #course-table th {
            background-color: #f2f2f2;
        }

        .edit-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            border-radius: 3px;
        }

        .delete-button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            border-radius: 3px;
        }

       
        .lowerbox {
            width: 120px;
            margin-top: 500px; /* Adjust the margin-top value as needed */
            position: sticky;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 999;
        }
        /* CSS styles for the popup form */
        #add-section-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }

        .form-container {
            width: 300px;
        }

        .form-container h4 {
            margin-top: 0;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .form-container button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            border-radius: 3px;
        }

        .form-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }
        
        @media print {
            .upperbox,
            .lowerbox,
            .searchbox
            .sidebar{
                display: none;
            }
        }

        .course-and-section{
            padding: 5px;
            margin: 5px;
        }
        </style>
</head>
<body>

    <div class="content print-container">
         <!--------------------------------- DIV PARA SA TITLE AT GO BACK BUTTON ----------------------------------->
        <div class="upperbox">
        <h3><?php echo $selectedCourseName; ?></h3>
            
            <div class="searchbox">
            <input  type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search student name...">
            </div>

            <div class="print">
            <button onclick="window.print()"> Print</button>
            </div>

            <a href="recordsStudent.php" class="go-back-button">Go Back</a>
        </div>


                    <!--------------------------------- TABLE FOR STUDENTS ----------------------------------->

        <div class="tabledisplay">
            <div class="course-and-section">
                <p><?php echo $selectedCourseName . ' - ' . $selectedsectionName; ?></p>
            </div>
            
            <table id="course-table">
                <thead>
                    <tr>
                        <th>Student Names</th>
                    </tr>
                </thead>
                <tbody class="scrollable-tbody">
                    <?php if (!empty($students)): ?>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td>
                                <a href="studentData.php?id=<?php echo $student['id']; ?>">
                                        <?php echo $student['name']; ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">No students found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


</body>
</html>
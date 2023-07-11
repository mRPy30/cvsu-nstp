<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['expenseID']) && isset($_POST['deleteExpense'])) {
        // Delete existing expense
        $expenseID = $_POST['expenseID'];

        // Delete the expense from the database
        $deleteQuery = "DELETE FROM tbl_expenses WHERE expenseID = '$expenseID'";
        $conn->query($deleteQuery);

        // Redirect back to the page to refresh the expense table
        header('Location: admin-records_Finances.php');
        exit();
        
    } elseif (isset($_POST['expenseID'])) {
        // Update existing expense
        $expenseID = $_POST['expenseID'];
        $expenseName = $_POST['expenseName'];
        $year = $_POST['year'];
        $amount = $_POST['amount'];

        // Update the expense record in the database
        $updateQuery = "UPDATE tbl_expenses SET expenseName = '$expenseName', yearID = '$year', amount = '$amount' WHERE expenseID = '$expenseID'";
        $conn->query($updateQuery);
        
        // Redirect back to the page to refresh the expense table
        header('Location: admin-records_Finances.php');
        exit();
    } else {
        // Insert new expense
        $expenseName = $_POST['expenseName'];
        $year = $_POST['year'];
        $amount = $_POST['amount'];

        // Insert the new expense into the database
        $insertQuery = "INSERT INTO tbl_expenses (expenseName, yearID, amount) VALUES ('$expenseName', '$year' , '$amount')";
        $conn->query($insertQuery);
        
        // Redirect back to the page to refresh the expense table
        header('Location: admin-records_Finances.php');
        exit();
    }
}
?>
    

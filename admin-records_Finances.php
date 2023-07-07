<?php
include 'db_connect.php';



$query = "SELECT expenseID, expenseName, yearID, amount FROM tbl_expenses ";
$result= mysqli_query($conn, $query);


if ($result->num_rows > 0) {
    $expenses = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $expenses = array();


}

// Retrieving the budget for the year 2023
$query = "SELECT total_budget FROM tbl_budget WHERE yearID = 2023";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$totalBudget = $row['total_budget'];


// Retrieving the total expenses for the year 2023
$query = "SELECT SUM(amount) AS total_expenses FROM tbl_expenses  WHERE yearID = 2023";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$totalExpenses = $row['total_expenses'];

// Calculating the remaining budget
$remainingBudget = $totalBudget - $totalExpenses;
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .upperbox {
            border-bottom: solid black 1px;
            height: 50px;
            width: 100%;
            display: flex;
            margin-bottom: 5px;
           
        }

        .upperbox .go-back-button {
            margin-left: 890px;
            display: inline-block;
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

        .course-box {
            border: solid 1px black;
            margin: 10px;
            width: 250px;
            padding: 10px 20px;
            align-items: center;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
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
         
        }

        

        .status-box{
            border: solid 1px black;
            width: 1130px;
            height: 170px;
            display: flex;
            justify-content: space-evenly;
        }


        .budget-box{
            border: solid 1px black;
           width:  400px;
            height: 150px;
            margin: 10px;
            text-align: center;
        }

        .total-expenses-box{
            border: solid 1px black;
            width:  400px;
            height: 150px;
            margin: 10px;
            text-align: center;
            
        }

        .table-box{
            border: solid 1px black;
            width: 1130px;
            height: 400px;
            margin-top: 10px;
        

        }

        .table-box p{
            margin:10px;
            display: flex;
        }
        

        
        .tabledisplay {
            width: 900px;
            border: solid black 1px;
            display: flex;
            justify-content: center;
            overflow: hidden;
            flex-direction: column;
            padding: 10px;
            margin-left: 50px;
        }

        #expense-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        #expense-table th,
        #expense-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        #expense-table th {
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
            margin-top: 210px; /* Adjust the margin-top value as needed */
            position: sticky;
         
            left: 50%;
            transform: translateX(-50%);
            z-index: 999;
        }

        .add-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border: none;
        cursor: pointer;
        }

        /* Style for the Add button on hover */
        .add-button:hover {
        opacity: 0.8;
        }

        .form-popup select {
        width: 275px;
        border: 1px solid black;
        font-size: 14px;
        border-radius: 5px;
        padding: 12px;
        display: block;
    }

         /* CSS styles for the popup form */
        
         #addForm {
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

        /* Style for the form container */
        .form-container {
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            max-width: 500px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        /* Style for the close button */
        .form-container .cancel {
        color: #aaa;
        float: right;
        font-size: 14px;
        font-weight: bold;
        border: none;
        }

        /* Style for the close button on hover */
        .form-container .cancel:hover {
        color: black;
        cursor: pointer;
        }

        /* Style for the Add button */
        .add-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border: none;
        cursor: pointer;
        }

        /* Style for the Add button on hover */
        .add-button:hover {
        opacity: 0.8;
        }

        .form-popup select {
        width: 275px;
        border: 1px solid black;
        font-size: 14px;
        border-radius: 5px;
        padding: 12px;
        display: block;
    }


    </style>
</head>
<body>


    <div class="content">
         <!--------------------------------- DIV PARA SA TITLE AT GO BACK BUTTON ----------------------------------->
       <div class="upperbox">
            <h4>FINANCIAL RECORDS</h4>
            <a href="records.php" class="go-back-button">Go Back</a>
        </div>


        <div class="middlebox">

            <div class="status-box">
           <div class="budget-box">
            <h1><?php echo '₱' , $totalBudget?></h1>
            <p>BUDGET</p>

           </div>

           <div class="total-expenses-box">
           <h1><?php echo  '₱' ,$totalExpenses?></h1>
           <p> TOTAL EXPENSES</p>
           </div>

           <div class="total-expenses-box">
           <h1><?php echo  '₱' ,$remainingBudget?></h1>
           <p> REMAINING BUDGET</p>
           </div>
            
          
           </div>
            <!--------------------------------- TABLE FOR EXPENSES ----------------------------------->


            <div class="table-box">

            <p>EXPENSES</p>


            <div class="tabledisplay">

          

           
            <table id="expense-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Amount Spent</th>
                        <th>Modify</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($expenses as $expense): ?>
                        <tr>
                            <td><?php echo $expense['expenseName']; ?></td>
                            <td><?php echo $expense['yearID']; ?></td>
                            <td><?php echo $expense['amount']; ?></td>
                            <td>
                                <button class="edit-button" onclick="openEditForm(<?php echo $expense['expenseID']; ?>)" data-expense-id="<?php echo $expense['expenseID']; ?>">Edit</button>
                                <button class="delete-button" onclick="deleteExpense(<?php echo $expense['expenseID']; ?>)">Delete</button>
                            </td>
                        </tr>
                        <?php
                        $expenseID = $expense['expenseID'];
                        $expenseName = $expense['expenseName'];
                        $year = $expense['yearID'];
                        $amount = $expense['amount'];
                        ?>
                    <?php endforeach; ?>
                 </tbody>
            </table>
        </div>


        


        <div class="lowerbox">
            <button id="add-button" class="add-button" >Add Expense</button>
        </div>

















          

      
    </div>


     

            <!----------------------------- Add expense form (hidden by default) ------------------------>


                <div id="addForm" class="form-popup">
                <form action="manageExpense.php" method="POST" class="form-container" enctype="multipart/form-data">
                <h2>Add Expense</h2>



                <label for="expenseName"><b>Title</b></label>
                <input type="text" placeholder="Enter Expense Name" name="expenseName" required>


                <label for="year"><b>Year</b></label>
                <input type="text" placeholder="Enter year" name="year" required>


                
                <label for="amount"><b>Amount</b></label>
                <input type="text" placeholder="Enter amount spent" name="amount" required>
                
                <br> <br>

                <button type="submit" class="btn" onclick="closeAddForm()">Add</button>
                <button type="button" class="btn cancel" onclick="closeAddForm()">Cancel</button>
            </form>
            </div>
        

  

           
            <!--pop up form for editing the expense details-->
            <div id="editForm" class="form-popup">
            <form action="manageExpense.php" method="POST" class="form-container" enctype="multipart/form-data">
                <h2>Edit Expense</h2>

                <input type="hidden" id="expenseID" name="expenseID" value="<?php echo $expenseID; ?>">

                <label for="expenseName"><b>Title</b></label>
                <input type="text" placeholder="Enter Expense Name" id="expenseName" name="expenseName" value="<?php echo $expenseName; ?>" required>

                <label for="year"><b>Year</b></label>
                <input type="text" placeholder="Enter year" id="year" name="year" value="<?php echo $year; ?>" required>

                <label for="amount"><b>Amount</b></label>
                <input type="text" placeholder="Enter amount spent" id="amount" name="amount" value="<?php echo $amount; ?>" required>

                <br> <br>

                <button type="submit" class="btn" onclick="closeEditForm()">Update</button>
                <button type="button" class="btn cancel" onclick="closeEditForm()">Cancel</button>
            </form>
            </div>

            
            <form id="deleteExpenseForm" action="manageExpense.php" method="post">
                <input type="hidden" name="expenseID" id="expenseIDInput">
                <input type="hidden" name="deleteExpense" value="1">
            </form>




<script>
        // ---------------------------------- adding instructor open js -------------------------------- //


       



                // --------------------------OPENING ADDING FORM ------------------===============//

                // Get the button element
                var addExpenseButton = document.getElementById('add-button');

                // Get the popup form element
                var addExpenseForm = document.getElementById('addForm');

                // Add an event listener to the button for the click event
                addExpenseButton.addEventListener('click', function(event) {
                // Prevent the default form submission behavior
                event.preventDefault();

                // Show the popup form
                addExpenseForm.style.display = 'block';
                });

                  // Close the add form
                  function closeAddForm() {
                addExpenseForm.style.display = 'none';
                }


                // ------------------------- OPENING EDITING FORM --------------------------------//


                // Get the button elements for edit buttons
                var editButtons = document.getElementsByClassName('edit-button');

                // Add event listeners to each "Edit" button
                Array.from(editButtons).forEach(function(editButton) {
                editButton.addEventListener('click', function(event) {
                    var expenseID = event.target.getAttribute('data-expense-id');
                    openEditForm(expenseID);
                });
                });

                function openEditForm(expenseID) {
                    var expenses = <?php echo json_encode($expenses); ?>;
                    var expense = expenses.find(function(e) {
                        return e.expenseID === expenseID;
                    });

                    if (expense) {
                        document.getElementById("expenseID").value = expense.expenseID;
                        document.getElementById("expenseName").value = expense.expenseName;
                        document.getElementById("year").value = expense.yearID;
                        document.getElementById("amount").value = expense.amount;
                        document.getElementById("editForm").style.display = 'block';
                    }
                    }
              
                // Close the edit form
                function closeEditForm() {
                document.getElementById("editForm").style.display = 'none';
                }



                //--------------------------- DELETE CONFIRMATION PROMPT ------------------------------//
                function deleteExpense(expenseID) {
                    if (confirm("Are you sure you want to delete this expense?")) {
                        document.getElementById('expenseIDInput').value = expenseID;
                        document.getElementById('deleteExpenseForm').submit();
                    }
                }

                
         </script>
    
</body>
</html>
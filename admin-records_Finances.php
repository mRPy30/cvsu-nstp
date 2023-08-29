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
$query = "SELECT total_budget FROM tbl_budget WHERE yearID = 1";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$totalBudget = $row['total_budget'];


// Retrieving the total expenses for the year 2023
$query = "SELECT SUM(amount) AS total_expenses FROM tbl_expenses  WHERE yearID = 1";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$totalExpenses = $row['total_expenses'];

// Calculating the remaining budget
$remainingBudget = $totalBudget - $totalExpenses;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----------TITLE------------>
    <link rel="short icon" href="logo-shortcut-icon.png" type="">
    <title><?php echo "Coordinator Page"; ?></title>

     <!----------CSS------------>
    <link rel="stylesheet" href="style_admin.css">

      <!----------BOOTSTRAP------------>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     
     <!----------FONTS------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Inter:wght@400;800&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <!----------ICONS------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>

    <!----------ALERTS-------------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



     
<!---Inner topbar--->
<?php include('topbar.php');?>

</head>

<!----Body----->
<body>
<section class="bg-section">
   <!---------Sidebar------------>
        <?php include('sidebar-admin.php');?>

        <!--Main Content-->
        <main class="pcoded-main-content">
            <div class="container">
                <div class="col-lg-12">
                    <div class="rec-content">
                                                                 <!--------------------------------- DIV PARA SA TITLE AT GO BACK BUTTON ----------------------------------->
                        <div class="upperbox">
                            <h4>FINANCIAL RECORDS</h4>
                                <div class="addbox">
                                    <button id="add-button" class="add-button" >Add Expense</button>
                                </div>
                            <a href="admin-records.php" class="go-back-button"><ion-icon
                                    name="arrow-back-circle-outline"></ion-icon></a>
                        </div>

                        

                        <div class="middlebox-finance">
                            <div class="status-box">
                                    <div class="budget-box">
                                        <ion-icon name="card-outline"></ion-icon>
                                        <h1><?php echo '₱' , $totalBudget?></h1>
                                        <p>Budget</p>
                                    </div>
                                
                                    <div class="total-expenses-box">
                                        <ion-icon name="receipt-outline"></ion-icon>
                                        <h1><?php echo  '₱' ,$totalExpenses?></h1>
                                        <p> Total Expenses</p>
                                    </div>

                                    <div class="total-expenses-box">
                                        <ion-icon name="cash-outline"></ion-icon>
                                        <h1><?php echo  '₱' ,$remainingBudget?></h1>
                                        <p> Remaining Budget</p>
                                    </div>
                        </div>
                        
                                    <!--------------------------------- TABLE FOR EXPENSES ----------------------------------->
                        <div class="align-tbl-finances">  
                                <div class="table-box">
                                    <p>EXPENSES</p>
                                    <div class="tabledisplay-finance">
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
                                </div>
                            </div>    
                        </div>
                           
                            </div>                
                    </div>
                </div>
            </div>
        </main>


        


     

            <!----------------------------- Add expense form (hidden by default) ------------------------>


            <div id="addForm" class="form-popup">
                <form action="admin-records_manageExpense.php" method="POST" class="form-container" enctype="multipart/form-data">
                <h2>Add </h2>

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
            <form action="admin-records_manageExpense.php" method="POST" class="form-container" enctype="multipart/form-data">
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
                <button type="button" class="btn cancel" onclick="closeEditForm()" style="background-color: #bababa; color: #ffffff; padding: 5px 10px; border: none; cursor: pointer; margin-left: 100px; border-radius: 3px; font: normal 400 13px/normal 'Poppins';">Cancel</button>
            </form>
            </div>

            
            <form id="deleteExpenseForm" action="admin-records_manageExpense.php" method="post">
                <input type="hidden" name="expenseID" id="expenseIDInput">
                <input type="hidden" name="deleteExpense" value="1">
            </form>



</section>
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
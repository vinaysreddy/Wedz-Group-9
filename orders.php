<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style type="text/css">.budget-container {
    max-width: 1200px;
    margin: 0 auto;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    padding: 20px;
    text-align: center;
}

h1 {
    color: #0074D9;
}

.income, .expense {
    display: inline-block;
    margin: 10px;
}

input {
    padding: 5px;
}

button {
    padding: 5px 10px;
    background-color: #0074D9;
    color: #fff;
    border: none;
    cursor: pointer;
}

.budget-details {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}

.total, .income-total, .expense-total {
    border: 1px solid #ddd;
    padding: 10px;
}</style>

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>your orders</h3>
    <p> <a href="home.php">home</a> / order </p>
</section>

<section class="placed-orders">

    <h1 class="title">placed orders</h1>

    <div class="box-container">

    <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){
    ?>
    <div class="box">
        <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
        <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
        <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
        <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
        <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
        <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
        <p> your orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
        <p> total price : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
        <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){echo 'tomato'; }else{echo 'green';} ?>"><?php echo $fetch_orders['payment_status']; ?></span> </p>
    </div>
    <?php
        }
    }else{
        echo '<p class="empty">no orders placed yet!</p>';
    }
    ?>
</div>

    <!-- ... (previous code) ... -->









</section>
<section >
<div class="budget-container">
    <h1 style="color: #e84293;">Budget Tracker</h1>
    <div class="budget-summary">
        <div class="income">
            <h2>Income</h2>
            <input type="number" id="income-amount" placeholder="Enter income">
            <button class="btn" onclick="addIncome()">Add</button>
        </div>
        <div class="expense">
            <h2>Expense</h2>
            <input type="number" id="expense-amount" placeholder="Enter expense">
            <button class="btn" onclick="addExpense()">Add</button>
        </div>
    </div>
    <div class="budget-details">
        <div class="total">
            <h3>Total Budget</h3>
            <p id="total-budget">0</p>
        </div>
        <div class="income-total">
            <h3>Total Income</h2>
            <p id="income-total">0</p>
        </div>
        <div class="expense-total">
            <h3>Total Expense</h2>
            <p id="expense-total">0</p>
        </div>
    </div>

    <button class="btn" id="reset-button" onclick="resetBudget()">Reset</button>
    </div>
    </section>







<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>
<script type="text/javascript">let totalBudget = 0;
let incomeTotal = 0;
let expenseTotal = 0;

function addIncome() {
    const incomeAmount = parseFloat(document.getElementById("income-amount").value);
    if (!isNaN(incomeAmount)) {
        incomeTotal += incomeAmount;
        totalBudget += incomeAmount;
        updateDisplay();
    }
}

function addExpense() {
    const expenseAmount = parseFloat(document.getElementById("expense-amount").value);
    if (!isNaN(expenseAmount)) {
        expenseTotal += expenseAmount;
        totalBudget -= expenseAmount;
        updateDisplay();
    }
}

function updateDisplay() {
    document.getElementById("total-budget").textContent = totalBudget;
    document.getElementById("income-total").textContent = incomeTotal;
    document.getElementById("expense-total").textContent = expenseTotal;
    document.getElementById("income-amount").value = "";
    document.getElementById("expense-amount").value = "";
}
function resetBudget() {
    totalBudget = 0;
    incomeTotal = 0;
    expenseTotal = 0;
    updateDisplay();
}

updateDisplay();


</script>

</body>
</html>
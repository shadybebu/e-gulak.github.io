<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: loginPage.php");
}

// Database connection parameters for expenses
$expenses_servername = "localhost";
$expenses_username = "root"; // Replace with your expenses database username
$expenses_password = ""; // Replace with your expenses database password
$expenses_dbname = "expenses"; // Replace with your expenses database name

// Create connection for expenses
$conn_expenses = new mysqli($expenses_servername, $expenses_username, $expenses_password, $expenses_dbname);

// Check connection for expenses
if ($conn_expenses->connect_error) {
    die("Expenses Database Connection failed: " . $conn_expenses->connect_error);
}

// Database connection parameters for income
$income_servername = "localhost";
$income_username = "root"; // Replace with your income database username
$income_password = ""; // Replace with your income database password
$income_dbname = "income"; // Replace with your income database name

// Create connection for income
$conn_income = new mysqli($income_servername, $income_username, $income_password, $income_dbname);

// Check connection for income
if ($conn_income->connect_error) {
    die("Income Database Connection failed: " . $conn_income->connect_error);
}

// Retrieve total expenses
$sql_expenses = "SELECT SUM(amount) AS total_expenses FROM expenses";
$result_expenses = $conn_expenses->query($sql_expenses);
$row_expenses = $result_expenses->fetch_assoc();
$total_expenses = $row_expenses["total_expenses"];

// Retrieve total income
$sql_income = "SELECT SUM(amount) AS total_income FROM income";
$result_income = $conn_income->query($sql_income);
$row_income = $result_income->fetch_assoc();
$total_income = $row_income["total_income"];

// Calculate total balance
$total_balance = $total_income - $total_expenses;
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/x-icon" href="wallet-filled-money-tool.png">
    <link rel="stylesheet" href="account.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link href="/your-path-to-uicons/css/uicons-[your-style].css" rel="stylesheet"> <!--load all styles -->
    <link href="/your-path-to-uicons/css/uicons-rounded-bold.css" rel="stylesheet">
    <link href="/your-path-to-uicons/css/uicons-rounded-solid.css" rel="stylesheet">
    <title>Account</title>
</head>

<body>


    <nav class="sidebar">
        <ul>
            <nav class="sidebar">
                <ul>
                    <li> <a href="index.php" class="logo">
                            <img src="wallet-filled-money-tool.png" alt="">
                            <span claas="nav-item">E-GULAK</span>
                        </a>
                    </li>
                    <li><a href="account.php">
                            <i class='bx bxs-home-alt-2'>
                            </i>
                            <span claas="nav-item">Account</span>
                        </a>
                    </li>
                    <li><a href="record.php">
                            <i class='bx bxs-book'></i>
                            </i>
                            <span claas="nav-item">Record</span>
                        </a>
                    </li>
                    <li>
                        <a href="analysis.php">
                            <i class='bx bx-line-chart'></i>
                            </i>
                            <span claas="nav-item"> Analysis</span>
                        </a>
                    </li>

                    <li>
                        <a href="logout.php" class="logout">
                            <i class='bx bx-log-out'>
                            </i>
                            <span claas="nav-item">Logout</span>
                        </a>
                    </li>
                </ul>

            </nav>

            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bx-log-out'>
                    </i>
                    <span claas="nav-item">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="main">
        <div class="container">
            <h1> WELCOME TO YOUR ACCOUNT </h1>
            <div class="container2">
                <div class="TOTALS">
                    <div class="balance">
                        <h3>Total Balance:</h3>
                        <p id="total-balance"><?php echo "₹" . $total_balance; ?></p>
                    </div>
                    <div class="income">
                        <h3>Total Income:</h3>
                        <p id="total-income"><?php echo "₹" . $total_income; ?></p>
                    </div>
                    <div class="expenses">
                        <h3>Total Expenses:</h3>
                        <p id="total-expenses"><?php echo "₹" . $total_expenses; ?></p>
                    </div>
                </div>
                <div>

                </div>
                <div class="buttons">
                    <a href="addincome.php"> Add Income</a>
                    <a href="addexpense.php">Add Expense</a>
                    <a href="record.php">See Records</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
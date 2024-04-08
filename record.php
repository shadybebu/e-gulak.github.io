<?php
{
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: loginPage.php");
}
}
?>


    <?php
    include 'expensesdb.php';
    if(isset($_POST['submit'])) {
        $amount = $_POST['amount'];
        $date = $_POST['date'];
        $category = $_POST['category'];
        $sql = "INSERT INTO expenses (amount, date, category) VALUES ('$amount', '$date', '$category')";
        $result = mysqli_query($con, $sql);
        if($result) {
            header('location:record.php');  }
            else {
                die(mysqli_error($con));
            }
    }
    ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="record.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Record</title>
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
                    <li><a href="#">
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

  
    <form id="pdf-form" action="pdf_gen.php" method="POST" name="btn_pdf" >
    <button type="submit" name="btn_pdf">Get PDF</button>
</form>

    <h1>Expense and Income record  </h1>
    
    <table id="expense-table">

        <tr>
           
            <th>amount</th>
            <th>date</th>
            <th>category</th>
            <th>operation</th>

        </tr>
    

        <?php
       $sql = "SELECT * FROM expenses LIMIT 5"; // Display only the first 10 records
        $result = mysqli_query($con, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                
                $amount = $row['amount'];
                $date = $row['date'];
                $category = $row['category'];
                echo '<tr>
                    
                    <td>  - ₹ ' . $amount . '</td>
                    <td>' . $date . '</td>
                    <td>' . $category . '</td>
                    <td>
                    <div class="button-container">
                    <button><a href="update.php?updateid=' . $row['id'] . '">update</a></button>
                    <button><a href="delete.php?deleteid=' . $row['id'] . '">delete</a></button>
                    </div>
                    </td>
                </tr>';
            }
        }
        ?>


<?php
                include 'incomedb.php';
                if(isset($_POST['submit'])) {
                    $amount = $_POST['amount'];
                    $date = $_POST['date'];
                    $category = $_POST['category'];
                    $sql = "INSERT INTO income (amount, date, category) VALUES ('$amount', '$date', '$category')";
                    $result = mysqli_query($con, $sql);
                    if($result) {
                        header('location:record.php');  }
                        else {
                            die(mysqli_error($con));
                        }
                }
                ?>

<?php
   $sql = "SELECT * FROM income LIMIT 5"; // Display only the first 10 records

   $result = mysqli_query($con, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
            
                $amount = $row['amount'];
                $date = $row['date'];
                $category = $row['category'];
                echo '<tr>
                   
                    <td> +   ₹ ' . $amount . '</td>
                    <td>' . $date . '</td>
                    <td>' . $category . '</td>
                    <td>
                        <div class="button-container">
                            <button><a href="updateincome.php?updatedid=' . $row['id'] . '">update</a></button>
                            <button><a href="deleteincome.php?deletedid=' . $row['id'] . '">delete</a></button>
                        </div>
                    </td>
                </tr>';
            }
        }
        ?>


    </table> 
</body>
</html>
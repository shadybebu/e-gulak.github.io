<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expenses";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT date , amount FROM expenses ORDER BY date";
$result = $conn->query($sql);


$dataPoints = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $date = strtotime($row["date"]) * 1000;
        $dataPoints[] = array("x" => $date, "y" => $row["amount"]);
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analysis Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="AnalysisPage.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Expenses"
                },
                axisX: {
                    title: "Date",
                    valueFormatString: " DD MMM YY", // Format for displaying dates on x-axis
                },
                axisY: {
                    title: "Expenses (in rupees)",
                    valueFormatString: "#,##0", // Format for displaying expenses on y-axis
                    prefix: "₹"
                },
                data: [{
                    type: "spline",
                    markerSize: 5,
                    xValueType: "dateTime",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script>
</head>

<body>
    <a href="analysisincome.php" id="income">Income</a>
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
                            </i>W
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
    <div id="chartContainer"> </div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>

</html>
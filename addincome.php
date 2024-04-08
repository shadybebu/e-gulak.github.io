    <?php
    // Database connection settings
    $host = 'localhost';
    $db   = 'income';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    // Establish the database connection
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    // Create Operation (Adding Income)
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_income'])) {
        $amount = $_POST['amount'];
        $date = $_POST['date'];
        $category = $_POST['category'];

        $sql = "INSERT INTO income (amount, date, category) VALUES (?, ?, ?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$amount, $date, $category]);
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }

    // Read Operation (List Income)
    $sql = "SELECT * FROM income";
    $stmt = $pdo->query($sql);

    // Display the form and list of income
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Income</title>
    </head>

    <body>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <link rel="stylesheet" href="addincome_expense.css">
            <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
            <title>Document</title>
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

            <form method="post">
                <h1>Add Income</h1>
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" required><br><br>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required><br><br>
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" required><br><br>
                <button type="submit" name="add_income">Add Income</button>
            </form>


        </body>

        </html>
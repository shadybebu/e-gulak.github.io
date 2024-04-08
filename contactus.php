<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/x-icon" href="wallet-filled-money-tool.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Contact us </title>
    <link rel="stylesheet" href="contactus.css">
</head>

<body>
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
                    <span claas="nav-item">Home</span>
                </a>
            </li>
            <li><a href="AboutPage.php">
                    <i class='bx bxs-ghost'>
                    </i>
                    <span claas="nav-item"> About</span>
                </a>
            </li>
            <li>
                <a href="contactus.php">
                    <i class='bx bxs-contact'>
                    </i>
                    <span claas="nav-item"> Contact</span>
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



    <div class="container">

        <div class="header">
            <h1>Contact us  </h1>
        </div>
        <form action="https://api.web3forms.com/submit" method="POST">
            <input type="hidden" name="access_key" value="30ff0023-00aa-4e26-896d-13b432a5620e">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your name.." required><br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your email.." required><br>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Your phone number.." required><br>

            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Write something.." style="height:200px" required></textarea><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <img src="smile.jpeg" alt="Image" class="corner-image">

</body>

</html>
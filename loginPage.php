<?php
session_start();

// Include database connection
require_once "database.php";

// Login functionality
if (isset($_POST["login"])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  require_once "database.php";
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  if ($user) {
    if (password_verify($password, $user['password'])) {
      session_start();
      $_SESSION['user'] = "yes";
      if (isset($_POST['remember'])) {
        setcookie('email', $_POST['email'], time() + 60 * 60 * 24 * 30);
        setcookie('password', $_POST['password'], time() + 60 * 60 * 24 * 30);
      }
      header("Location:index.php");
      exit();
    } else {
?>


      <div class="alert-message">
        <strong>Incorrect Password</strong>
      </div>

    <?php
    }
  } else {
    ?>

    <div class="alert-message">
      <strong> Email does not exist </strong>
    </div>
<?php
  }
}
?>
<?php
if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
  $i = $_COOKIE['email'];
  $pass = $_COOKIE['password'];
} else {
  $i = "";
  $pass = "";
} ?>

<!-- // Signup functionality -->
<?php
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $phone_number = $_POST['phone_number'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $passwordhash = password_hash($password, PASSWORD_DEFAULT);

  $error = array();

  if (empty($username) or empty($phone_number) or empty($email) or empty($password)) {
    array_push($error, "Please fill in all fields");
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Please enter a valid email");
  }
  if (strlen($password) < 7) {
    array_push($error, "Password must be at least 7 characters");
  }
  require_once "database.php";
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  $rowCount = mysqli_num_rows($result);
  if ($rowCount > 0) {
    array_push($error, "Email already exists");
  }



  if (count($error) > 0) {
    foreach ($error as $error) {
      echo "<div class= 'alert-message' > " . $error . "</div> <br>";
    }
  } else {

    $sql = "INSERT INTO users (username, phone_number, email, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "siss", $username, $phone_number, $email, $passwordhash);
      mysqli_stmt_execute($stmt);
      echo "<div class= 'alert-message' > account created successfully </div> <br>";
    } else {
      die("Something went wrong");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link rel="stylesheet" href="loginPage.css">
</head>

<body>
  <div class="header">
    <nav>
      <img src="black.png" class="logo" height="50px">
      <ul class="navlinks">
        <li><a href="">E-GHULAK</a></li>
        <li><a href="aboutpage.php">ABOUT US </a></li>
        <li><a href="contactus.php">CONTACT US</a> </li>
      </ul>
    </nav>
  </div>
  <div class="mainLoginSection">
    <div class="signIn" id="signIn">
      <form id="login" class="input-group" action="loginPage.php" method="POST">
        <h1>Login</h1>
        <div class="inputBox">
          <i class='bx bxl-gmail'></i>
          <input type="email" placeholder="email" name="email" value="<?php echo $i ?>">
        </div>
        <div class="inputBox">
          <i class='bx bxs-lock-alt'></i>
          <input type="password" placeholder="password" id="password" required name="password" class="form-control" value="<?php echo $pass ?>">
          <img src="eye-close.png" id="eyeicon" width="30px">
        </div>
        <div class="rememberForgot">
          <label><input type="checkbox" name="remember">Remember me</label><br>
        </div>
        <div class="logbutton">
          <button type="submit" value="login" name="login" class="button">Login</button>
        </div>
      </form>
    </div>
    <div class="signUp" id="signUp">
      <form id="signup" class="input-group" action="signup.php" method="POST">
        <h1>
          Sign up
        </h1>
        <div class="inputBox">
          <i class='bx bxs-user'></i>
          <input type="text" placeholder="username" required name="username">
        </div>
        <div class="inputBox">
          <i class='bx bxs-phone'></i>
          <input type="tel" placeholder="phone number " required name="phone_number">
        </div>
        <div class="inputBox">
          <i class='bx bxl-gmail'></i>
          <input type="email" placeholder="email" required name="email">
        </div>
        <div class="inputBox">
          <i class='bx bxs-lock-alt'></i>
          <input type="password" placeholder="password" required name="password">
        </div>
        <div class="logbutton">
          <button type="submit" class="button" value="submit" name="submit"> sign up </button>
        </div>

        <div class="create">
          <p> Already have an account ? <a href="loginPage.php"> log in </a> </p>
        </div>
      </form>
    </div>
    <div class="toggler" id="toggler">
      <h1>Hello, Friend!</h1>
      <p class="regi">Register with your personal details to use all of site features</p>
      <div class="button" id="togglerButton" onClick="moveLeftRight()">
        SIGN IN
      </div>
    </div>
  </div>


                  
                  
  </div>
</body>
<script>
  moveLeftRight = () => {
    const togglerButton = document.getElementById("togglerButton");
    const currentText = togglerButton.innerText;
    document.getElementById("toggler").classList.toggle("togglerToLeft");
    togglerButton.innerHTML = currentText === "SIGN IN" ? "LOGIN" : "SIGN IN";
    document.getElementById("signIn").classList.toggle("fadeToRight");
    document.getElementById("signUp").classList.toggle("comeToRight");
  };
</script>
<script src="script.js"></script>

</html>
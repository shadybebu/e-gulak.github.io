<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: loginPage.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About us </title>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
      rel="stylesheet"
    />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="wallet-filled-money-tool.png">   
    <link rel="stylesheet" href="AboutPageStyle.css" />
  </head>
  <body>
  <nav class="sidebar">
          <ul>
              <li>  <a href="index.php" class="logo"> 
                  <img src="wallet-filled-money-tool.png" alt="">
                  <span claas ="nav-item">E-GULAK</span>
                  </a> 
                  </li>
              <li><a href="account.php">
                  <i class='bx bxs-home-alt-2'>                    
                  </i>
                  <span claas ="nav-item">Home</span>
              </a>
          </li>
              <li><a href="AboutPage.php">
                  <i class='bx bxs-ghost'>
    </i>
  <span claas ="nav-item"> About</span>
              </a>
          </li>
              <li>
                  <a href="ContactUs.php"> 
                      <i class='bx bxs-contact'>
  </i>
  <span claas ="nav-item"> Contact</span>
  </a>
  </li>
              <li>  
                  <a href="logout.php" class="logout">
                      <i class='bx bx-log-out' >
                      </i>
                      <span claas ="nav-item" >Logout</span>
                  </a>
              </li>
          </ul>

          </nav>
    <div class="container">
        <div class="header">
            <h1>Our Team</h1>
        </div>

        <div class="sub-container">

            <div class="teams">
                <img class= "handsomeboy" src="https://i.pinimg.com/564x/a6/c0/8e/a6c08e93e9b73121c0dfca74afdfc0b1.jpg" alt="">
                <div class="name">Vaibhav Badoni</div>
                <div class="desig">Developer</div>
                <div class="about">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum labore quam
                    reprehenderit
                    vitae aliquam dicta! </div>

                <div class="social-links">
                    <a href="https://www.instagram.com/shadybebu?igsh=MXZwMXk3ZnZycnY5Ng=="><i class="fa fa-instagram"></i></a>
                    <a href="https://github.com/shadybebu"><i class="fa fa-github"></i></a>
                </div>
            </div>

            <div class="teams">
                <img  class= "handsomeboy" src="https://i.pinimg.com/736x/52/60/83/526083653aaf4ec7dbb3387d6366b248.jpg" alt="">
                <div class="name">Sachin Rawat </div>
                <div class="desig">Designer</div>
                <div class="about">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum labore quam
                    reprehenderit
                    vitae aliquam dicta! </div>

                <div class="social-links">
                    <a href="https://www.instagram.com/akuma._?igsh=MTlwc2RrenlydnVydQ=="><i class="fa fa-instagram"></i></a>
                    <a href="https://github.com/Sachin-Rawat007"><i class="fa fa-github"></i></a>
                </div>
    </div>
     <div class="teams">
                <img class= "handsomeboy" src="https://i.pinimg.com/736x/da/ec/96/daec96ed0c5ccb943190cbead7fbd9dd.jpg" alt="">
                <div class="name">Keshav Joshi</div>
                <div class="desig">Designer</div>
                <div class="about">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum labore quam
                    reprehenderit
                    vitae aliquam dicta! </div>

                <div class="social-links">
                    <a href="https://www.instagram.com/joshi.keshav.13?igsh=MXh3dXd6b3Vsc2Q5dg=="><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>
                </div>
    </div>
    </div>
</body>

</html>
  </body>
</html>
  <!-- <?php
        // session_start();
        // if (!isset($_SESSION['user'])) {
        //     header("Location: loginPage.php");
        // }
        ?> -->

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <link rel="stylesheet" href="index.css" />
    <link rel="icon" type="image/x-icon" href="wallet-filled-money-tool.png">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>E-Gulak</title>
  </head>

  <body>
    <nav class="sidebar">
      <ul>
        <li>
          <a href="account.php" class="logo">
            <img src="wallet-filled-money-tool.png" alt="" />
            <span claas="nav-item"> E-GULAK</span>
          </a>
        </li>
        <li>
          <a href="account.php">
            <i class="bx bxs-home-alt-2"> </i>
            <span claas="nav-item">Home</span>
          </a>
        </li>
        <li>
          <a href="AboutPage.php">
            <i class="bx bxs-ghost"> </i>
            <span claas="nav-item"> About</span>
          </a>
        </li>
        <li>
          <a href="contactus.php">
            <i class="bx bxs-contact"> </i>
            <span claas="nav-item"> Contact</span>
          </a>
        </li>
        <li>
          <a href="logout.php" class="logout">
            <i class="bx bx-log-out"> </i>
            <span claas="nav-item">Logout</span>
          </a>
        </li>
      </ul>
    </nav>

    <div class="container">
      <img src="pngwing.com.png" alt="" />

      <div class="msg-container">
        <div id="slider">
          <div class="msg-col">
            <h1>
              Welcome to <br />
              E-Gulak
            </h1>
            <p>Your Money Manager!</p>
          </div>

          <div class="msg-col">
            <h1>Save Responsibly with E-Gulak</h1>
            <p>Track your income and expenses effortlessly.</p>
          </div>

          <div class="msg-col">
            <h1>Avoid Overspending</h1>
            <p>Stay on top of your finances and make informed decisions.</p>
          </div>

          <div class="msg-col">
            <h1>Interactive Chart</h1>
            <p>
              Visualize your financial data for better insights and planning.
            </p>
          </div>
        </div>
      </div>
      <div class="controller">
        <div id="line1"></div>
        <div id="line2"></div>
        <div id="line3"></div>
        <div id="line4"></div>
        <div id="active"></div>
      </div>
    </div>
    <div class="features">
      <h1>Features our users love</h1>
      <div>
        <div>
          <div>
            <img src="1.svg" width="20%" alt="">
            <h3>Save data securely</h3>
            <p>Safely save your data records on just one click </p>
          </div>
          <div>
            <img src="2.svg" width="20%" alt="">
            <h3>Check records </h3>
            <p>View and check your data records to maintain account </p>
          </div>
          <div>
            <img src="3.svg" width="20%" alt="">
            <h3>Synchronize data</h3>
            <p>Safely synchronize across devices with e-gulak.</p>
          </div>
          <div>
            <img src="4.svg" width="20%" alt="">
            <h3> Depth view </h3>
            <p>e-gulak provides the depth view with analytic charts</p>
          </div>
          <div>
            <img src="5.svg" width="20%" alt="">
            <h3>Saving plan</h3>
            <p>Keep track on savings process to meet your financial goals.</p>
          </div>
          <div>
            <img src="6.svg" width="20%" alt="">
            <h3>Multiple devices</h3>
            <p>Safely save your data records on just one click on multiple devices </p>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <left>© Developed by Sachin Rawat, Vaibhav Badoni, Keshav Joshi </left>
      <right>
        <a href="aboutpage.php">About us</a>
        <a href="contactus.php">Contact Us</a>
      </right>
    </footer>
    <script>
      var slider = document.getElementById("slider");
      var active = document.getElementById("active");
      var line1 = document.getElementById("line1");
      var line2 = document.getElementById("line2");
      var line3 = document.getElementById("line3");
      var line4 = document.getElementById("line4");

      var positions = ["0%", "-25%", "-50%", "-75%"]; // Positions for each slide
      var activeTopPositions = ["0px", "80px", "160px", "240px"]; // Top positions for active indicator

      var currentIndex = 0; // Current slide index

      function moveSlide(index) {
        slider.style.transform = "translateX(" + positions[index] + ")";
        active.style.top = activeTopPositions[index];
        currentIndex = index;
      }

      function nextSlide() {
        currentIndex = (currentIndex + 1) % positions.length;
        moveSlide(currentIndex);
      }

      // Automatically slide every 3 seconds
      var autoSlideInterval = setInterval(nextSlide, 3000);

      // Event listeners for controller lines
      line1.onclick = function() {
        clearInterval(autoSlideInterval); // Stop auto sliding when user clicks on a line
        moveSlide(0);
      };

      line2.onclick = function() {
        clearInterval(autoSlideInterval);
        moveSlide(1);
      };

      line3.onclick = function() {
        clearInterval(autoSlideInterval);
        moveSlide(2);
      };

      line4.onclick = function() {
        clearInterval(autoSlideInterval);
        moveSlide(3);
      };
    </script>
  </body>


  </html>
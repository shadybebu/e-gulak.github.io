    <?php
    $con = mysqli_connect("localhost", "root", "", "expenses");

    if (!$con) {
        die(mysqli_error($con));
    }
    ?>
<?php
    $con = mysqli_connect("localhost", "root", "", "income");

    if (!$con) {
        die(mysqli_error($con));
    }
    ?>
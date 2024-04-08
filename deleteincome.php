<?php
include 'incomedb.php';
if (isset($_GET['deletedid'])) {
    $id = $_GET['deletedid'];
$sql = "DELETE FROM income WHERE id = $id";
$result = mysqli_query($con,$sql);
if ($result) {
//    echo " data deleted successfully";
    header("location:record.php");
}
else {
    die(mysqli_error($conn));
}
}
?>  
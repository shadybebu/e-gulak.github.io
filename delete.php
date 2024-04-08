<?php
include 'expensesdb.php';
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
$sql = "DELETE FROM expenses WHERE id = $id";
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
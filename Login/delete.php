<?php
include 'connect.php';
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM users1 WHERE id = $id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location:display.php');
    }
}



?>
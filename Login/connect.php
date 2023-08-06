<?php
session_start();


$con = mysqli_connect("localhost", "root", "", "dashboard");
if ($con) {
    echo "";
} else {
    echo
        mysqli_error($con);
}
?>
<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location:login.php');
}

echo "<h1>Hello" . $_SESSION['user']['username'] . "</h1>";
echo "<h1>Is admin ?" . $_SESSION['user']['is_admin'] . "</h1>";
?>
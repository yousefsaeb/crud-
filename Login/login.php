<?php
session_start();
if (isset($_POST["submit"])) {
    $user = $_POST["username"];
    $pass = $_POST["password"];


    $con = mysqli_connect("localhost", "root", "", "dashboard");
    $sql = "SELECT EXISTS(SELECT 1 FROM users1 WHERE username = '$user') AS user_exists";


    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row['user_exists']) {
        $_SESSION['user']['username'] = $user;
        $_SESSION['user']['is_admin'] = "No";

        header('location:home.php');
    } else {
        echo "$user doesn't exist";

    }
    mysqli_close($con);
    if (!$con) {
        die(mysqli_error($con));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation" />
    <script src="style/bootstrap.js"></script>
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style.css" type="text/css">

    <title>Login</title>
</head>

<body>
    <form action="" method="post" class="Lform">
        <h1>تسجيل الدخول</h1>
        <h3> Username:</h3>
        <input type="text" name="username" class="textbox" placeholder="Username" />
        <h3> Password:</h3>
        <input type="password" name="password" class="textbox" placeholder="password" />
        <br />
        <input type="submit" name="submit" value="تسجيل الدخول" class="btn btn-primary" />


    </form>
</body>

</html>
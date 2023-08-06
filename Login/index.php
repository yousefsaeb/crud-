<?php
session_start();
if (isset($_POST["submit"])) {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $email = $_POST["email"];

    $con = mysqli_connect("localhost", "root", "", "dashboard");
    $sql = "INSERT INTO users1 (username, password, email) VALUES ('$user','$pass','$email')";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo "Welcome $user! you have created a new account";
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
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation" />
    <link rel="stylesheet" href="style/bootstrap.css">

    <title>Login</title>
</head>

<body>
    <form action="" method="post" class="Lform">
        <h1>صفحة التسجيل </h1>
        <h3> Username:</h3>
        <input type="text" name="username" class="textbox" placeholder="Username" />
        <h3> Password:</h3>
        <input type="password" name="password" class="textbox" placeholder="password" />
        <h3> Email:</h3>
        <input type="text" name="email" class="textbox" placeholder="E-mail" />
        <br />
        <input type="submit" name="submit" value="التسجيل" class="submit" />
        <a href="display.php"> <input type="button" name="crud" value="cpanel" class="submit" /></a>


    </form>
</body>

</html>
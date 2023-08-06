<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "dashboard");

$id = $_GET['updateid'];
$sql_check = "SELECT * FROM users1 WHERE id=$id";
$check_result = mysqli_query($con, $sql_check);
$row = mysqli_fetch_assoc($check_result);
$name = $row['username'];
$password = $row['password'];
$emaill = $row['email'];

if (isset($_POST["submit"])) {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $email = $_POST["email"];

    //===========


    $sql = "UPDATE `users1` SET id='$id', username='$user', password='$pass', email='$email' where id='$id'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location:display.php');

    } else {
        die(mysqli_error($con));
    }

    mysqli_close($con);

    //============

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation" />
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation" />

    <title>Login</title>
</head>

<body>
    <form class="addform" action="" method="POST">
        <h1>تعديل البيانات</h1>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">New username</label>
            <input type="text" class="form-control" id="username" name="username" value=<?php echo $name; ?>>

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">New password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" value=<?php echo $password; ?>>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">New email</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                value=<?php echo $emaill; ?>>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="display.php"><button type="button" name="submit" class="btn btn-secondary">back</button></a>
    </form>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    <script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>
    <?php
    if (isset($result)) {
        ?>
        <script>
            $.notify("<?php echo $result['message']; ?>", "<?php echo $result['status']; ?>");
        </script>
        <?php
    }
    ?>
</body>

</html>
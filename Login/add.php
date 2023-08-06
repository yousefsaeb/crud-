<?php
session_start();
if (isset($_POST["submit"])) {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $email = $_POST["email"];

    $con = mysqli_connect("localhost", "root", "", "dashboard");
    //===========
    $check = "SELECT EXISTS(SELECT 1 FROM users1 WHERE username = '$user') AS user_exists";
    $result = $con->query($check);

    if ($result) {
        if ($result->fetch_assoc()['user_exists'] ?? false) {
            echo "User exists!";
        } else {
            if (!$con) {
                $result = [
                    'status' => "error",
                    "message" => "Error DB connection"
                ];

            } else {
                $sql = "INSERT INTO users1 (username, password, email) VALUES ('$user','$pass','$email')";

                mysqli_query($con, $sql);

                mysqli_close($con);

                header('location:display.php');
            }
        }
    } else {
        echo "Error executing query: " . $con->error;
    }






    //============




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
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation" />

    <title>Login</title>
</head>

<body>
    <form class="addform" action="" method="POST">
        <h1>أضف مستخدم جديد</h1>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">username</label>
            <input type="text" class="form-control" id="username" name="username">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">email</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
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
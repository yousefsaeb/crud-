<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation">

    <script src="style/bootstrap.js"></script>

    <title>control panel</title>
</head>

<body>
    <div class="title">
        <h1>لوحة التحكم</h1>
    </div>
    <div class="container">
        <a href="add.php"> <button class="btn btn-primary" style="  margin-bottom: 15px;">أضف مستخدم</button></a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Email</th>
                    <th scope="col">حذف/تعديل</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from users1";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['username'];
                        $password = $row['password'];
                        $email = $row['email'];
                        $checked = $row['is_admin'] ? "checked" : "";
                        echo '<tr>
                    <th scope="row">' . $id . '</th>
                    <td>' . $name . '</td>
                    <td>' . $password . '</td>
                    <td>' . $email . '</td>
                    <td> <a href="update.php?updateid=' . $id . '"><button class="btn btn-secondary">تعديل</button></a>
                    <a href="delete.php?deleteid=' . $id . '"><button class ="btn btn-danger">حذف</button></a>
                    
                    <input type="checkbox" name = "is_admin" ' . $checked . '/>
                    </td>';
                    }
                }
                ?>


            </tbody>
        </table>

    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    <script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>

</body>



</html>
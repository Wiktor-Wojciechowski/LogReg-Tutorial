<?php
require 'config.php';
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "<script> alert('Username or Email Already Taken') </script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Registration Successful') </script>";
        } else {
            echo
            "<script> alert('Passwords do not match') </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <h1>Registration</h1>
    <form action="" method="post" autocomplete="off">
        <label>Name: <input type="text" name="name" required></label>
        <label>Username: <input type="text" name="username" required></label>
        <label>Email: <input type="email" name="email" required></label>
        <label>Password: <input type="password" name="password" required></label>
        <label>Confirm Password: <input type="password" name="confirmpassword" required></label>
        <button type="submit" name="submit">Register</button>
    </form>
    <a href="login.php">Login</a>
</body>

</html>
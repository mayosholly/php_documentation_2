<?php 
session_start();
require('database.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT *  FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    if($user && password_verify($password, $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['firstname'];
        header("Location: dashboard.php");
    }else {
        echo "Invalid Email";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Registration</h2>

    <form action="login.php" method="POST">

    <label for="">Email</label>
    <input type="email" name="email">
    <br>

    <label for="">Password</label>
    <input type="password" name="password">
    <br>


    <button type="submit">
        Login
    </button>
    </form>
</body>
</html>
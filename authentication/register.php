<?php

include('database.php');


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];



    if(empty($first_name) || empty($last_name) || empty($email) || empty($password)){
        echo "All Fields are required";
    }else if($password != $confirm_password){
        echo "Password Incorrect";

    }else{
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $sql  = "INSERT INTO users(firstname, lastname, email, password) VALUE('$first_name', '$last_name', '$email', '$hashedPassword')";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo "An error occured ". mysqli_connect_error();
        }else{
            echo "Successfully Added";
            header("Location: login.php");
        }
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

    <form action="register.php" method="POST">
    <label for="">First Name</label>
    <input type="text" name="first_name">
    <br>

    <label for="">Last Name</label>
    <input type="text" name="last_name">
    <br>

    <label for="">Email</label>
    <input type="email" name="email">
    <br>

    <label for="">Password</label>
    <input type="password" name="password">
    <br>

    <label for="">Confirm Password</label>
    <input type="password" name="confirm_password">
    <br>

    <button type="submit">
        Register
    </button>
    </form>
</body>
</html>
<?php 

session_start();


if(isset($_SESSION['user_id'])){
    echo "Welcome, ". $_SESSION['user_name'];
}else{
    echo "You are not logged in";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Page</title>
</head>
<body>

    <a href="logout.php"> Logout </a>
</body>
</html>
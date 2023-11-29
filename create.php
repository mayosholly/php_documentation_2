<?php 

require_once('config.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $description = $_POST['description'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products(name, description, price)
    VALUES ('$name', '$description', '$price')";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Successfully inputed";
        header("Location:index.php");
    }else{
        echo "An error occured ".mysqli_error($conn); 
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
    <form action="create.php" method="POST">
        <label for="">Name</label>
        <input type="text"  name="name" ><br>
        <label for="">Description</label>
        <input type="text" name="description" ><br>
        <label for="">Price</label>
        <input type="number" name="price" ><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php 

require_once('config.php');

if($_SERVER["REQUEST_METHOD"] == "GET"){

    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id=$id ";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = $_POST['id'];
    $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];

  $sql = "UPDATE products SET name = '$name', price = '$price', description = '$description'  
    WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: index.php");
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
    <form action="edit.php" method="POST">
    <input type="hidden"  name="id"  value="<?php echo $product['id']; ?>">
        <label for="">Name</label>
        <input type="text"  name="name"  value="<?php echo $product['name']; ?>"><br>
        <label for="">Description</label>
        <input type="text" name="description" value="<?php echo $product['description']; ?>" ><br>
        <label for="">Price</label>
        <input type="number" name="price" value="<?php echo $product['price']; ?>" ><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
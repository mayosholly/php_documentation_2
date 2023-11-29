<?php
session_start();
require('../database.php');
if(!$_SESSION['id'])
    {
        header('Location:signin.php');
    }


if($_SERVER['REQUEST_METHOD']  == "POST")
{
    $name = $_POST['name'];
    $email = $_POST['email'];
// create an image path
    $image = time() . '-' . $_FILES['image_path']['name'];
   $image_tmp = $_FILES['image_path']['tmp_name'];
   move_uploaded_file($image_tmp, 'uploads/'. $image);


   $sql = "INSERT INTO customer (name, email, image_path) VALUES ('$name', '$email', '$image')";
   $result = mysqli_query($conn, $sql);
   if($result){
        header('Location:index.php');
    }else{
        echo "An Error occured";
        }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>


<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                Create a Customer
            </div>
            <div class="card-body">
                
<form action=""  method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Image</label>
    <input type="file" class="form-control" name="image_path" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
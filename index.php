<?php 

require_once("config.php");

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
while($rows = mysqli_fetch_assoc($result) ){
    $products[] = $rows;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">This is the list of products</div>
                <div class="card-body">
                <table class="table  table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product){ ?>
            <tr>
                <td><?php  echo $product['id'] ?></td>
                <td><?php  echo $product['name'] ?></td>
                <td><?php  echo $product['description'] ?></td>
                <td><?php  echo $product['price'] ?></td>
                <td><?php  echo $product['created_at'] ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $product['id']; ?>">Edit</a>
                </td>
            </tr>
            <?php  } ?>
        </tbody>
    </table>
                </div>
            </div>

       
        </div>
    </div>
    
   

</body>
</html>

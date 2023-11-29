<?php 

$servername = "localhost";
$username= "root";
$password = "";
$dbname = "php_auth";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn)
{
    // echo "Successfully connected";
}
else{
    echo "Connection failed ". mysqli_connect_error();
}



?>
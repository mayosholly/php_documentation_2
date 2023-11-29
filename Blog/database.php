<?php 

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "php_blog";

$conn = mysqli_connect($localhost, $username, $password, $dbname);

if(!$conn){
    echo "An Error occured ". mysqli_connect_error();
}
// echo "Successfully Connected to your database";


?>
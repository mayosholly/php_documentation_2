
<?php

require('../database.php');
include('header.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' )
{
    $name = mysqli_real_escape_string($conn, $_POST['name']) ;
    $email = mysqli_real_escape_string($conn, $_POST['email'])  ;
    $password =  mysqli_real_escape_string($conn, $_POST['password'] ) ;
    $cpassword =  $_POST['cpassword'];
    $error = '';
    if(empty($name) || empty($email) || empty($password))
    {
        $error = "<p class='alert alert-danger text-center'> All Fields are required </p>"; 
    }
    else if($password != $cpassword)
    {
        $error = "incorrect password";
        // echo "Incorrect Password";
    }
    else{
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql  = "INSERT INTO signup(name, email, password) VALUE('$name', '$email', '$hashedPassword')";
        $result = mysqli_query($conn, $sql);
        if($result){
            $success = "<p class='alert alert-success text-center'> Successfully Registered </p>"; 
        }

    }
}


?>



<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>
        <h6><?php if(isset($error)){ echo $error; }  ?></h6>
        <h6><?php if(isset($success)){ echo $success; }  ?></h6>

                        <form action=""  method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name"  id="floatingText" placeholder="jhondoe">
                            <label for="floatingText">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="cpassword" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Confirm  Password</label>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit"  class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        </form>

                        <p class="text-center mb-0">Already have an Account? <a href="">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <?php 
            
            include('footer.php');
    ?>

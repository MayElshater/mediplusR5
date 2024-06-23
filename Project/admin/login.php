<?php

include_once('../conn.php');
session_start();

// Check if the login form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Handle login form submission
    try {
        $password = $_POST['password'];
        $username = $_POST['username'];

        $sql = "SELECT `id`, `password` FROM `users` WHERE `username` = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);

        if ($stmt->rowCount()) {
            $result = $stmt->fetch();
            $verify = password_verify($password, $result['password']);

            // After successful login
            if ($verify) {
                // Start user session and store user ID
                $_SESSION['user_id'] = $result['id'];

                // Redirect to the user dashboard (users.php)
                header("Location: users.php");
                exit();
            } else {
                echo 'Incorrect Password!';
            }
        } else {
            echo "Invalid Username";
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}

// Handle registration form submission...



// Check if the registration form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    // Handle registration form submission
    try {
        // Your registration form submission logic goes here
        $sql = "INSERT INTO `users` (`name`, `username`, `password`, `email` ,`image`) VALUES (?, ?, ?, ?, ?)";
        $name = $_POST['name'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $username = $_POST['username'];
        $email = $_POST['email'];
        include_once('include/upload.php');
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $username, $password, $email, $image_name]);

        $msg = "User registered successfully";
        $alert = "alert-success";

        echo "<div class=\"alert $alert\">
                <strong>$msg</strong> 
              </div>";
    } catch(PDOException $e) {
        $msg = "Error: " . $e->getMessage();
        $alert = "alert-warning";
        echo "<div class=\"alert $alert\">
                <strong>$msg</strong> 
              </div>";
    }
}
#login checker


// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // User is already logged in, redirect to users.php
    header("Location: users.php");
    exit; // Make sure to exit after redirecting
}

// Your login page content goes here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Images Admin | Login/Register</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post" action="">
                    <h1>Login Form</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required="" name="username"/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit" name="login">Log in</button>
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="#signup" class="to_register"> Create Account </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-file-image-o"></i> Images Admin</h1>
                            <p>©2016 All Rights Reserved. Images Admin is a Bootstrap 4 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form method="post" action="" enctype="multipart/form-data">
                    <h1>Create Account</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Fullname" required="" name="name"/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required="" name="username"/>
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" required="" name="email"/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
                    </div>
                    <div class="form-group">
                     <label for="image">Image:</label>
                     <input type="file" class="form-control"  name="image">
                   </div>
                    <div>
                        <button type="submit" class="btn btn-default submit" name="register">Submit</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="#signin" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-file-image-o"></i> Images Admin</h1>
                            <p>©2016 All Rights Reserved. Images Admin is a Bootstrap 4 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

</body>
</html>

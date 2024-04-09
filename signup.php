<?php include '_dbconnect.php'; ?>

<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    
    $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($conn,$sql);

    $num = mysqli_num_rows($result);

    if($num>0){
        echo'<script> alert("Username already exists");</script>';
    }
    else{
    $hashpassword = password_hash($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users` (`username`,`password`,`first_name`,`last_name`,`address`,`email`) VALUES ('$username','$hashpassword','$firstname','$lastname','$address','$email')";
    $result = mysqli_query($conn,$sql);
    }

}
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty & Skincare Products</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="signup.css">
</head>
<body>

<?php include '_nav.php';?>


<div class="container">
<form action="signup.php" method="post">
    <h1>Sign Up</h1>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" name="firstname" required>

    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname" required>

    <label for="address">Address:</label>
    <textarea id="address" name="address" rows="4" required></textarea>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <input type="submit" value="Sign Up">
    <a href="login.php">Already have an account?</a>
</form>
</div>
  



<?php include '_footer.php';  ?>

<script src="script.js"></script>
</body>
</html>

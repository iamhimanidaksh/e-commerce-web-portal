<?php include '_dbconnect.php'; ?>


<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

    $login_username = $_POST['username'];
    $login_password = $_POST['password'];

        $hashpassword = password_hash($login_password,PASSWORD_DEFAULT);
        $sql = "SELECT * FROM `users` WHERE `username` ='$login_username'";
        $result = mysqli_query($conn,$sql);

        $data=mysqli_fetch_assoc($result);
       
        if(password_verify($login_password,$hashpassword)){
           session_start();
           $_SESSION['loggedin'] = true;
           $_SESSION['username'] = $login_username;
           echo'<script> alert("You have been logged in.");</script>';
           header("location:index.php");
        }
        else{
            echo'<script> alert("Password doesn\'t match");</script>';
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
    <link rel="stylesheet" href="login.css">
</head>
<body>

<?php include '_nav.php';?>


<div class="container">
<form action="login.php" method="post">
    <h1>Log In</h1>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" value="Log In">
   
    <a href="signup.php">Signup?</a>
</form>
</div>
  



<?php include '_footer.php';  ?>

<script src="script.js"></script>
</body>
</html>
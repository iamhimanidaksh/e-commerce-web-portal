<?php include '_dbconnect.php'; ?>


<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];
    
    $sql = "SELECT * FROM `admin` WHERE `username` ='$admin_username' AND `password`=$admin_password";
    $result = mysqli_query($conn,$sql);
    
    $num = mysqli_num_rows($result);
    
    if($num==1){
            session_start();
           $_SESSION['admin_loggedin'] = true;
           $_SESSION['admin_username'] = $admin_username;
           echo'<script> alert("You have been logged in.");</script>';
           header("location:index.php");
           exit;
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
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<?php include '_nav.php';?>


<div class="container">
<form action="admin.php" method="post">
    <h1>Log In for Admin</h1>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" value="Log In">
</form>
</div>
  



<?php include '_footer.php';  ?>

<script src="script.js"></script>
</body>
</html>
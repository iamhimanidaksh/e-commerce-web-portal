<?php include '_dbconnect.php'; ?>

<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

    $name =  $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $preferred_time = $_POST['preferred_time'];
 
    $sql = "INSERT INTO `consult`(`name`,`email`,`phone`,`message`,`preferred_time`) VALUES ('$name','$email','$phone','$message','$preferred_time')";
    $result = mysqli_query($conn,$sql);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty & Skincare Boutique</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="consultation.css">
</head>
<body>

<?php include '_nav.php';?>

<h1>Request a Consultation</h1>
<div class="container">
        <form action="consultation.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            <label for="preferred_time">Preferred Consultation Time:</label>
            <input type="datetime-local" id="preferred_time" name="preferred_time" required>
            <button type="submit">Submit</button>
        </form>
    </div>

<?php include '_footer.php';  ?>

<script src="script.js"></script>
</body>
</html>

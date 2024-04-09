
<?php include '_dbconnect.php'; ?>

<?php

if($_SERVER['REQUEST_METHOD']== 'POST'){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `contact` (`name`,`email`,`message`,`datetime`) VALUES ('$name','$email','$message', current_timestamp())";

    $result = mysqli_query($conn,$sql);
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

    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>

<?php include '_nav.php';  ?>

<div class="container">
  <h1 id="contact">Contact Us</h1>
  <form action="contact.php" method="post">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="message">Message:</label>
      <textarea id="message" name="message" required></textarea>
    </div>
    <div class="form-group">
      <button type="submit">Submit</button>
    </div>
  </form>
</div>




<?php include '_footer.php';  ?>

<script src="script.js"></script>
</body>
</html>

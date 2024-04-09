<?php include '_dbconnect.php'; ?>



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
    <link rel="stylesheet" href="order.css">
</head>
<body>

<?php include '_nav.php';?>

<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
if($_SERVER['REQUEST_METHOD']=='POST'){
$cart_id = $_POST['cartid'];
$quantity = $_POST['quantity'];

$sql = "SELECT * FROM `cart` WHERE `cart_id` = '$cart_id'";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($result);

$product_id = $data['product_id'];
$user_id = $data['user_id'];

$sql2 = "SELECT `price` FROM `products` WHERE `product_id`='$product_id'";
$result2 = mysqli_query($conn,$sql2);
$data2 = mysqli_fetch_assoc($result2);

$price = $data2['price'];

$amount = $quantity*$price;


$sql3 = "INSERT INTO `orders` (`user_id`,`product_id`,`quantity`,`order_date`,`status`,`amount`)VALUES('$user_id','$product_id','$quantity',current_timestamp(),'Shipped','$amount')";
$result3 = mysqli_query($conn,$sql3);

$sql4 = "SELECT *FROM `orders`";
$result4 = mysqli_query($conn,$sql4);

if($result4){
    echo'<script>alert("Your order has been placed");</script>';
}
}
}
else{
    echo'<script>alert("You need to login first");</script>';
    header("location:login.php");

}
?>



<?php include '_footer.php';  ?>

<script src="script.js"></script>
</body>
</html>

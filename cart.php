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
</head>
<body>

<?php include '_nav.php';?>


<!-- insertion -->

<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    if(isset($_GET['productid']) && is_numeric($_GET['productid'])) {
$product_id = $_GET['productid'];

$sqlexists = "SELECT * FROM `cart` WHERE `product_id`='$product_id'";
$resultexists = mysqli_query($conn,$sqlexists);

$num = mysqli_num_rows($resultexists);

if($num>0){
 echo'<script>alert("Product already in cart");</script>';
}
else{
    $sqlfetch = "SELECT `user_id` FROM `users` WHERE `username` = '{$_SESSION['username']}'";
    $resultfetch = mysqli_query($conn,$sqlfetch);
    
    $data = mysqli_fetch_assoc($resultfetch);
    
    $user_id =  $data['user_id'];
    
    $sqlinsert = "INSERT INTO `cart` (`product_id`,`user_id`) VALUES ('$product_id','$user_id')";
    $resultinsert = mysqli_query($conn,$sqlinsert);
}
}
}
else{
    echo'<script>alert("You need to login for buy products.");</script>';

}
?>


<!-- fetching -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>
    <h1 id="shopping-cart">Shopping Cart</h1>
   
     <div class="cart-container">
    <?php
    
    $sql = "SELECT * FROM `cart` ";
    $result = mysqli_query($conn,$sql);

    while($data=mysqli_fetch_assoc($result)){
        $cart_id = $data['cart_id'];
        $product_id = $data['product_id'];
        $user_id = $data['user_id'];

        $sql2 = "SELECT * FROM `products` WHERE `product_id`='$product_id'";
        $result2 = mysqli_query($conn,$sql2);

        while($data2 = mysqli_fetch_assoc($result2)){
     
    echo'<div class="cart">
    <div class="cart-item">
      <div class="item-details">
        <h3>'.$data2['product_name'].'</h3>
        <p>Price: Rs '.$data2['price'].'</p>
      </div>
    </div>
    <form action="order.php" method="post">
    <input type="hidden" name="cartid" value="' . $cart_id . '">
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" min="1" value="1">
    <input type="submit" value="Buy Now">
  </form>
    </div>';
        }

    }
?>
</div>
<?php include '_footer.php';  ?>

</body>
</html>




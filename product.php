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
    <link rel="stylesheet" href="product.css">
</head>
<body>

<?php include '_nav.php';?>



<section id="head">
    <h2>Welcome to our Beauty & Skincare Products Store</h2>
    <p>Discover a wide range of beauty and skincare products to enhance your natural beauty.</p>
</section>
<div class="p-container">
<?php

$catid = $_GET['catid'];


$sql = "SELECT * FROM `products` WHERE `category_id` ='$catid'";
$result = mysqli_query($conn,$sql);
$i = $_GET['catid'];
while($data= mysqli_fetch_assoc($result)){
    echo'<div class="product-container">
    <div class="product-card">
    <div class="product-image">
      <img src="pimg'.$i.'.jpeg" alt="Product Image">
    </div>
    <div class="product-details">
      <h2 class="product-name">'.$data['product_name'].'</h2>
      <p class="product-description">'.substr($data['product_description'],0,100).'.</p>
      <p class="product-price">Price: Rs.'.$data['price'].'</p>
      <p class="product-brand">In Stock: '.$data['stock'].'</p>
      <p class="product-stock">Brand: '.$data['brand'].'</p>
      <a href="cart.php?productid='.$data['product_id'].'" class="add-to-cart-button">Add to Cart</a>
    </div>
  </div>
  </div>';
}


?>
</div>


<?php include '_footer.php';  ?>



</body>
</html>

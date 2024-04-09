<?php include '_dbconnect.php'; ?>



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
</head>
<body>

<?php include '_nav.php';?>



<section id="head">
    <h2>Welcome to our Beauty & Skincare Products Store</h2>
    <p>Discover a wide range of beauty and skincare products to enhance your natural beauty.</p>
    <div class="search-container">
        <form action="search.php" method="get">
            <input type="text" placeholder="Search products..." name="query">
            <button type="submit">Search</button>
        </form>
    </div>
</section>


<h1 id="product-categories">Categories</h1>
<div class="container">

<?php

$sql = "SELECT * FROM `categories`";
$result = mysqli_query($conn,$sql);
$i = 1;
while($data = mysqli_fetch_assoc($result)){

    echo'<div class="card">
  <img src="cimg'.$i.'.jpeg" alt="Placeholder Image">
  <div class="card-content">
    <h2 class="card-title">'.$data['category_name'].' </h2>
    <a href="product.php?catid='.$data['category_id'].'" class="button">View Products</a>
  </div>
</div>';
$i = $i +1;
}

?>
  </div>
  <hr>
  <h1 id="products-fetch">Products</h1>
  <div class="container">
 
<?php
   
   $sql2 = "SELECT * FROM `products`";
   $result2 = mysqli_query($conn,$sql2);
   $i=1;
   while($data2 = mysqli_fetch_assoc($result2)){
    echo'<div class="product-container">
    <div class="product-card">
    <div class="product-image">
      <img src="pimg'.$i.'.jpeg" alt="Product Image">
    </div>
    <div class="product-details">
      <h2 class="product-name">'.$data2['product_name'].'</h2>
      <p class="product-description">'.substr($data2['product_description'],0,80).'...</p>
      <p class="product-price">Price: Rs.'.$data2['price'].'</p>
      <p class="product-brand">In Stock: '.$data2['stock'].'</p>
      <p class="product-stock">Brand: '.$data2['brand'].'</p>
      <a href="cart.php?productid='.$data2['product_id'].'" class="add-to-cart-button">Add to Cart</a>
    </div>
  </div>
  </div>';
  $i=$i+1;
   }
?>
</div>
<?php include '_footer.php';  ?>

<script src="script.js"></script>
</body>
</html>

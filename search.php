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
    <link rel="stylesheet" href="search.css">
</head>
<body>

<?php include '_nav.php';?>

<?php 

$query = $_GET['query'];
echo'<h1 id="search-results">Search Results for "<em>'.$query.'</em>"</h1>';  ?>

<div class="search-container">
<?php
$noresults = true;

$sql = "SELECT * FROM `products` WHERE match (`product_name`,`product_description`) AGAINST ('$query')";
$result = mysqli_query($conn,$sql);

    $i=1;
    while($data = mysqli_fetch_assoc($result)){
        $noresults=false;
     echo'<div class="product-container">
     <div class="product-card">
     <div class="product-details">
       <h2 class="product-name">'.$data['product_name'].'</h2>
       <p class="product-description">'.substr($data['product_description'],0,90).'...</p>
       <p class="product-price">Price: Rs.'.$data['price'].'</p>
       <p class="product-brand">In Stock: '.$data['stock'].'</p>
       <p class="product-stock">Brand: '.$data['brand'].'</p>
       <a href="cart.php?productid='.$data['product_id'].'" class="add-to-cart-button">Add to Cart</a>
     </div>
   </div>
   </div>';
   $i=$i+1;
}

if($noresults){
    echo'<script>alert("No results found");</script>';
}


?>
</div>

<?php include '_footer.php';  ?>

<script src="script.js"></script>
</body>
</html>

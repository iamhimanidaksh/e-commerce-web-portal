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
<link rel="stylesheet" href="manage.css">
</head>
<body>

<?php include '_nav.php';?>


<?php 

if(isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin']==true){
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['category_name'])){
    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO `categories`(`category_name`) VALUES ('$category_name')";
    $result = mysqli_query($conn,$sql);
  }
  elseif(isset($_POST['category_id'])){
    $category_id = $_POST['category_id'];

    $sql2 = "DELETE FROM  `categories` WHERE `category_id`='$category_id'";
    $result2 = mysqli_query($conn,$sql2);
  }
  elseif(isset($_POST['product_name'])){
    
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $pcategory_id = $_POST['pcategory_id'];
    $stock = $_POST['stock'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];

    $sql3 = "INSERT INTO `products` (`category_id`,`product_name`,`product_description`,`price`,`stock`,`brand`) VALUES ('$pcategory_id','$product_name','$product_description','$price','$stock','$brand')";
    $result3 = mysqli_query($conn,$sql3);
  }
  elseif(isset($_POST['product_id'])){
     $product_id = $_POST['product_id'];
     $sql4 = "DELETE FROM  `products` WHERE `product_id`='$product_id'";
     $result4 = mysqli_query($conn,$sql4);
  }
  else{
    echo'<script>alert("You need to login first...");</script>';
  }
}
}
else{
    echo'<script>alert("You need to login first");</script>';
    header("location:admin.php");
}
?>


<h1 id="manage-categories">Manage Categories</h1>
<div class="container">
    <!-- Add your category management form here -->
    <form action="manage.php" method="post">
        <label for="category_name">Category Name:</label>
        <input type="text" id="category_name" name="category_name" required>
        <input type="submit" value="Add Category">
     </form>
        <form action="manage.php" method="post">
        <label for="category_id">Category ID:</label>
        <input type="text" id="category_id" name="category_id" required>
        <input type="submit" value="Remove Category"> 
    </form> 
</div>




<h1 id="manage-products">Manage Products</h1>
<div class="container">
  
    <form action="manage.php" method="post">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>
        
        <label for="product_description">Product Description:</label>
        <textarea id="product_description" name="product_description" required></textarea>
        
        <label for="pcategory_id">Category ID:</label>
        <input type="text" id="pcategory_id" name="pcategory_id" required>
        
        <label for="stock">Stock:</label>
        <input type="text" id="stock" name="stock" required>
        
        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" required>
        
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>
        
        <input type="submit"  value="Add Product">
    </form>
    
   
    <form action="manage.php" method="post">
        <label for="product_id">Product ID:</label>
        <input type="text" id="product_id" name="product_id" required>
        
        <input type="submit"  value="Remove Product"> 
    </form> 
</div>

<h1 id="manage-cr">Manage Consultation Requests</h1>
<div class="container">
<?php

$sql = "SELECT * FROM `consult`";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);

echo'<table>
<thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Message</th>
        <th>Preferred Time</th>
    </tr>
</thead>';


if($num==0){
    echo'<script>alert("There is no consultation request.");</script>';
}
while($data = mysqli_fetch_assoc($result)){

$phone = str_replace('-', '', $data['phone']);

echo'
            <tbody>
                <td>'.$data['consult_id'].'</td>
                <td>'.$data['name'].'</td>
                <td>'.$data['email'].'</td>
                <td>'.$phone.'</td>
                <td>'.$data['message'].'</td>
                <td>'.$data['preferred_time'].'</td>
            </tbody>';
}

echo'</table>';

?>
</div>


<?php include '_footer.php';  ?>

<script src="script.js"></script>
</body>
</html>

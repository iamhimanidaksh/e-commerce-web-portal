<?php include '_dbconnect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="orders.css">
</head>
<body>

<?php include '_nav.php';?>

<h1 id="myorders">My Orders</h1>
<?php

$sql = "SELECT * FROM `orders`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
        echo '<div class="order-details">
                <h2>Order Confirmation</h2>
                <div class="order-info">
                    <p><strong>Order ID:</strong>'.$data['order_id'].'</p>
                    <p><strong>Product ID:</strong>'.$data['product_id'].'</p>
                    <p><strong>User ID:</strong>'.$data['user_id'].'</p>
                    <p><strong>Quantity:</strong>'.$data['quantity'].'</p>
                    <p><strong>Order Date:</strong>'.$data['order_date'].'</p>
                    <p><strong>Status:</strong>'.$data['status'].'</p>
                    <p><strong>Amount:</strong>Rs '.$data['amount'].'</p>
                </div>
            </div>';
    }
} else {
    echo'<script>alert("No orders found.");</script>';

}

?>

<?php include '_footer.php';  ?>

</body>
</html>

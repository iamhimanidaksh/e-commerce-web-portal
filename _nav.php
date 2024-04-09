<?php

session_start();
   $login = false;
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
   $login = true;
}

echo'<header>
<h1>Beauty & Skincare Boutique</h1>
<nav>
    <a href="index.php">Home</a>
    <a href="cart.php">Cart</a>
    <a href="orders.php">My Orders</a>
    <a href="consultation.php">Consultation</a>
    <a href="tips.php">Tips</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>';
    
    if(!$login){
    echo'<a href="signup.php">Signup</a>
    <a href="login.php">Login</a>
    <a href="admin.php">Admin</a>';
    }
    if($login){
    echo'<a href="logout.php">Log Out</a>';
    }
    if(isset($_SESSION['admin_loggedin'])&& $_SESSION['admin_loggedin']==true){
      echo'<a href="manage.php">Manage</a>';
    }
    
echo'</nav>
</header>';

?>
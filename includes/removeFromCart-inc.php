<?php

session_start();

if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];  
    $cart = (array)$_SESSION['cart'];

    if (($key = array_search($productId, $cart)) !== false) {
        unset($cart[$key]);
    }

    $_SESSION['cart'] = $cart;
    header("location: ../cart.php");

    
}

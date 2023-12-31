<?php

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];  
    $cart = (array)$_SESSION['cart'];
    array_push($cart, $productId);
    $_SESSION['cart'] = $cart;
    header("location: ../cart.php");
}

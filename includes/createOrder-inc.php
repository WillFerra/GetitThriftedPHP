<?php

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";
session_start();

if(isset($_POST['placeOrderBtn']))
{
    $userId = $_SESSION["userId"];
    $orderDate = date("Y-m-d");
    $insert_query = "INSERT INTO Orders (userId, orderDate) VALUES ('$userId', '$orderDate')";
    $insert_query_run = mysqli_query($conn, $insert_query);

    if($insert_query_run)
    {
        $orderId = mysqli_insert_id($conn);
        if (isset($_SESSION['cart'])) {
            $cart = (array)$_SESSION['cart']; 
            foreach ($cart as $item) {
                $prodId = $item["id"];
                $productId = $_POST["prodId"];
                
                $date = date("Y-m-d");
                    
                $insert_items_query = "INSERT INTO OrderItems (orderId, prodId, date) VALUES ('$orderId','$productId', '$date')";
                $insert_items_query_run = mysqli_query($conn, $insert_items_query);
            }
        }
        $_SESSION['message'] = "Order places Successfully";
        header("location: ../profile.php");
    }
}
else{
    header("location: ../checkout.php");
    exit();
}

// if(empty($_POST)){
//     header("location: ../checkout.php");
//     exit();
// }
// else{
//     foreach ($_SESSION['cart'] as $item) {
//         $prodId = $item['id'];
//         $productId = $_POST["prodId"];

//         $insertQuery = "INSERT INTO orders (productId) VALUES ('$itemName', $quantity)";
//         $conn->query($insertQuery);
//     }

//     echo $productId;
//     exit();

//     createOrder($conn, $productId);
// }
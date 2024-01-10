<?php

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if(empty($_POST)){
    header("location: ../adminProducts.php");
    exit();
}
else{
    $name = $_POST["name"];
    $price = $_POST["price"];
    $sizeId = $_POST["sizeId"];
    $description = $_POST["description"];
    $stockQty = $_POST["stockQty"];
    $imgLink = $_POST["imgLink"];
    $sellerId = $_POST["sellerId"];

    updateProduct($conn, $name, $price, $sizeId, $description, $stockQty, $imgLink, $sellerId);
}

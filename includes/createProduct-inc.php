<?php 

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if(empty($_POST)){
    header("location: ../createProduct.php");
    exit();
}
else{
    $name = $_POST["name"];
    $price = $_POST["price"];
    $sizeId = $_POST["size"];
    $description = $_POST["description"];
    $stockQty = $_POST["stockQty"];
    $imgLink = $_POST["imgLink"];
    $sellerId = $_POST["seller"];

    $emptyInputs = emptyInputs([$name
    ,$price, 
    $sizeId, 
    $description, 
    $stockQty, 
    $imgLink,
    $sellerId
]);

    if ($emptyInputs){
        header("location:../createProduct.php?error=emptyinput");
        exit();
    }

    createProduct($conn, $name, $price, $sizeId, $description, $stockQty, $imgLink, $sellerId);
}
<?php 

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if(empty($_POST)){
    header("location: ../becomeSeller.php");
    exit();
}
else{
    $userId = $_POST["userId"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $why = $_POST["why"];
    $productName = $_POST["productName"];
    $description = $_POST["description"];
    $sellingPrice = $_POST["sellingPrice"];
    $size = $_POST["size"];
    $imageLink = $_POST["imgLink"];

    $invalidUsername = invalidUsername($username);
    if ($invalidUsername){
        header("location:../becomeSeller.php?error=invalidUsername");
        exit();
    }

    $emptyInputs = emptyInputs([$username
    , $password, 
    $why, 
    $productName, 
    $description, 
    $sellingPrice, 
    $size, 
    $imageLink
]);

    if ($emptyInputs){
        header("location:../becomeSeller.php?error=emptyinput");
        exit();
    }

    sellerRequest($conn, $userId, $username, $password, $why, $productName, $description, $sellingPrice, $size, $imageLink);
}
<?php

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if(empty($_POST)){
    header("location: ../login.php");
    exit();
}
else{
    $id = $_POST["userId"];
    $cardNumber = $_POST["cardNumber"];
    $accountHolder = $_POST["accountHolder"];
    $cvv = $_POST["cvv"];
    $expirationDate = $_POST["expirationDate"];
    $bank = $_POST["bank"];

    updateUserPayment($conn, $cardNumber, $accountHolder, $cvv, $expirationDate, $bank, $id);
}

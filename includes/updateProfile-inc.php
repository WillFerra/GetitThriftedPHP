<?php

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if(empty($_POST)){
    header("location: ../login.php");
    exit();
}
else{
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $doB = $_POST["doB"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confPassword = $_POST["confPassword"];
    
    $address = $_POST["address"];
    $street = $_POST["street"];
    $town = $_POST["town"];
    $country = $_POST["country"];
    $cvv = $_POST["cvv"];
    $accountHolder = $_POST["accountHolder"];
    $cardNumber = $_POST["cardNumber"];
    $expirationDate = $_POST["expirationDate"];
    $bank = $_POST["bank"];

    // Validations would go here

    updateUser($conn, $name, $surname, $doB, $email, $username, $password, $address, $street, $town, $country, $cardNumber, $accountHolder, $cvv, $expirationDate, $bank);
}

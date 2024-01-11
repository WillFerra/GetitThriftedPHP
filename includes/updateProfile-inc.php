<?php

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if(empty($_POST)){
    header("location: ../login.php");
    exit();
}
else{
    $id = $_POST["paymentId"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $doB = $_POST["doB"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confPassword = $_POST["confPassword"];
    
    updateUserDetails($conn, $id, $name, $surname, $doB, $email, $username, $password);
}

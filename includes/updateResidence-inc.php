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
    $address = $_POST["address"];
    $street = $_POST["street"];
    $town = $_POST["town"];
    $country = $_POST["country"];

    updateUserResidence($conn, $address, $street, $town, $country, $id);
}

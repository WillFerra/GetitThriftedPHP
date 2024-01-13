<?php 

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if(empty($_POST)){
    header("location: ../adminSellers.php");
    exit();
}
else{

    $id = $_POST["requestId"];
    $userId = $_POST["userId"];

    approveRequest($conn, $id, $userId);

    // Delete the request
    deleteRequest($conn, $id);
}
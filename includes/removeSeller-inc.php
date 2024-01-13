<?php 

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if(empty($_POST)){
    header("location: ../adminSellers.php");
    exit();
}
else{

    $id = $_POST["sellerId"];

    removeSeller($conn, $id);
}
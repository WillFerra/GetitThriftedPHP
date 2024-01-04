<?php 

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if(isset($_GET["prodId"])){
    deleteProduct($conn, $_GET["prodId"]);
}
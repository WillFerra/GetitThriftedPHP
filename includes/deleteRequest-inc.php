<?php 

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if(isset($_GET["requestId"])){
    deleteRequest($conn, $_GET["requestId"]);
}
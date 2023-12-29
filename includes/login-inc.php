<?php
    if(isset($_POST["submit"])) {
        require_once "functions.php";
        require_once "dbh.php";
        require_once "db-functions.php";

        $username = $_POST["username"];
        $password = $_POST["password"];
        
        if (emptyInputs([$username, $password]) == true) {
            header("location: ../login.php?error=emptyinput");
            exit();
        }
        error_log($username, $password);
        loginUser($conn, $username, $password);
    }
    else
    {
        header("location: ../login.php");
        exit();
    }
?>
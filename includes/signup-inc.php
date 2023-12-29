<?php 

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if(empty($_POST)){
    header("location: ../signup.php");
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
    
    
    // Validations
    $passwordsMatch = passwordsMatch($password, $confPassword);
    if (!$passwordsMatch)
    {
        header("location:../index.php?error=passwordsDoNotMatch");
        exit();
    }

    $invalidUsername = invalidUsername($username);
    if ($invalidUsername){
        header("location:../index.php?error=invalidUsername");
        exit();
    }

    $emptyInputs = emptyInputs([$name
    , $surname, 
    $doB, 
    $email, 
    $username, 
    $password, 
    $confPassword, 
    $address, 
    $street, 
    $town, 
    $country
]);

    if ($emptyInputs){
        header("location:../signup.php?error=emptyinput");
        exit();
    }

    $invalidEmail = invalidEmail($email);
    if($invalidEmail){
        header("location:../index.php?error=invalidEmail");
        exit();
    }

    createUser($conn, $name, $surname, $doB, $email, $username, $password, $address, $street, $town, $country, $cardNumber, $accountHolder, $cvv, $expirationDate, $bank);
}
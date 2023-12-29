<?php

function passwordsMatch($password, $confPassword){

    $result = false;
    if($password == $confPassword){
        $result = true;
    }
    return $result; 
}

function emptyInputs($inputs){
    foreach($inputs as $input){
        if(empty($input)==true){
            return true;
        }
    }
}

function invalidEmail($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    else{
        return false;
    }
}

function invalidUsername($username){
    $result = false;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }

    return $result;
}

function loginUser($conn, $username, $password){    
    $userExists = userExists($conn, $username, $password);
    
    if ($userExists == false){
        header("location: ../login.php?error=incorrectlogin");
        exit();
    }

    $hashedPassword = $userExists["password"];
    var_dump($hashedPassword);

    $checkPassword = passwordVerify($password,$hashedPassword);
    var_dump($checkPassword);

    if ($checkPassword == false){
        header("location: ../login.php?error=incorrectlogin");
        exit();
    }
    elseif($checkPassword === true){
        session_start();
        $_SESSION["username"] = $userExists["username"];

        header("location: ../index.php");
        exit();
    }
}

function passwordVerify($password, $hashedPassword){

    $result = false;
    if($password == $hashedPassword){
        $result = true;
    }
    return $result; 
} 
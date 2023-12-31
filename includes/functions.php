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

        $stmt = mysqli_stmt_init($conn);

        // getting the user id from the database
        $sql = "SELECT id FROM `Users` WHERE username = '$username' LIMIT 0, 100;";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id);

        /* fetch values */
        while (mysqli_stmt_fetch($stmt)) {
            $userid = $id;
        }
        $userId = (int)$userid;

        // getting the user role from the database
        $sql = "SELECT roleId FROM `Users` WHERE username = '$username' LIMIT 0, 100;";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $roleId);

        /* fetch values */
        while (mysqli_stmt_fetch($stmt)) {
            $userRole = $roleId;
        }
        $userRoleId = (int)$userRole;

        if($userRoleId == '1'){
            storeUserId($userId);
            header("location: ../index.php?user=".$userId."role=".$userRoleId);
            exit();
        }
        else{
            header("location: ../adminDashboard.php?user=".$userId."role=".$userRoleId);
            exit();
        }
    }
}

function storeUserId($user){
    // if (isset($_GET['user'])) {
        // Retrieve the values from the URL parameters
        // $userId = $_GET['user'];

        $_SESSION['userId'] = $user;
    // }
}

function passwordVerify($password, $hashedPassword){
    $result = false;
    if($password == $hashedPassword){
        $result = true;
    }
    return $result; 
} 

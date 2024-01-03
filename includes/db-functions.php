<?php

function loadStreets($conn){
    $sql = "SELECT * FROM Street;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Streets";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function loadTowns($conn){
    $sql = "SELECT * FROM Town;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Towns";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function loadCountry($conn){
    $sql = "SELECT * FROM Country;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Countries";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function loadBanks($conn){
    $sql = "SELECT * FROM Bank;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Banks";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function loadPayments($conn){
    $sql = "SELECT * FROM Payment;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Payment Details";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function createUser($conn, $name, $surname, $doB, $email, $username, $password, $address, $street, $town, $country, $cardNumber, $accountHolder, $cvv, $expirationDate, $bank)
{
    $stmt = mysqli_stmt_init($conn);

    $sql = "INSERT INTO Payment (bankId, cardNumber, accountHolder, cvv, expirationDate) VALUES (?,?,?,?,?)";
    mysqli_stmt_prepare($stmt, $sql);
    $bankId = (int)$bank;
    $cvvNo = (int)$cvv;
    mysqli_stmt_bind_param($stmt, "issis", $bankId, $cardNumber, $accountHolder, $cvvNo, $expirationDate);
    $result = mysqli_stmt_execute($stmt);
    
    $sql = "SELECT Max(id) FROM Payment;";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $maxId);

    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
        $paymentInsert = $maxId;
    }
    $paymentInsertId = (int)$paymentInsert;


    $sql = "INSERT INTO Street (name, townId) VALUES (?,?)";
    mysqli_stmt_prepare($stmt, $sql);
    $townId = (int)$town;
    mysqli_stmt_bind_param($stmt, "si", $street, $townId);
    mysqli_stmt_execute($stmt);
    
    $sql = "SELECT Max(id) FROM Street;";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $maxId);

    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
        $streetInsert = $maxId;
    }
    $streetInsertId = (int)$streetInsert;


    $sql = "INSERT INTO Users
        (username, email, password, name, surname, dateOfBirth, address, streetId, paymentId, roleId)
        VALUES(?,?,?,?,?,?,?,$streetInsertId,$paymentInsertId,1);";

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $username, $email, $password, $name, $surname, $doB, $address);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // redirect back to sign up page once registration is complete
    header("location: ../index.php?success=true");
}

function loadProduct($conn, $id){
    $sql = "SELECT * FROM Products WHERE id = {$id};";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Products";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    // only returns database record if it exists
    if ($row = mysqli_fetch_assoc($result)){
        return $row;
    }
    else
    {
        return false;
    }
}

function loadAllProducts($conn){
    $sql = "SELECT * FROM Products";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Products";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function userExists($conn, $username, $email){
    $sql = "SELECT username, password FROM Users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    }
}

function loadUser($conn, $userId){
    $sql = "SELECT * FROM Users WHERE id = {$userId};";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Users";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    // only returns database record if it exists
    if ($row = mysqli_fetch_assoc($result)){
        return $row;
    }
    else
    {
        return false;
    }
}

function updateUser($conn, $name, $surname, $doB, $email, $username, $password, $address, $street, $town, $country, $cardNumber, $accountHolder, $cvv, $expirationDate, $bank){
    $sql = "UPDATE Users
            SET name = ?,
                surname = ?,
                doB = ?,
                email = ?,
                username = ?,
                password = ?,
                address = ?, 
                street = ?,
                town = ?,
                country = ?,
                cardNumber = ?,
                accountHolder = ?,
                cvv = ?,
                expirationDate = ?,
                bank = ?
            WHERE id = ?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "sssssssiiiisisi", $name, $surname, $doB, $email, $username, $password, $address, $street, $town, $country, $cardNumber, $accountHolder, $cvv, $expirationDate, $bank);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // redirect back to sign up page once registration is complete
    header("location: ../profile.php?profile={$id}&success=true");
    exit();
}
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

function loadSellers($conn){
    $sql = "SELECT * FROM Users WHERE roleId = 2;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Sellers";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function loadBuyers($conn){
    $sql = "SELECT * FROM Users WHERE roleId = 1;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Sellers";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function loadRequested($conn){
    $sql = "SELECT * FROM Requests";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Requests";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function loadSizes($conn){
    $sql = "SELECT * FROM Size;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Sizes";
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

function createUser($conn, $name, $surname, $doB, $email, $username, $password, $address, $street, $town, $country, $cardNumber, $accountHolder, $cvv, $expirationDate, $bank){
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

function updateUserDetails($conn, $id, $name, $surname, $doB, $email, $username, $password){
    
    $sql = "UPDATE Users
            SET name = ?,
                surname = ?,
                dateOfBirth = ?,
                email = ?,
                username = ?,
                password = ?
            WHERE id = ?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../profile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "sssssss", $name, $surname, $doB, $email, $username, $password, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // redirect back to sign up page once registration is complete
    header("location: ../profile.php?profile={$id}&success=true");
    exit();
}

function updateUserResidence($conn, $address, $street, $id){
        
    // update the address
    $sql = "UPDATE Users
            SET address = ?,
                streetId = ?
            WHERE id = ?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../profile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "sis", $address, $steetId, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // redirect back to sign up page once registration is complete
    header("location: ../profile.php?profile={$id}&success=true");
    exit();
}

function updateUserPayment($conn, $cardNumber, $accountHolder, $cvv, $expirationDate, $bankId, $id){
        
    // update the payment
    $sql = "UPDATE Payment
            SET cardNumber = ?,
            accountHolder = ?,
            cvv = ?,
            expirationDate = ?,
            bankId = ?
            WHERE id = ?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../profile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ssiiis", $cardNumber, $accountHolder, $cvv, $expirationDate, $bankId, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // redirect back to sign up page once registration is complete
    header("location: ../profile.php?profile={$id}&success=true");
    exit();
}

function createProduct($conn, $name, $price, $size, $description, $stockQty, $imgLink, $sellerId){
    $stmt = mysqli_stmt_init($conn);

    $uploadDate = date("Y-m-d");
    $statusId = 2;

    $sql = "INSERT INTO Products (name, price, sizeId, description, stockQty, imgLink, uploadDate, sellerId, statusId) VALUES (?,?,?,?,?,?,?,?,?)";
    mysqli_stmt_prepare($stmt, $sql);
    $sellerId = (int)$sellerId;
    mysqli_stmt_bind_param($stmt, "sdisissii", $name, $price, $size, $description, $stockQty, $imgLink, $uploadDate, $sellerId, $statusId);
    $result = mysqli_stmt_execute($stmt);
    

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    // redirect back to sign up page once registration is complete
    header("location: ../adminProducts.php?success=true");
}

function deleteProduct($conn, $id){
    $sql = "DELETE FROM Products WHERE id = ?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not delete Product";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../adminProducts.php");
    exit();
}

function deleteRequest($conn, $id){
    $sql = "DELETE FROM Requests WHERE id = ?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not delete request";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../adminSellers.php");
    exit();
}

function loadStreetById($conn, $id){
    $sql = "SELECT * FROM Street WHERE id = {$id};";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Streets";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result->fetch_assoc();
}

function loadTownById($conn, $id){
    $sql = "SELECT * FROM Town WHERE id = {$id};";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Towns";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result->fetch_assoc();
}

function loadPaymentById($conn, $id){
    $sql = "SELECT * FROM Payment WHERE id = {$id};";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Payment";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result->fetch_assoc();
}

function loadBankById($conn, $id){
    $sql = "SELECT * FROM Bank WHERE id = {$id};";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Banks";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result->fetch_assoc();
}

function loadSizeById($conn, $id){
    $sql = "SELECT * FROM Size WHERE id = {$id};";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Sizes";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result->fetch_assoc();
}

function loadSellerById($conn, $id){
    $sql = "SELECT * FROM Users WHERE id = {$id};";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Banks";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result->fetch_assoc();
}

function updateProduct($conn, $name, $price, $sizeId, $description, $stockQty, $imgLink, $sellerId, $id){

    $sql = "UPDATE Products
            SET name = ?,
                price = ?,
                sizeId = ?,
                description = ?,
                stockQty = ?,
                imgLink = ?,
                sellerId = ?
            WHERE id = ?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../adminProducts.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "sdisisis", $name, $price, $sizeId, $description, $stockQty, $imgLink, $sellerId, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // redirect back to sign up page once registration is complete
    header("location: ../adminProducts.php");
    exit();
}

function sellerRequest($conn, $userId, $username, $password, $why, $productName, $description, $sellingPrice, $size, $imageLink){

    $stmt = mysqli_stmt_init($conn);

    $sql = "INSERT INTO Requests
        (userId, username, password, why, productName, description, sellingPrice, size, imageLink, statusId, requestDate)
        VALUES(?,?,?,?,?,?,?,?,?,?,?);";

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../becomeSeller.php?error=stmtfailed");
        exit();
    }

    $statusId = 1;
    $requestDate = date("Y-m-d");

    mysqli_stmt_bind_param($stmt, "isssssdssis", $userId, $username, $password, $why, $productName, $description, $sellingPrice, $size, $imageLink, $statusId, $requestDate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // redirect back to sign up page once request is complete
    // <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    //     <div class="toast-header">
            
    //         <strong class="me-auto">Seller Request</strong>
    //         <small>Just now</small>
    //         <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    //     </div>
    //     <div class="toast-body">
    //         Request Successful.
    //     </div>
    // </div>
    // <?php
    header("location: ../becomeSeller.php?success=true");
}

function approveRequest($conn, $id, $userId){
    $sql = "UPDATE Users SET roleId = 2 WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Error preparing statement: " . mysqli_error($con));
    }

    mysqli_stmt_bind_param($stmt, "i", $userId);

    if (mysqli_stmt_execute($stmt)) {
        // User role updated successfully, now delete the request
        deleteRequest($conn, $id);
        // header("location:adminSellers.php");
    } else {
        echo "Error updating user role: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}

function removeSeller($conn, $id){
    $sql = "UPDATE Users SET roleId = 1 WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Error preparing statement: " . mysqli_error($con));
    }

    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        // User role updated successfully
        header("location:../adminSellers.php");
        exit();
    } else {
        echo "Error updating user role: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
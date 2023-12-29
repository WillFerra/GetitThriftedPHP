<?php

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
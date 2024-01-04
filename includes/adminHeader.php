<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>

        <!-- Bootstrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <style>
        body {
            padding-top: 50px;
        }
    </style>

    <body>
        <style>
            @font-face {
                font-family: Bebas;
                src: url(assets/Montserrat-Regular.ttf);
            }
        </style>

        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <img src="assets/logo.png" alt="Logo" width="70" height="50" class="d-inline-block align-text-top">
                <a class="navbar-brand">Get It Thrifted</a>
            </div>
        </nav>
        
        <!-- The sidebar -->
        <div class="sidebar sideBarMargin">
            <a class="active" href="adminDashboard.php">Dashboard</a>
            <a href="adminProducts.php">Products</a>
            <a href="adminSellers.php">Page Roles</a>
        </div>

        
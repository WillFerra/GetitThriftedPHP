<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get It Thrifted</title>

    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <style>
        @font-face {
            font-family: Bebas;
            src: url(assets/Bebas-Regular.otf);
        }
    </style>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img src="assets/logo.png" alt="Logo" width="70" height="50" class="d-inline-block align-text-top">
            <a class="navbar-brand" href="index.php">Get It Thrifted</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="products.php">Products</a>
                    <a class="nav-link" href="gallery.php">Gallery</a>
                    <a class="nav-link" href="contact.php">Contact</a>
                </div>
            </div>

            <a href="cart.php">
                <button type="button" class="btn">
                    <img src="assets/cart-shopping-solid.png" alt="Cart" width="20" height="auto" href="cart.php">
                </button>
            </a>

            <div class="dropdown-center">
                <a href="profile.php">
                    <button type="button" class="btn">
                        <img src="assets/user-solid.png" alt="User" width="20" height="auto" href="cart.php">
                    </button>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="login.php">My Account</a></li>
                    <li><a class="dropdown-item" href="#">Become a Seller</a></li>
                </ul>
            </div>

            <!-- Use justify content = space between in css -->
            <form class="d-flex"  role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <a href="products.php">
                    <button type="button" class="btn btn-outline-success" type="submit">Search</button>
                </a>
            </form>
        </div>
    </nav>
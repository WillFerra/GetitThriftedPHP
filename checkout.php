<?php 
    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    
    include "includes/header.php";

    session_start();
    if(!isset($_SESSION["username"])){
        header("location:login.php");
        exit();
    }
    if ($_SESSION['userId'] != NULL){
        $currentUser = $_SESSION["userId"];

        $users = loadUser($conn, $currentUser);
        $street = loadStreets($conn);
        $town = loadTowns($conn);
        $country = loadCountry($conn);
        $bank = loadBanks($conn);
        $payment = loadPayments($conn);

        $userStreet = loadStreetById($conn, $users["streetId"]);
        $userTown = loadTownById($conn, $userStreet["townId"]);
        $userPayment = loadPaymentById($conn, $users["paymentId"]);
        $userBank = loadBankById($conn, $userPayment["bankId"]);
    }
?>

<br>
<br>

<div class="container mt-3">
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <form action="includes/createOrder-inc.php" method="POST">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Card to be charged</h3>
                            <br>

                            <p class="card-text">Card Number: <?php echo $userPayment["cardNumber"]?></p>
                            <p class="card-text">Account Holder: <?php echo $userPayment["accountHolder"]?></p>
                            <p class="card-text">Expiration Date: <?php echo $userPayment["expirationDate"]?></p>
                            <a href="profile.php" class="card-link">Wrong Card?</a>
                        </div>
                    </div>
                    <br>
                    
                    <div class="row">
                        <div class="col-12 mb-3">
                            <button type="submit" name="placeOrderBtn" class="btn btn-success w-100 p-2 fs-5">Place Order</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Your Items</h3>
                        <a href="cart.php" class="card-link">Edit</a>
                        <br>
                        <br>

                        <?php
                        // Display the products in the cart
                        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                            $cart = (array)$_SESSION['cart']; 
                            foreach($cart as $cartItem):
                                $product = loadProduct($conn, $cartItem);
                            ?>

                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="<?php echo $product["imgLink"];?>" class="img-fluid rounded-start" alt="Product Image" style="width: auto; height: 100px;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $product["name"]?></h5>
                                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $product["description"];?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            endforeach;
                        }
                        ?>
                        <hr>
                        <div class="row">
                            <div class="col-lg-8">
                                <h4>Total</h4>
                            </div>
                            <div class="col-lg-3">
                                <?php
                                $total = 0;
                                foreach($cart as $cartItem):
                                    $product = loadProduct($conn, $cartItem);
                                    $total = $total + $product["price"];
                                endforeach;
                                ?>
                                <h4>€ <?php echo $total?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
    include 'includes/footer.php';
?>

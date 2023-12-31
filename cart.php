<?php 
    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    
    include "includes/header.php";
?>

<br>
<br>

<?php
    // Start the session
    session_start();
?>


<div class="container mt-3">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="border p-3 mb-3">
                    <h3>Your Products</h3>

                    <?php
                    // Display the products in the cart
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        $cart = (array)$_SESSION['cart']; 
                        foreach($cart as $cartItem):
                            $product = loadProduct($conn, $cartItem);
                        ?>
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-3">
                                    <img src="<?php echo $product["imgLink"];?>" alt="Product Image" class="img-fluid rounded-start" style="width: auto; height: 200px;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h2 class="card-title"><?php echo $product["name"]?></h2>
                                            <h4 class="card-subtitle mb-2 text-muted"><?php echo "€ ".$product["price"];?></h4>
                                        </div>

                                        <form action="includes/removeFromCart-inc.php" method="post">
                                                <input type="hidden" id="productId" name="productId" value="<?php echo $product["id"]; ?>">
                                                <button type="submit" class="btn btn-primary p-2 fs-5">
                                                    Remove From Cart
                                                </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                    endforeach;
                    }
                    else {
                    ?>
                        <br>
                        <br>
                        <h3>Your Cart is Empty</h3>
                        <a href="products.php" class="btn btn-primary" role="button">View Products</a>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="row">
                    <div class="border p-3 mb-3">
                        <h3>Order Summary</h3>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                            $cart = (array)$_SESSION['cart']; 
                        ?>
                        <div class="row">
                            <div class="col-lg-8">
                                <?php
                                    foreach($cart as $cartItem):
                                        $product = loadProduct($conn, $cartItem);
                                    ?>
                                        <p><?php echo $product["name"]?></p>
                                    <?php
                                    endforeach;
                                ?>
                                <h4>Total</h4>
                            </div>
                            <div class="col-lg-3">
                                <?php
                                    $total = 0;
                                    foreach($cart as $cartItem):
                                        $product = loadProduct($conn, $cartItem);
                                        $total = $total + $product["price"];
                                    ?>
                                        <p>€ <?php echo $product["price"]?></p>
                                    <?php
                                    endforeach;
                                ?>

                                <h4>€ <?php echo $total?></h4>
                            </div>
                        </row>
                        <?php
                        }
                        else{
                        ?>
                            <p>No Items in Cart</p>
                        <?php
                        }
                        ?>
                        <div class="d-grid gap-2">
                            <a href="products.php" class="btn btn-dark w-100" role="button">Checkout</a>
                            <a href="products.php" class="btn btn-primary w-100" role="button">Continue Shopping</a>
                        </div>
                    </div>
                </row>
            </div>
        </div>
    </div>
</div>




<!-- <div class="col-12">
    <main>
        <div class="container">
            <div class="row mb-4">
                <div class="col-4">
                    <div class="card">
                        <img src="assets/thrift1.jpg.webp" class="card-img-top" alt="Checked Shirt">
                        <div class="card-img-overlay">
                            <button type="button" class="btn">
                                <img src="assets/x-solid.png" alt="x" width="20" height="auto" href="#">
                            </button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Checked Shirt</h5>
                            <p class="card-text">&euro; 24.00</p>
                        </div>
                        <div class="card-body">
                            <div>
                                <h5>Quantity</h5>
                                <div class="counter">
                                    <span class="down" onClick='decreaseCount(event, this)'> <a> - </a> </span>
                                    <input type="text" value="1">
                                    <span class="up" onClick='increaseCount(event, this)'> <a> + </a> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <img src="assets/thrift4.heic.webp" class="card-img-top" alt="Heavy Jacket in Green">
                        <div class="card-img-overlay">
                            <button type="button" class="btn">
                                <img src="assets/x-solid.png" alt="x" width="20" height="auto" href="#">
                            </button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Heavy Jacket in Green</h5>
                            <p class="card-text">&euro; 150.00</p>
                        </div>
                        <div class="card-body">
                            <div>
                                <h5>Quantity</h5>
                                <div class="counter">
                                    <span class="down" onClick='decreaseCount(event, this)'> <a> - </a> </span>
                                    <input type="text" value="1">
                                    <span class="up" onClick='increaseCount(event, this)'> <a> + </a> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="p-3">
                            <h2>Order Summary</h2>

                            <br>
                            <br>

                            <h5 style="text-align:left;">
                                Subtotal
                                <span style="float:right;">
                                    €174.00
                                </span>
                            </h5>
                        </div>

                        <div class="card-body">
                            <a class="btn btn-primary w-100">Checkout</a>
                        </div>

                        <div class="card-body">
                            <a class="btn btn-secondary w-100" href="products.php">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        <div>
    <main>
<div> -->
    

<?php
    include 'includes/footer.php';
?>

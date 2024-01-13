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
                        
                        <?php
                        }
                        else{
                        ?>
                            <p>No Items in Cart</p>
                        <?php
                        }
                        ?>
                        <div class="d-grid gap-2">
                            <a href="checkout.php" class="btn btn-dark w-100" role="button">Checkout</a>
                            <a href="products.php" class="btn btn-primary w-100" role="button">Continue Shopping</a>
                        </div>
                    </div>
                </row>
            </div>
        </div>
    </div>
</div>    

<?php
    include 'includes/footer.php';
?>

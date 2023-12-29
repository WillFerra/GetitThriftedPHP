<?php 
    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    
    include "includes/header.php";

    if(isset($_GET["product"])){
        $productId = $_GET["product"];

        if(!loadProduct($conn, $productId)){
            header("location:index.php");
            exit();
        }

        $product = loadProduct($conn, $productId);
    }
?>

<br>
<br>

<div class="container mt-3">
    <div class="row">
        <div class="col-5">
            <div class="border p-3 mb-3">
                <div>
                    <img src="<?php echo $product["imgLink"];?>" alt="Product Image" class="img-fluid">
                </div>
            </div>
        </div>
            
        <div class="col-lg-7 col-md-12">
            <div class="border p-3 mb-3">
                <h1><?php echo $product["name"]?></h1>
                <h3><?php echo $product["description"]?></h3>
                <br>
                <br>
                <h5><?php echo "Price: € ".$product["price"]?></h5>
                <br>
                <h5><?php echo "Size: ".$product["sizeId"]?></h5>
                <br>
                <h5><?php echo "Quantity in Stock: ".$product["stockQty"]?></h5>
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <!-- Button -->
                    <button type="submit" class="btn btn-primary w-100 p-2 fs-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add to Cart
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Item Successfully Added to Cart</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button onclick="location.href='products.php'" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue Shopping</button>
                            <button onclick="location.href='cart.php'" type="button" class="btn btn-primary">Go to Cart</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<div class="container-fluid">
    <h2>Related Products</h2>
</div>

<br>
<br>

<div class="col-12">
        <main>
            <div class="container">
                <div class="row mb-4">
                    <div class="col-4">
                        <div class="card">
                            <img src="assets/thrift1.jpg.webp" class="card-img-top" alt="Checked Shirt">
                            <div class="card-body">
                                <h5 class="card-title">Checked Shirt</h5>
                                <p class="card-text">&euro; 24.00</p>
                            </div>
                            <div class="card-body">
                                <a href="productItem.php" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="card">
                            <img src="assets/thrift2.heic.webp" class="card-img-top" alt="Zip-Up Navy Blue">
                            <div class="card-body">
                                <h5 class="card-title">Zip-Up Navy Blue</h5>
                                <p class="card-text">&euro; 45.00</p>
                            </div>
                            <div class="card-body">
                                <a href="productItem.php" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="card">
                            <img src="assets/thrift3.heic.webp" class="card-img-top" alt="Sweatshirt Grey">
                            <div class="card-body">
                                <h5 class="card-title">Sweatshirt Grey</h5>
                                <p class="card-text">&euro; 48.00</p>
                            </div>
                            <div class="card-body">
                                <a href="productItem.php" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>



<?php
    include 'includes/footer.php';
?>
